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
            echo "this is the id";
            return $this->_id;
        }

        public function  gettitle() {
            return $this->_title;
        }

        public function getcontent() {
            return $this->_content;
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

    // $test = new Article('10','2','3');
    // $out = $test->getid();
    // echo $out;
?>