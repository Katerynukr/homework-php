<?php 
namespace Garden;

class APP{

    //ROUTER 
    public static function route(){
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']); //<---replacing working tag root with ''
        $uri = explode('/' , $uri); //<---splitting a string

        if('planting' == $uri[0]){
            include DIR.'/planting.php';
        }elseif('growing' === $uri[0]){
            include DIR.'/growing.php';
        } elseif('removing' === $uri[0]){
            include DIR.'/removing.php';
        } 
    }


    //METHOD THAT REDIRECTS PAGE (FROM POST TO GET)
    public static function redirect(string $file){
        header('Location:' .URL.$file);
        exit();
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

    // //METHOD THAT CHECKS EXISTANCE OF SESSION
    // public static function isSessionCreated(){
    //     if(!isset($_SESSION['garden'])){
    //         $_SESSION['garden'] = [];
    //         $_SESSION['ID'] = 0;
    //     }
    // }
}


    // //METHOD THAT DELETES OBJECT FROM SESSION
    // public static function sessionDeleteObject(string $fileName){
    //     foreach($_SESSION['garden'] as $id => $berry){
    //         $bush = APP::objectUnserialize($berry);
    //         if($_POST['delete'] ==  $bush -> bushID ){
    //             unset($_SESSION['garden'][$id]);
    //             APP::redirect($fileName);  
    //         }
    //     }
    // }

    // //METHOD THAT SAVES OBJECT INTO SESSION
    // public static function sessionSaveObject($object){
    //     $object = APP::objectSerialize($object);
    //     $_SESSION['garden'][] = $object;
    // }

    //  //METHOD THAT SERIALIZES OBJECT
    //  public static function objectSerialize($object){
    //     $object = serialize($object);
    //     return $object;
    // }

    // //METHOD THAT UNSERIALIZES OBJECT
    // public static function objectUnserialize($object){
    //     $object = unserialize($object);
    //     return $object;
    // }

    //  //METHOD THAT GROWS BERRIES ON BUSHES 
    //  public static function grow(){
    //     foreach($_SESSION['garden'] as $index => $berry){
    //         $bush = APP::objectUnserialize($berry);
    //         $howMuch = $_POST['berry'][$bush -> bushID];
    //         $bush-> growBerries();
    //         APP::sessionSaveObjectByIndex($index, $bush);
    //       }
    // }

    //  //METHOD THAT SAVES OBJECT INTO SESSION BY INDEX
    //  public static function sessionSaveObjectByIndex($index, $object){
    //     $_SESSION['garden'][$index] = APP::objectSerialize($object);
    // }

    // //METHOD THAT DELETES ALL BUSHES 
    // public static function delete(){
    //     foreach($_SESSION['garden'] as $id => $berry){
    //         APP::unset($id);
    //      }
    // }

    //     //METHOD THAT UNSETS OBJECT 
    //     public static function unset($id){
    //         unset($_SESSION['garden'][$id]); 
    // }


    // //METHOD THAT COLLECTS ALL BERRIES FROM ONE BUSH
    // public static function collectAllBerries(){
    //     foreach($_SESSION['garden'] as $index => $berry){
    //         $bush =  APP::objectUnserialize($berry);
    //         if($_POST['collectALL'] == $bush ->  bushID){
    //             $bush-> collectAll();
    //             APP::sessionSaveObjectByIndex($index, $bush);
    //         }
    //     }
    // }


    // //METHOD THAT COLLECTS SPECIFIC AMOUNT OF BERRIES FROM ONE BUSH
    // public static function collectSpecificAmount(){
    //     foreach($_SESSION['garden'] as $index => $berry){
    //         $bush = APP::objectUnserialize($berry);
    //         if($_POST['collect'] == $bush ->  bushID){
    //             if($_POST['howMany'][ $bush -> bushID ] !== ''){
    //                 $howmuch = $_POST['howMany'][ $bush -> bushID ];
    //                 $bush -> collect($howmuch);
    //                 APP::sessionSaveObjectByIndex($index, $bush);
    //             }
    //         }
    //     }
    // }