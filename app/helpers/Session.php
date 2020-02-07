<?php

/**
 * Takes care of all sessions
 */
class Session{

	public static function exists($name){
		return (isset($_SESSION[$name])) ? true : false;
	}

    public static function put($name, $value){
    	return $_SESSION[$name] = $value;
    }

    public static function get($name){
    	return $_SESSION[$name];
    }

    public static function delete($name){
    	if (self::exists($name)) {
    		unset($_SESSION[$name]);
    	}
    }

   public static function destroy(){
        session_destroy();
    }

   public static function flash($name, $content = '', $class = 'text-center alert alert-success'){
        if (!empty($name)) {
           if (!empty($content) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name. 'CLASS'])) {
                unset($_SESSION[$name.'CLASS']);
            }
               $_SESSION[$name] = $content;
               $_SESSION[$name . 'CLASS'] = $class;
           }elseif (empty($content) && !empty($_SESSION[$name])) {
               $class = !empty($_SESSION[$name . 'CLASS']) ? $_SESSION[$name . 'CLASS'] : '';
               echo '<div class="'. $class .' id="msg-flash">'. $_SESSION[$name] .'</div>';
               unset($_SESSION[$name]);
               unset($_SESSION[$name . 'CLASS']);
           }
        }
    }
}