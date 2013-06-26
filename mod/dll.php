<?php 
if(!defined('PT_GREGOOVERSE_NET')) exit;

list($action, $server, $username, $password) = page::posts('action', 'dll_server', 'dll_user', 'dll_pass');

if($action === "generate"){
    if(strlen($server) <= $conf_dll['sizes']['instance'] && strlen($username) <= $conf_dll['sizes']['username'] && strlen($password) <= $conf_dll['sizes']['password']){
        $zip = new zipfile();
        
        foreach($conf_dll['files'] as $dll){
            $data = data::read('pub/dll/' . $dll . '.dll');
            
            if($data === false)
                continue;
            
            foreach($conf_dll['offsets'][$dll]['string'] as $offset)
                data::replace($data, $server, $offset, $conf_dll['sizes']['instance']);

            foreach($conf_dll['offsets'][$dll]['instance'] as $offset)
                data::replace($data, $server, $offset, $conf_dll['sizes']['instance']);

            foreach($conf_dll['offsets'][$dll]['username'] as $offset)
                data::replace($data, $server, $offset, $conf_dll['sizes']['username']);

            foreach($conf_dll['offsets'][$dll]['password'] as $offset)
                data::replace($data, $server, $offset, $conf_dll['sizes']['password']);

            $zip->addFile($data, $dll . '.dll');
        }
        
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename=dll.zip");
        echo $zip->file();
    }
}
?>
    <div id="accordion" class="accordion">
        <ul id="accordion-nav" class="nav">
            <li><a href="#tab-1">Form</a></li>
            <li><a href="#tab-2">Data submitted</a></li>
            <li><a href="#tab-3">About the .dll</a></li>
            <?php
                $i = 4;
                foreach($conf_dll['files'] as $dll){
                    if(($data = data::read('pub/dll/' . $dll . '.dll')) !== false){
            ?>
            <li><a href="#tab-<?php echo $i++; ?>"><?php echo $dll, '.dll'; ?></a></li>
            <?php
                    }
                }
            ?>
        </ul>
        
        <div class="tabs">
            <div class="tab" id="tab-1">
                <h2>Form</h2>
                <form method="post" action="?p=dll">
                    <label for="dll_server">SQL instance name (<?php echo $conf_dll['sizes']['instance']; ?> characters max)</label>
                    <input type="text" id="dll_server" name="dll_server" maxlength="<?php echo $conf_dll['sizes']['instance']; ?>" />
                    <label for="dll_user">SQL username (<?php echo $conf_dll['sizes']['username']; ?> characters max)</label>
                    <input type="text" id="dll_user" name="dll_user" maxlength="<?php echo $conf_dll['sizes']['username']; ?>" />
                    <label for="dll_pass">SQL password (<?php echo $conf_dll['sizes']['password']; ?> characters max)</label>
                    <input type="text" id="dll_pass" name="dll_pass" maxlength="<?php echo $conf_dll['sizes']['password']; ?>" />
                    <button name="action" type="submit" value="generate">Generate .dll</button>
                </form>
            </div>
            
            <div class="tab" id="tab-2">
                <h2>Data submitted</h2>
                <p>
                    The data submitted is <b>NOT</b> saved. It's injected inside the .dlls and then destroyed. The file you download isn't saved either.<br />
                    If you are not sure, enter dummy data (i don't suggest entering nothing, it will be harder to locate in your file after), and edit it manually after with an hexadecimal editor. You can find the offsets in the sections below :).
                </p>
            </div>
            
            <div class="tab" id="tab-3">
                <h2>About the .dll</h2>
                <p>
                    The 3 files (clan.dll, clan-procedure.dll and sql.dll) are cleaned up version. The syntax has been changed to fit a MSSQL 2005 (or above) server.<br />
                    The database name is hardcoded inside the files, you won't need any registry value.<br />
                    These files allow you to have functionnal SoD, rankings, online list, etc..<br />
                    <a href="?p=misc&amp;id=log_user_connections">More info about clan-procedure.dll</a>    
                </p>
            </div>
            
            <?php
                $i = 4;
                $lambda = create_function('$s', 'return sprintf("@ 0x%\'06X\n", $s);');
                foreach($conf_dll['files'] as $dll){
                    if(($data = data::read('pub/dll/' . $dll . '.dll')) !== false){
            ?>
            <div class="tab" id="tab-<?php echo $i; ?>">
                <h2><?php echo $dll, '.dll'; ?></h2>
                
                <div id="accordion-<?php echo $i; ?>" class="accordion">
                    <ul id="accordion-<?php echo $i; ?>-nav" class="nav">
                        <li><a href="#tabs-<?php echo $i; ?>-1"><?php echo count($conf_dll['offsets'][$dll]['query']); ?> queries</a></li>
                        <li><a href="#tabs-<?php echo $i; ?>-2">Connection string</a></li>
                        <li><a href="#tabs-<?php echo $i; ?>-3">Instance name</a></li>
                        <li><a href="#tabs-<?php echo $i; ?>-4">Username</a></li>
                        <li><a href="#tabs-<?php echo $i; ?>-5">Password</a></li>
                    </ul>
                    
                    <div class="tabs">
                        <div class="tab-nested" id="tabs-<?php echo $i; ?>-1">
                            <h3><?php echo count($conf_dll['offsets'][$dll]['query']); ?> queries</h3>
                            <pre class="brush: sql"><?php
                                $j = 0;
                                foreach($conf_dll['offsets'][$dll]['query'] as $offset){
                                    $j++;
                                    $query = hex::string($data, $offset);
                                    printf("@ 0x%'06X:\n%s\n\n", $offset, $query);
                                }
                            ?></pre>
                        </div>
                        
                        <div class="tab-nested" id="tabs-<?php echo $i; ?>-2">
                            <h3>Connection string</h3>
                            <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['string'])); ?></pre>
                        </div>
                        
                        <div class="tab-nested" id="tabs-<?php echo $i; ?>-3">
                            <h3>Instance name</h3>
                            <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['instance'])); ?></pre>
                        </div>
                        
                        <div class="tab-nested" id="tabs-<?php echo $i; ?>-4">
                            <h3>Username</h3>
                            <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['username'])); ?></pre>
                        </div>
                        
                        <div class="tab-nested" id="tabs-<?php echo $i; ?>-5">
                            <h3>Password</h3>
                            <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['password'])); ?></pre>
                        </div>
                    </div>
                </div>
            
                <script type="text/javascript">
                    new Yetii({ id: 'accordion-<?php echo $i; ?>', tabclass: 'tab-nested' });
                </script>
            </div>
            <?php 
                        $i++;
                    }
                }
            ?>
        </div>
        
        <script type="text/javascript">
            new Yetii({ id: 'accordion' });
        </script>
    </div>
</div>
