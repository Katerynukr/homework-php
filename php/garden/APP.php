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

     //METHOD THAT SAVES OBJECT INTO SESSION
     public static function sessionSaveObject($object){
        $object = serialize($object);
        $_SESSION['garden'][] = $object;
    }

    //METHOD THAT DELETES OBJECT FROM SESSION
    public static function sessionDeleteObject($fileName){
        foreach($_SESSION['garden'] as $id => $berry){
            $bush = unserialize($berry);
            if($_POST['delete'] ==  $bush -> bushID ){
                unset($_SESSION['garden'][$id]);
                APP::redirect($fileName);  
            }
        }
    }

    //METHOD THAT CHECKS HOW MANY OBJECT WERE SELECTED TO PLANT
    //AND THROWS ERRORS
    public static function checkObjectsToGrow($amount, $fileName){
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $_SESSION['err'] = 1;
            } elseif($amount > 4){
                $_SESSION['err'] = 2;
            }

            APP::redirect($fileName);
        }
    }
}