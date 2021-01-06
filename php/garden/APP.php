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

    //METHOD THAT SAVES OBJECT INTO SESSION BY INDEX
    public static function sessionSaveObjectByIndex($object){
        $_SESSION['garden'][$index] = APP::objectSerialize($object);
    }

    //METHOD THAT DELETES OBJECT FROM SESSION
    public static function sessionDeleteObject(string $fileName){
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
    public static function checkObjectsToGrow(int $amount, string $fileName){
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $_SESSION['err'] = 1;
            } elseif($amount > 4){
                $_SESSION['err'] = 2;
            }
            APP::redirect($fileName);
        }
    }

    //METHOD THAT GROWS BERRIES ON BUSHES 
    public static function grow(){
        foreach($_SESSION['garden'] as $index => $berry){
            $bush = APP::objectUnserialize($berry);
            $howMuch = $_POST['berry'][$bush -> bushID];
            $bush-> growBerries();
            APP::sessionSaveObjectByIndex($bush);
          }
    }

    //METHOD THAT UNSETS OBJECT 
    public static function unset($id){
            unset($_SESSION['garden'][$id]); 
    }

     //METHOD THAT DELETES ALL BUSHES 
     public static function delete(){
        foreach($_SESSION['garden'] as $id => $berry){
            APP::unset($id);
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

// how does it know methods of other classes if there was no indlude