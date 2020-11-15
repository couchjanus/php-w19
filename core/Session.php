<?php
// namespace core;

class Session
{
    private static $_sessionStarted = false;
    
    public static function init()
    {
        if (self::$_sessionStarted == false) {
            ini_set("session.use_strict_mode", 1);
            ini_set("session.cookie_httponly", 1);
            ini_set("session.sid_length", 48);
            ini_set("session.sid_bits_per_character", 6);
            ini_set("session.hash_function", "sha256");
            ini_set("session.cache_limiter", 'nocache');
            ini_set("session.use_trans_sid", 0);

            session_start(
                ['cookie_lifetime' => 0,]
            );
            self::$_sessionStarted = true;
        }
        return session_id();
    }

    public static function set($key, $value)
    {
        $_SESSION[SESSION_PREFIX.$key] = $value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[SESSION_PREFIX.$key])){
			return $_SESSION[SESSION_PREFIX.$key];
		}
		return false;
	}

	public static function display(){
		return $_SESSION;
	}

    public static function unset($key){
		if(self::$_sessionStarted == true){
			unset($_SESSION[$key]);
		}
	}

    public static function destroy(){
		if(self::$_sessionStarted == true){
			session_unset();
			session_destroy();
		}
	}
}