<html>
<head>
<meta http-equiv="refresh" content="1;url=music.html">
</head>
<body>
<p>
waiting please!
</p>
<?php
//$path="http://site.douban.com/douban";
//$path="http://site.douban.com/jimmy";
$path=$_POST["path"];
//$path="http://site.douban.com/huazhou";
//$html=file_get_contents("compress.zlib://".$path);
$html=file_get_contents($path);
//$name=$argv;
preg_match_all('<meta.+charset=\"([a-zA-Z0-9/-]+)\">',$html,$arr);
if( $arr[1][0]=="gbk")
{
$html=mb_convert_encoding("$html","UTF-8","GBK");
}/*$head="独立";
$end=strpos($html,$head);
$html=substr_replace($html,"",0,$end);
//这里保留中间有用信息，删除”拍友“一直结束
$head="选择";
$end=strpos($html,$head);
$strlen=strlen($html);
$html=substr_replace($html,"",$end,$strlen);
*/
$file=fopen("douban.txt","w",true);
if(!$file)
echo "failed";
else 
fwrite($file,$html);
//exec("douban.sh");
//system("/usr/bin/douban.sh");
system("/bin/douban.sh");
?>
</body>
</html>
