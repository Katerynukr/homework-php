<?php 

class APP{

    //METHOD THAT REDIRECTS PAGE (FROM POST TO GET)
    public static function redirect(string $file){
        header('Location: http://localhost/try/php/garden/'.$file);
        exit;
    }

    //METHOD THAT CHANGES SESSION ID WHEN NEW OBJECT IS CREATED
    public static function increaseSessionID(){
        $_SESSION['ID'] = $_SESSION['ID'] +1;

        //  return $_SESSION['ID']+1;
    }
}