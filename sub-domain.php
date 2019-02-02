#!/usr/bin/env php
<?php 
$op_system = php_uname();
if(preg_match("/Linux/",$op_system)){
$white = "\e[97m";
$black = "\e[30m\e[1m";
$yellow = "\e[93m";
$orange = "\e[38;5;208m";
$blue   = "\e[34m";
$lblue  = "\e[36m";
$cln    = "\e[0;94m";
$green  = "\e[92m";
$fgreen = "\e[32m";
$red    = "\e[91m";
$bold   = "\e[1m";
}else{
// no color in windows 
$white = "";
$black = "";
$yellow = "";
$orange = "";
$blue   = "";
$lblue  = "";
$cln    = "";
$green  = "";
$fgreen = "";
$red    = "";
$bold   = "\e[1m";
}

function reverseiplookup($target){
$op_system = php_uname();
if(@preg_match("/Linux/",$op_system)){
	$green  = "\e[92m";
	$white = "\e[97m";
}else{
	$green  = "";
	$white    = "";
}
if(!preg_match("/http/",$target)){
$target = "http://".$target;	
}
$target = str_replace("/","",$target);
$target2 = "http://api.hackertarget.com/reverseiplookup/?q=$target";	
$source = @file_get_contents("$target2");	
$hacked = fopen("sites.txt","a+");
fwrite($hacked,$source);
fclose($hacked);
echo $green."   [+] All server sites saved in [sites.txt] \n";
}	

function subdomains($target){
if(@preg_match("/Linux/",$op_system)){
	$green  = "\e[92m";
	$white = "\e[97m";
}else{
	$green  = "";
	$white    = "";
}

if(!preg_match("/http/",$target)){
$target = "http://".$target;	
}
$url = str_replace("https://","",$target);
$url = str_replace("http://","",$url);
$url = str_replace("/","",$url);
$url = str_replace("www.","",$url);
$target2 = "http://api.hackertarget.com/hostsearch/?q=$url";	
$source = @file_get_contents("$target2");	
$source2 = str_replace(",","$green  ------ IP : $white",$source);
$source3 = str_replace(",","  ------ IP : ",$source);
$result = $green."\n  -[-============== SUBDOMAINS OF  " .$url . "==============-]- \n";
$result.= $white.$source2;
$result.= $green."\n  -[-================ SUBDOMAINS END  OF  " .$url . "================-]- \n";
$result2 = "  -[-============== SUBDOMAINS OF" .$url . "==============-]- \n";
$result2.= $source3;
$result2.= "\n  -[-============== SUBDOMAINS END  OF  " .		$url . "===============-]- \n";
$sub_s= $url."~~sub.txt";
$hacked = fopen("$sub_s","a+");
fwrite($hacked,$result2);
fwrite($hacked,"\n");
fclose($hacked);
echo $result;
}
print $bold . $green. "
  ___      _        _                _                  ___                          _      
 / __|_  _| |__  __| |___ _ __  __ _(_)_ _    ___ _ _  | _ \_____ _____ _ _ ______  (_)_ __ 
 \__ \ || | '_ \/ _` / _ \ '  \/ _` | | ' \  / _ \ '_| |   / -_) V / -_) '_(_-< -_) | | '_ \
 |___/\_,_|_.__/\__,_\___/_|_|_\__,_|_|_||_| \___/_|   |_|_\___|\_/\___|_| /__|___| |_| .__/
                                                                                      |_|   
";
echo "=====================================================================";
echo "\n";
print $red."[+] Real Author Mr.Sqar [+]".$green."\t -= Recoded By Rooted Script =-";
echo "\n";echo "\n";
echo "\t"."   [+] Enter target url : ";
$target = fgets(STDIN,1024);
$target = trim($target);
echo "\n";
echo subdomains($target);
echo "\n";


?>
