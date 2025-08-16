<?php
    require_once(__DIR__ . '/config.php');
    class Datebase {
        
        private static $name;
        private static $text;
        private static $form;
        private static $db;
        
        
        public static function dbconnect() {
            self::$db = new mysqli('localhost', 'root', 'root', 'yk_bbs', 8889);
            if(self::$db->connect_error) {
                die('DB接続エラー : ' . self::$db->connect_error);
            }
            return self::$db;
        }
        public static function dbinsert($db) {
            self::$form = new Post() ;
            self::$name = self::$form->h($_SESSION['name']);
            self::$text = self::$form->h($_SESSION['text']);
            $stmt = $db->prepare('insert into form (name, text) values(?,?)');
            if(!$stmt) {
                echo 'error';
                die($db->error);
            }
            $stmt->bind_param('ss', self::$name, self::$text);
            $complate = $stmt->execute();
            if(!$complate) {
                die(self::$db->error);
            }
        }

        public static function dbselect(){
            $db = self::dbconnect();
            $stmt = $db->prepare('select id, name, text, created from form order by id desc');
            if(!$stmt) {
                die($db->error);
            }
            $complate = $stmt->execute();
            if(!$complate) {
                die($db->error);
            }
            $stmt->bind_result($id, $name, $text, $date);
            $results = [];
            while($stmt->fetch()){
                $results[] = [
                    'id' => $id,
                    'name' => $name,
                    'text' => $text,
                    'date' => $date,
                ];
            }
            return $results;
        }
    }
?>