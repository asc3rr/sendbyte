<?php
    include_once("../php/parsedown.php");

    class DB{
        private $conn;

        public function __construct() {
            $server = "127.0.0.1";
            $user = "root";
            $password = "";
            $db_name = "sendbyte";

            $this->conn = new mysqli($server, $user, $password, $db_name);
        }

        private function sanitize($data){
            return mysqli_real_escape_string($this->conn, htmlentities($data, ENT_QUOTES, "utf-8"));
        }

        public function getArticles(){
            $sql = "SELECT * FROM articles GROUP BY id DESC";

            $result = $this->conn->query($sql);

            $articles = array();

            while($article_data = $result->fetch_assoc()){
                $id = $article_data["id"];
                $title = $article_data["title"];
                $content = $article_data["content"];

                $current_article = array($id, $title, $content);

                array_push($articles, $current_article);
            }

            return $articles;
        }

        public function getArticleData($id){
            $id = $this->sanitize($id);

            $sql = "SELECT * FROM articles WHERE id=$id";

            $result = $this->conn->query($sql);

            $article_data = $result->fetch_assoc();

            $output = array($article_data["id"], $article_data["title"], $article_data["content"], $article_data["date"]);

            return $output;
        }

        public function addArticle($title, $content, $date){
            $parser = new Parsedown();
            $parsed_content = $parser->text($content);

            $title = $this->sanitize($title);
            $content = $this->sanitize($content);

            $insert_sql = "INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES (null, '$title', '$parsed_content', '$date')";

            $this->conn->query($insert_sql);
        }

        public function deleteArticle($id){
            $id = $this->sanitize($id);

            $delete_sql = "DELETE FROM `articles` WHERE id=$id";

            $this->conn->query($delete_sql);
        }

        public function login($login, $password){
            $login = $this->sanitize($login);
            $password = $this->sanitize($password);

            $sql = "SELECT * FROM admin";

            if($result = $this->conn->query($sql)){
                if($result->num_rows > 0){
                    $user = $result->fetch_assoc();

                    if(password_verify($password, $user['password'])){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
        }
    }
?>