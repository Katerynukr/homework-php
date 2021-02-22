<?php
namespace Garden\Controllers; 
use Garden\Store;
use Garden\Strawberry;
use Garden\Blueberry;
use Garden\APP;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller_Removing{
    private $store, $rawData;
    public $fileName, $filePlant;

    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $this->store = APP::store('garden');
            $this->fileName = 'removing';
            $this->filePlant = 'planting';
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
        include DIR.'/views/removing/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        $response->setContent($out);
        $response->prepare(APP::$request);
        _d(APP::$request, 'action_index');
        return $response;
    }

       //LIST SCENARIO
       public function action_list(){
        $store = APP::store('garden');
        ob_start();
        include DIR.'/views/removing/listCollect.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        _d($response, 'json');
        $response->prepare(APP::$request);
        return $response;
    }

        //REMOVE ALL BUSHES
        public function action_removeEverything(){ 
            $this->store->delete();
            ob_start();
            include DIR.'/views/removing/listCollect.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['output' => $out];
            $response = new JsonResponse($json);
            $response->prepare(APP::$request);
            return $response;
        }

        //COLLECT ALL BERRIES   
        public function action_collectAllBerries(){ 
            $idToDelete = $this->rawData['id'];
            $this->store->collectAllBerries($idToDelete);
            ob_start();
            include DIR.'/views/removing/listCollect.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $response = new JsonResponse($json);
            $response->prepare(APP::$request);
            return $response;
            
        }
        //COLLECT SPECIFIC AMOUNT OF BERRIES
        public function action_collectSomeBerries(){
            $idToDelete = $this->rawData['id'];
            $amount = $this->rawData['howMuch'];
            $this->store->collectSpecificAmount($idToDelete, $amount);
            ob_start();
            include DIR.'/views/removing/listCollect.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $response = new JsonResponse($json);
            $response->prepare(APP::$request);
            return $response;
        }
    }
