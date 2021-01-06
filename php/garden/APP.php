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

     //METHOD THAT SERIALIZES OBJECT
     public static function objectSerialize($object){
        $object = serialize($object);
        return $object;
    }

    //METHOD THAT UNSERIALIZES OBJECT
    public static function objectUnserialize($object){
        $object = unserialize($object);
        return $object;
    }

     //METHOD THAT SAVES OBJECT INTO SESSION
     public static function sessionSaveObject($object){
        $object = APP::objectSerialize($object);
        $_SESSION['garden'][] = $object;
    }

    //METHOD THAT DELETES OBJECT FROM SESSION
    public static function sessionDeleteObject($fileName){
        foreach($_SESSION['garden'] as $id => $berry){
            $bush = APP::objectUnserialize($berry);
            if($_POST['delete'] ==  $bush -> bushID ){
                unset($_SESSION['garden'][$id]);
                APP::redirect($fileName);  
            }
        }
    }

    //METHOD THAT CHECKS HOW MANY OBJECT WERE SELECTED TO PLANT
    //AND THROWS ERRORS IF IMPUT IS NOT VALID
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

    // //METHOD THAT CHECKS EXISTANCE OF SESSION
    // public static function isSessionCreated(){
    //     if(!isset($_SESSION['garden'])){
    //         $_SESSION['garden'] = [];
    //         $_SESSION['ID'] = 0;
    //     }
    // }
}