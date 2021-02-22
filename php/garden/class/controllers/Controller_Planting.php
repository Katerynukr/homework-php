<?php
namespace Garden\Controllers; 
use Garden\Store;
use Garden\API;
use Garden\Strawberry;
use Garden\Blueberry;
use Garden\APP;
use Garden\StoreDB;
use Garden\StoreJSON;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
// defined('DOOR_BELL') || die('enter only with log in');

class Controller_Planting{

    private $store, $rawData;
    public $fileName;

    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $this->store = APP::store('garden');
            $this->fileName = 'planting';
            // $this->price = 0.78;
            $this->rawData = App::$request->getContent(); //gets content of input with symfony
            $this->rawData = json_decode($this->rawData, 1); //decodes json string to object
        }
    }

    //STARTING PLANTING PAGE SCENARIO
    public function action_index(){
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR.'/views/planting/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        $response->setContent($out);
        $response->prepare(APP::$request);
        return $response;
    }

    //LIST SCENARIO
    public function action_list(){
        _d('hello','jhgjg');
        $store = APP::store('garden');
        ob_start();
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;
    }

    //PLANTING SINGLE STRAWBERRY SCENARIO
    public function action_plantOneStrawberry(){
        $USD = API::currencyAPI();
        $object = new Strawberry($this->store->getNewID(), $USD);
        $this->store->saveNewObject($object);
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;
    }

    //PLANTING MANY STRAWBERRIES SCENARIO
    public function action_plantManyStrawberries(){
        $USD = API::currencyAPI();
        $amount =(int) $this->rawData['amount'];
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include DIR.'/views/planting/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $response = new JsonResponse($json);
            $response->prepare(APP::$request);
            return $response;
        }
        foreach(range(1, $amount) as $strawberry){
            $object = new Strawberry($this->store->getNewID(), $USD);
            $this->store->saveNewObject($object);
        }
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;     
    }

      //PLANTING SINGLE BLUEBERRY SCENARIO
      public function action_plantOneBlueberry(){
        $USD = API::currencyAPI();
        $object = new Blueberry($this->store->getNewID(), $USD );
        $this->store->saveNewObject($object);
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;
    }

    //PLANTING MANY BLUEBERRIES SCENARIO
    public function action_plantManyBlueberries(){
        $USD = API::currencyAPI();
        $amount =(int) $this->rawData['amount'];
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include DIR.'/views/planting/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $response = new JsonResponse($json);
            $response->prepare(APP::$request);
            return $response;
        }
        foreach(range(1, $amount) as $blueberry){
            $object = new Blueberry($this->store->getNewID(), $USD );
            $this->store->saveNewObject($object);
        }
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;

    }

    //DELETE SCENARIO
    public function action_delete(){
        $idToDelete = $this->rawData['id'];
        $this->store->deleteObject($idToDelete );
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;

    }
}

    


