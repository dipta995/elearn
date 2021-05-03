<?php
    class  Session{
        public static function init(){
            session_start();
        }
        public static function set($key, $val){
            $_SESSION[$key] = $val;

        }
        public static function get($key){
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        }
        public static function checkSessions(){
            self::init();
            if (self::get("login")==false) {
                self::destroy();
                header("Location:login.php");
            }
        }

         public static function checkSession($previous_link){
               // self::init();
                if (self::get("login")==false) {
             /*       self::destroy();*/
                    echo "<script> window.location = 'glog/index.php?re_link=$previous_link';</script>";
                }
            }
        public static function blankSession(){
                    self::init();
                    if (self::get("login")==false) {
                        //self::destroy();
                        //header("Location:login.php");
                    }
                }

        public static function checkLogin(){
            self::init();
          
            if (self::get("adminlogin")==true) {
                self::destroy();
                header("Location:index.php");
            }
            
        }

        public static function destroyStudent(){
            session_destroy();
            echo "<script>alert('logout successfully');</script>";
            echo "<script> window.location = 'glog/index.php';</script>";
        }
         public static function destroy(){
            session_destroy();
            echo "<script>alert('logout successfully');</script>";
            echo "<script> window.location = 'login.php';</script>";
        }
    }
    
?>