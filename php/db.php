<?php
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
            $sql = "SELECT * FROM articles";

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
    }
?>