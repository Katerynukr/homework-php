<?php
namespace Garden\Controllers; 
use Garden\Store;
use Garden\Strawberry;
use Garden\Blueberry;
use Garden\APP;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller_Growing{
    private $store, $rawData;
    public $fileName;

    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $this->store = APP::store('garden');
            $this->fileName = 'growing';
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
        include DIR.'/views/growing/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        $response->setContent($out);
        // $response->prepare(APP::$request);
        _d(APP::$request, 'action_index');
        return $response;
    }

    //LIST SCENARIO
    public function action_list(){
        $store = APP::store('garden');
        ob_start();
        include DIR.'/views/growing/listOfBerries.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;
    }

      //GROWING SCENARIO
      public function action_grow(){
        $this->store->grow();
        ob_start();
        include DIR.'/views/growing/listOfBerries.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['berry' => $out];
        $response = new JsonResponse($json);
        $response->prepare(APP::$request);
        return $response;
    }
}