<?php
            $cookie_liefetime = (3600*24) * 90; // 90 tagae
if(isset($_GET['afid']) && !isset($_COOKIE['ihre_energieberater_af_id']))
        {
            setcookie("ihre_energieberater_af_id",$_GET['afid'],time() + $cookie_liefetime, '/' );
        }
if(isset($_GET['debug']))
{
            setcookie("ihre_energieberater_af_id",$_GET['afid'],time() + $cookie_liefetime, '/' );
}
$bannername = 'b1_hoch';
if(isset($_GET['name']))
{
$bannername = $_GET['name'];
}
exec('ls ./banner/' . $bannername . '*', $file);
if(!is_array($file) || count($file) !== 1)
{
die('unambiguous file name');
}
else
{
$file_str = substr(trim($file[0]),2);
}
$mimeType = mime_content_type($file_str);

$banner = file_get_contents($file_str);



header('Content-type:' . $mimeType); //Set the content type to image/jpg
echo $banner;
