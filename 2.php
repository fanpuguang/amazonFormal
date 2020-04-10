<?php
/*
* PHP调用谷歌翻译
* author:cc
* date:2012/5/4
*/
function translate($text,$language='zh-cn|en'){
if(empty($text))return false;
@set_time_limit(0);
$html = "";
$ch=curl_init("http://google.com/translate_t?langpair=".urlencode($language)."&text=".urlencode($text));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
$html=curl_exec($ch);
if(curl_errno($ch))$html = "";
curl_close($ch);
if(!empty($html)){
$x=explode("
",$html);
$x=explode("onmouseout=\"this.style.backgroundColor='#fff'\">",$x[0]);
return $x[1];
}else{
return false;
}
}
echo translate('개','kr|zh-cn');
?>