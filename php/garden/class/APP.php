<?php 
namespace Garden;
use Garden\Controllers\Controller_Planting;
use Garden\Controllers\Controller_Growing;
use Garden\Controllers\Controller_Removing;
use Symfony\Component\HttpFoundation\Request;

class APP{
    public static $request;
    private static $storeSetting = 'db'; // json OR db

    public static function start(){
        self::$request  = Request::createFromGlobals();
        return self::route();
    }

    public static function store($type){
        if ('json' == self::$storeSetting) {
            return new StoreJSON($type);
        }
        if ('db' == self::$storeSetting) {
            _d('db', 'from db');
            return new StoreDB($type);
        }
    }

    //ROUTER 
    public static function route(){
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']); //<---replacing working tag root with ''
        $uri = explode('/' , $uri); //<---splitting a string

        if('planting' == $uri[0]){
            if(!isset($uri[1])){
                return(new Controller_Planting)->action_index();
            }
            if('list' == $uri[1]){
                return(new Controller_Planting)->action_list();
            }
            if('delete' == $uri[1]){
                return(new Controller_Planting)->action_delete();
            }
            if('plant_one_strawberry' == $uri[1]){
                return(new Controller_Planting)->action_plantOneStrawberry();
            } elseif('plant_many_strawberries' == $uri[1]){
                return(new Controller_Planting)->action_plantManyStrawberries();
            } elseif('plant_one_blueberry' == $uri[1]){
                return(new Controller_Planting)->action_plantOneBlueberry();
            } elseif('plant_many_blueberries' == $uri[1]){
                return(new Controller_Planting)->action_plantManyBlueberries();
            }
            
            //404 NO PAGE
        }elseif('growing' === $uri[0]){
            if(!isset($uri[1])){
                return(new Controller_Growing)->action_index();
            }
            if('list' == $uri[1]){
                return(new Controller_Growing)->action_list();
            }
            if('growBerries' == $uri[1]){
                return(new Controller_Growing)->action_grow();
            }

        } elseif('removing' === $uri[0]){
            if(!isset($uri[1])){
                return(new Controller_Removing)->action_index();
            }
            if('list' == $uri[1]){
                return(new Controller_Removing)->action_list();
            }
            if('remove_everything' == $uri[1]){
                return(new Controller_Removing)->action_removeEverything();
            }
            if('collect_all_berries' == $uri[1]){
                return(new Controller_Removing)->action_collectAllBerries();
            }
            if('collect_some_berries' == $uri[1]){
                return(new Controller_Removing)->action_collectSomeBerries();
            }
        } 
    }


    //METHOD THAT REDIRECTS PAGE (FROM POST TO GET)
    public static function redirect(string $file){
        header('Location:' .URL.$file);
        exit();
    }

//     //METHOD THAT CHECKS HOW MANY OBJECT WERE SELECTED TO PLANT
//     //AND THROWS ERRORS IF IMPUT IS NOT VALID
//     public static function checkObjectsToGrow(int $amount, string $fileName){
//         if($amount <= 0 || $amount > 4){
//             if($amount < 0 || $amount == 0 ){
//                 $_SESSION['err'] = 1;
//             } elseif($amount > 4){
//                 $_SESSION['err'] = 2;
//             }
//             APP::redirect($fileName);
//         }
//     }    
// }

    // //METHOD THAT CHECKS EXISTANCE OF SESSION
        // public static function isSessionCreated(){
        //     if(!isset($_SESSION['garden'])){
        //         $_SESSION['garden'] = [];
        //         $_SESSION['ID'] = 0;
        //     }
        // }

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
     }