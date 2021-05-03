<?php
class Format{
    public function formatDate($date){
       return date('F j, Y, g:i a', strtotime($date)); //date is a build in function and here we return
    }
    public function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')); // string possition into space 
        $text = $text."...";
        return $text;

    }
    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}


?>