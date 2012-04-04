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
    <div class="accordion">
        <h3><a href="#">Data submitted</a></h3>
        <p>
            The data submitted is <b>NOT</b> saved. It's injected inside the .dlls and then destroyed. The file you download isn't saved either.<br />
            If you are not sure, enter dummy data (i don't suggest entering nothing, it will be harder to locate in your file after), and edit it manually after with an hexadecimal editor. You can find the offsets in the sections below :).
        </p>
        <h3><a href="#">About the .dll</a></h3>
        <p>
            The 3 files (clan.dll, clan-procedure.dll and sql.dll) are cleaned up version. The syntax has been changed to fit a MSSQL 2005 (or above) server.<br />
            The database name is hardcoded inside the files, you won't need any registry value.<br />
            These files allow you to have functionnal SoD, rankings, online list, etc..<br />
            <a href="?p=misc&amp;id=log_user_connections">More info about clan-procedure.dll</a>    
        </p>
        <?php
            $lambda = create_function('$s', 'return sprintf("@ 0x%\'06X\n", $s);');
            foreach($conf_dll['files'] as $dll){
                if(($data = data::read('pub/dll/' . $dll . '.dll')) !== false){
        ?>
        <h3><a href="#"><?php echo $dll, '.dll'; ?></a></h3>
        <div>
            <div class="tabs">
                <ul>
                        <li><a href="#tabs-1"><?php echo count($conf_dll['offsets'][$dll]['query']); ?> queries</a></li>
                        <li><a href="#tabs-2">Connection string</a></li>
                        <li><a href="#tabs-3">Instance name</a></li>
                        <li><a href="#tabs-4">Username</a></li>
                        <li><a href="#tabs-5">Password</a></li>
                </ul>
                <div id="tabs-1">
                    <pre class="brush: sql"><?php
                        $i = 0;
                        foreach($conf_dll['offsets'][$dll]['query'] as $offset){
                            $i++;
                            $query = hex::string($data, $offset);
                            printf("@ 0x%'06X:\n%s\n\n", $offset, $query);
                        }
                    ?></pre>
                </div>
                <div id="tabs-2">
                    <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['string'])); ?></pre>
                </div>
                <div id="tabs-3">
                    <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['instance'])); ?></pre>
                </div>
                <div id="tabs-4">
                   <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['username'])); ?></pre>
                </div>
                <div id="tabs-5">
                   <pre><?php echo implode(array_map($lambda, $conf_dll['offsets'][$dll]['password'])); ?></pre>
                </div>
            </div>        
        </div>
        <?php } } ?>
    </div>
</div>
<div class="form">
    <form method="post" action="?p=dll">
        <label for="dll_server">SQL instance name (<?php echo $conf_dll['sizes']['instance']; ?> characters max)</label>
        <input type="text" id="dll_server" name="dll_server" maxlength="<?php echo $conf_dll['sizes']['instance']; ?>" />
        <label for="dll_user">SQL username (<?php echo $conf_dll['sizes']['username']; ?> characters max)</label>
        <input type="text" id="dll_user" name="dll_user" maxlength="<?php echo $conf_dll['sizes']['username']; ?>" />
        <label for="dll_pass">SQL password (<?php echo $conf_dll['sizes']['password']; ?> characters max)</label>
        <input type="text" id="dll_pass" name="dll_pass" maxlength="<?php echo $conf_dll['sizes']['password']; ?>" />
        <button name="action" type="submit" value="generate">Generate .dll</button>
    </form>