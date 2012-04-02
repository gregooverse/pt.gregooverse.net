<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>pt.gregooverse.net - 500</title>
        
        <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet" type='text/css'>
        
    </head> 
    <body>
        <header>
            pt.gregooverse.net - 500
        </header>
        <div class="body">
            <p><?php if(isset($_GET['t'])) echo htmlspecialchars($_GET['t']); ?></p>
            <p><a href="./?">Home</a></p>
        </div>
    </body>
</html>