<?php

/*
 Plugin Name: IPv6 Detector 2
 Plugin URI: https://github.com/danyork/ipv6detector2
 Description: Just a simple plugin to detect if a visitor is using ipv6 or not.
 Version: 1.0
 Author: Dan York
 Author URI: http://code.danyork.com/
 License: GPL2
*/

/*
 Modified version of the ipv6detector plugin by Patux found at 
 http://patux.cl/ipv6detector

 Main modifications were to remove the links to sites about IPv4 address exhaustion
 and to remove the link and function to check on IP addresses.
*/

add_action('init', 'ipv6detector_register_widget');

function ipv6detector_register_widget() {
   register_sidebar_widget('IPv6 Detector 2', 'ipv6detector');
   register_widget_control('IPv6 Detector 2', 'ipv6detector_control');
   add_option("hits_6", 0);
   add_option("hits_4", 0);
   add_option("ipv6detector_v4_msg","Still using IPv4?");
   add_option("ipv6detector_v6_msg","Cool! You have got IPv6.");
}

function ipv6detector($args) {

   $ip = getenv("REMOTE_ADDR");
   extract($args);

   echo $before_widget;
   echo $before_title . "IPv6 detector 2" . $after_title;

   if (substr_count($ip, ":") > 0 && substr_count($ip, ".") == 0) {
       echo get_option('ipv6detector_v6_msg');
       $v = "6";
   } else {
       echo get_option('ipv6detector_v4_msg');
       $v = "4";
   }

   $stats = _get_stats($v);

   echo "<p class='ipv'>";
   echo $ip;
   echo "<br>";
   echo $stats;
   echo $after_widget;
}

function ipv6detector_control() {

   // ipv4 message
   if (isset($_POST['v4_msg']) && !empty($_POST['v4_msg'])) {
       update_option('ipv6detector_v4_msg', $_POST['v4_msg']);
   }
   $url = get_option('ipv6detector_v4_msg');
   echo "Message to display when user has IPv4 <input type='text' name='v4_msg' value='Still using IPv4?'/><br />\n";

   // ipv6 message
   if (isset($_POST['v6_msg']) && !empty($_POST['v6_msg'])) {
       update_option('ipv6detector_v6_msg', $_POST['v6_msg']);
   }
   $url = get_option('ipv6detector_v6_msg');
   echo "Message to display when user has IPv6 <input type='text' name='v6_msg' value='Cool! You have got IPv6.'/><br />\n";


   // Reset hitcount
   if ($_POST['rhit'] == "1" ) {
       update_option('hits_6', 0);
       update_option('hits_4', 0);
   }
   echo "Reset hit count <input type='checkbox' name='rhit' value='1'/><br />\n";
}



/**
*  _get_stats
* Internal use. Generate the html containing the stats.
*
* @param string $v Ip version
* @return string
*/
function _get_stats($v="4") {

   $hits_6 = get_option("hits_6");
   $hits_4 = get_option("hits_4");

   if ($v == "6")
       $hits_6++;
   else
       $hits_4++;

   update_option("hits_6", $hits_6);
   update_option("hits_4", $hits_4);

   $tot = $hits_4 + $hits_6;

   $v4h = ($hits_4 * 100) / $tot;
   $v6h = ($hits_6 * 100) / $tot;

   $strTmp = "<span id=\"bshow\"><a href=\"#\" onclick=\"showinfo('ipstat')\">Show stats</a></span>
       <div id=\"ipstat\"  style=\"display:none\">

           <ul><li><span id=\"bhide\"><a href=\"#\" onclick=\"hideinfo('ipstat')\">Hide stats</a></span><table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\">
           <tr><td colspan=\"3\">This server has received ".$tot." hits from both ipv4 and ipv6.</td></tr>
           <tr><td width=\"35\">IPv4</td><td width=\"25\">" . number_format($v4h, 1) . "%</td><td width=\"100\"><div style=\"margin-top:auto;margin-bottom:0px;background-color:red;height:15px;width:" . $v4h . "px\"></div></td></tr>
           <tr><td>IPv6</td><td>" . number_format($v6h, 1) . "%</td><td width=\"100\"><div style=\"margin-top:auto;margin-bottom:0px;background-color:lightblue;height:15px;width:" . $v6h . "px\"></div></td></tr>
           </table></li></ul>
           </div>
           <script type=\"text/javascript\">
               lshow=document.getElementById('bshow');
               lhide=document.getElementById('bhide');
               function showinfo(obj) {
                   o = document.getElementById(obj);
                   o.style.display=\"\";
                   lhide.style.display=\"\";
                   lshow.style.display=\"none\";
               }

               function hideinfo(obj) {
                   o = document.getElementById(obj);
                   o.style.display=\"none\";
                   lhide.style.display=\"none\";
                   lshow.style.display=\"\";
               }
           </script>";
   return $strTmp;
}
?>