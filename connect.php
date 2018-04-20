<?php // 1. thông tin kết nối SQL
$sql_server = 'localhost';
$sql_username = 'gkv_url';
$sql_password = 'oPmWGVeNbx';
$sql_database = 'gkv_url';
 
// 2. kết nối SQL
$sql_connect=mysqli_connect($sql_server, $sql_username, $sql_password, $sql_database);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// 3. Cài đặt charset utf8 cho SQL
if (!mysqli_set_charset($sql_connect, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($sql_connect));
}
// Hàm này xử lý dữ liệu trước khi đưa vào SQL
function esc_str($str)
{
   $str = trim($str);
   if(get_magic_quotes_gpc())
     {
       $str=stripcslashes($str);
     }
    $quote = array("'",'"','<','>',"’",'”',"＜","＞");
    $replace = array('&#039;','&quot;','<','>','&#039;','&quot;','<','>');
    $str = str_replace($quote, $replace, $str);
    //$str = htmlentities($str);
    return $str;
}
 
//Hàm print kết quả để xem
function pr($arr){
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}
