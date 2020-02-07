<?php

/*
* Cleans data used in forms
* Prevents CSRF in form submission
*/
class Sanitize{
    private $status,
    		$error;

    public static function escape($string){
        if (!empty($string)) {
        	return htmlentities($string, ENT_QUOTES, 'UTF-8');
        }
    }

    public static function clean($string){
        return htmlspecialchars_decode($string);
    }

    public static function flush($string){
        return trim(strip_tags($string));
    } 

    public static function csrfProtect($string){
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function fileName(){
        return self::escape($_SERVER["PHP_SELF"]);
    }

    public static function limit($string, int $length){
        if (strlen($string) < $length) {
            return $string;
        }

        $str = substr($string, 0, $length);
        if ($space = strrpos($str, " ")) {
            $str = substr($str,0, $space);
            return $str;
        }
    }

    public static function cleanUrl($url){
        return filter_var($url, FILTER_SANITIZE_URL);
    }
}
