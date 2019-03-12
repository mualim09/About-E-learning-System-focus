<?php
 function auto_copyright($year = 'auto'){ 
    if(intval($year) == 'auto'){ $year = date('Y'); }
    if(intval($year) == date('Y')){ echo intval($year); } 
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
    if(intval($year) > date('Y')){ echo date('Y'); } 
    } 

  function bg_color($color){
                    if ($color == 1) {
                        $bg_color = "bg-red";
                    }
                    else if ($color == 2) {
                        $bg_color = "bg-cyan";
                    }
                    else if ($color == 3) {
                        $bg_color = "bg-green";
                    }
                    else if ($color == 4) {
                        $bg_color = "bg-blue-grey";
                    }
                    else if ($color == 5) {
                        $bg_color = "bg-pink";
                    }
                    else if ($color == 6) {
                        $bg_color = "bg-light-blue";
                    }
                    else if ($color == 7) {
                        $bg_color = "bg-light-green ";
                    }
                    else if ($color == 8) {
                        $bg_color = "bg-amber";
                    }
                    else{
                        $bg_color = "";
                    }
                   echo $bg_color;
                 }
// class Encryption {
//     var $skey = "yourSecretKey"; // you can change it

//     public  function safe_b64encode($string) {
//         $data = base64_encode($string);
//         $data = str_replace(array('+','/','='),array('-','_',''),$data);
//         return $data;
//     }

//     public function safe_b64decode($string) {
//         $data = str_replace(array('-','_'),array('+','/'),$string);
//         $mod4 = strlen($data) % 4;
//         if ($mod4) {
//             $data .= substr('====', $mod4);
//         }
//         return base64_decode($data);
//     }

//     public  function encode($value){ 
//         if(!$value){return false;}
//         $text = $value;
//         $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
//         $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//         $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
//         return trim($this->safe_b64encode($crypttext)); 
//     }

//     public function decode($value){
//         if(!$value){return false;}
//         $crypttext = $this->safe_b64decode($value); 
//         $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
//         $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//         $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
//         return trim($decrypttext);
//     }
// }

// $str = "My secret String";

// $converter = new Encryption;
// $encoded = $converter->encode($str );
// $decoded = $converter->decode($encoded);    

// echo "$encoded<p>$decoded";
?>