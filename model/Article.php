<?php
    // Fichier Class article

    class Article {
        private $_id;
        private $_title;
        private $_content;

        function __construct($id,$title,$content) {
            $this->_id = $id;
            $this->_title = $title;
            $this->_content = $content;
        }
        public function  getid() {
            return $this->id;
        }

        public function  gettitle() {
            return $this->title;
        }

        public function getcontent() {
            return $this->content;
        }

        public function setid($id) {
            $this-> _id=$id;
        }
        public function settitle($title) {
            $this-> _id=$title;
        }
        public function setcontent($content) {
            $this-> _id=$content;
        }
    }

    $test = new Article('1','2','3');
?>