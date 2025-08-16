<?php
    require_once(__DIR__ . '/config.php');
    class Post {
        public $error = [];
        
        private $name;
        private $text;
        private $token;
        private $db;
        public function h($str) {
            return htmlspecialchars($str, ENT_QUOTES);
        }

        public function name_judge($name) {
            if(empty($name)){
                $this->error['name'] = "Name is required";
                return $this->error['name'];
            }
        }

        public function text_judge($text) {
            if(empty($text)){
                $this->error['text'] = 'Text is required';
                return $this->error['text'];
            }
        }

        public function send_post() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->name = $this->h(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
                $this->text = $this->h(filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING));
                $this->error['name'] = $this->name_judge($this->name);
                $this->error['text'] = $this->text_judge($this->text);
                if(!empty($_POST['name']) && !empty($_POST['text'])) {
                    $_SESSION['name'] = $this->name;
                    $_SESSION['text'] = $this->text;
                    Token::token_check($_POST['token']);
                    $this->db = Datebase::dbconnect();
                    Datebase::dbinsert($this->db);
                    header('location: complate.php');
                    exit();
                }
            }
        }
        
        public function delete_session() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                session_destroy();
                header('location: index.php');
            }
        }
    }

    class Token {
        public function token_create() {
            if(empty($_SESSION['token'])){
                $_SESSION['token'] = bin2hex(random_bytes(32));
            }
            return $_SESSION['token'];
        }
        
        public static function token_check($token) {
            if($token !== $_SESSION['token']){
                header('location: index.php');
                exit();
            }
        }
    }

?>