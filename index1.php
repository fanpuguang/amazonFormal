<?php
/**
 * Free Google Translate API PHP Class.
 *
 * @author      willgeek <willgeek@qq.com>
 *
 * @link        http://www.willgeek.com/
 *
 * @license     MIT
 *
 * @method string translate(string $text, string $source, string $target)
 */
class ggTranslate{
    const TIMEOUT = 10;
    
    private $autoTKK=true, $translateKey, $key=406398, $keys=array('561666268', '1526272306'), $response, $ggTranslateUrl='http://translate.google.cn';
    
    public function setTranslateUrl($url = 'cn')
    {
        $url = is_null($url) ? 'cn' : $url;
        if($url == 'com' ) $this->ggTranslateUrl = 'http://translate.google.com';
        return $this;
    } 
    
    
    /**
     * 发送翻译请求
     * @param String  $q             翻译内容
     * @param String  $sl            源语言
     * @param String  $tl            目标语言
     * @param Boolean $json          json格式
     * @param String  $p             client
     * @param String  $method        请求方式：默认get(post)
     * @return String 页面数据
     */
    public function translate($q, $sl, $tl, $json=false, $method='get', $p=1)
    {
        $startTime = time();
        $sl = is_null($sl) ? 'auto' : $sl;
        $this->translateKey = $this->getTkk();
        $tk = $this->TL($q);
        $q = urlencode(stripslashes($q));
        
        if ( $p == 1 ) {
            $param = 't?client=webapp';
        }
        if ( $p == 2 ) {
            $param = 'single?client=t';
        }
        
        $url = $this->ggTranslateUrl. "/translate_a/" . $param . "&sl=".$sl."&tl=".$tl."&hl=".$tl."&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=2&ssel=0&tsel=0&kc=1&tk=". $tk ;
        
        $data = null;
        if($method == 'get') $url .= "&q=" . $q;
        if($method == 'post') $data = "q=" . $q;
        
        $output = $this->curl($url , $method, $data );
        $endtime = time()-$startTime;
        if ( $json === true ) {
            header("Content-type: application/json");
            $output = json_encode(array('status' => 0, 'tk' => $tk, 'translate' => $output, 'time' => $endtime));
            exit($output);
        }
        return $output;
    }
    
    private function getTkk()
    {
        $this->keys = $this->getTkeys();
            $this->translateKey = $this->key . '.' . array_sum($this->keys);
        return $this->translateKey;
    }
    
    private function getTkeys()
    {
        if($this->autoTKK === true && empty($_COOKIE['key']) && empty($_COOKIE['keys']))
        {
            $content = $this->curl($this->ggTranslateUrl);
            
            if(preg_match("#TKK\=eval\('\(\(function\(\)\{var\s+a\\\\x3d(-?\d+);var\s+b\\\\x3d(-?\d+);return\s+(\d+)\+#isU", $content, $arr)){
                $this->keys = array($arr[1], $arr[2]);
                $this->key=$arr[3];
                //var_dump($arr);
                setcookie('key', $this->key, time()+1800);
                setcookie('keys', serialize($this->keys), time()+1800);
                
            }else{
                exit(json_encode(array('status' => 1, 'error' => 'keysArray is null!')));
            }
        }
        else
        {
            $this->keys = unserialize($_COOKIE['keys']);
            $this->key=$_COOKIE['key'];
        }
        return $this->keys;
    }
    
    /**
     * 发送一个http请求
     * @param String  $url           页面地址
     * @param String  $method        请求方式：默认get(post)
     * @param Array   $data          要发送的数据数组，比如：array('user'=>'test','pass'=>'354534'),键是表单字段名称，值是表单字段的值，默认 null
     * @return String 页面数据
     */
    private function curl($url, $method='get', $data=null)
    {
            $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::TIMEOUT);
        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        if (empty($data)) {
            $data = '';
        } else{
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $this->response = curl_exec($ch);
        curl_close($ch);
        
        if(!empty($this->response)){
            return $this->response;
        }else{
            return 0;
        }
    }
    
    //以下是提取tk算法部分
    public function TL($a) 
    {
        
        $tkk = explode('.', $this->translateKey);
        $b = $tkk[0];
    
        for($d = array(), $e = 0, $f = 0; $f < mb_strlen ( $a, 'UTF-8' ); $f ++) {
            $g = $this->charCodeAt ( $a, $f );
            if (128 > $g) {
                $d [$e ++] = $g;
            } else {
                if (2048 > $g) {
                    $d [$e ++] = $g >> 6 | 192;
                } else {
                    if (55296 == ($g & 64512) && $f + 1 < mb_strlen ( $a, 'UTF-8' ) && 56320 == ($this->charCodeAt ( $a, $f + 1 ) & 64512)) {
                        $g = 65536 + (($g & 1023) << 10) + ($this->charCodeAt ( $a, ++ $f ) & 1023);
                        $d [$e ++] = $g >> 18 | 240;
                        $d [$e ++] = $g >> 12 & 63 | 128;
                    } else {
                        $d [$e ++] = $g >> 12 | 224;
                        $d [$e ++] = $g >> 6 & 63 | 128;
                    }
                }
                $d [$e ++] = $g & 63 | 128;
            }
        }
        $a = $b;
        for($e = 0; $e < count ( $d ); $e ++) {
            $a += $d [$e];
            $a = $this->RL( $a, '+-a^+6' );
        }
        $a = $this->RL( $a, "+-3^+b+-f" );
        $a ^= $tkk[1];
        if (0 > $a) {
            $a = ($a & 2147483647) + 2147483648;
        }
        $a = fmod ( $a, pow ( 10, 6 ) );
        return $a . "." . ($a ^ $b);
    }
    
    function charCodeAt($str, $index)
    {
        $char = mb_substr($str, $index, 1, 'UTF-8');
     
        if (mb_check_encoding($char, 'UTF-8'))
        {
            $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
            return hexdec(bin2hex($ret));
        }
        else
        {
            return null;
        }
    }
    
    function RL($a, $b)
    {
        for($c = 0; $c < strlen($b) - 2; $c +=3) {
            $d = $b{$c+2};
            $d = $d >= 'a' ? $this->charCodeAt($d,0) - 87 : intval($d);
            $d = $b{$c+1} == '+' ? $this->shr32($a, $d) : $a << $d;
            $a = $b{$c} == '+' ? ($a + $d & 4294967295) : $a ^ $d;
        }
        return $a;
    }
    
    function shr32($x, $bits)
    {
    
        if($bits <= 0){
            return $x;
        }
        if($bits >= 32){
            return 0;
        }
    
        $bin = decbin($x);
        $l = strlen($bin);
    
        if($l > 32){
            $bin = substr($bin, $l - 32, 32);
        }elseif($l < 32){
            $bin = str_pad($bin, 32, '0', STR_PAD_LEFT);
        }
    
        return bindec(str_pad(substr($bin, 0, 32 - $bits), 32, '0', STR_PAD_LEFT));
    }  
} 

?>