<?php
namespace Garden\Controllers; 
use Garden\Store;
use Garden\Strawberry;
use Garden\Blueberry;
use Garden\APP;
// defined('DOOR_BELL') || die('enter only with log in');

class Controller_Planting{

    private $store, $rawData;
    public $fileName;

    public function __construct(){
        _d($_SERVER['REQUEST_METHOD']);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $this->store = new Store('garden');
            $this->fileName = 'planting';
            // $this->price = 0.78;
            $this->rawData = file_get_contents("php://input");
            $this->rawData = json_decode($this->rawData, 1); //decodes json string to object
        }
    }
    //STARTING PLANTING PAGE SCENARIO
    public function action_index(){
        include DIR.'/views/planting/index.php';
    }

    //LIST SCENARIO
    public function action_list(){
        $store = new Store('garden');
        ob_start();
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    //PLANTING SINGLE STRAWBERRY SCENARIO
    public function action_plantOneStrawberry(){
        $object = new Strawberry($this->store->getNewID() );
        $this->store->saveNewObject($object);
        
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }

    //PLANTING MANY STRAWBERRIES SCENARIO
    public function action_plantManyStrawberries(){
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
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }
        foreach(range(1, $amount) as $strawberry){
            $object = new Strawberry($this->store->getNewID() );
            $this->store->saveNewObject($object);
        }
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
            
    }

      //PLANTING SINGLE BLUEBERRY SCENARIO
      public function action_plantOneBlueberry(){
        $object = new Blueberry($this->store->getNewID() );
        $this->store->saveNewObject($object);
        
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }

    //PLANTING MANY BLUEBERRIES SCENARIO
    public function action_plantManyBlueberries(){
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
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }
        foreach(range(1, $amount) as $blueberry){
            $object = new Blueberry($this->store->getNewID() );
            $this->store->saveNewObject($object);
        }
        ob_start();
        $store = $this->store;
        include DIR.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
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
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
}

    
// //CACHE START
    // include DIR. '/class/Catche.php';
    // $DATA = new Catche;
    // $answer = $DATA->get();
    // $method = false === $answer ? 'API' : 'CATCHE';
    // if (false === $answer) {

    // //API START
    // $ch = curl_init();//object-resource
    // curl_setopt(
    // $ch, CURLOPT_URL, 
    // 'https://v6.exchangerate-api.com/v6/0c5915f141c43a24cb93fe77/latest/EUR'
    // );
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $answer = curl_exec($ch);
    //  // send and wait for answer(till no answ - nothing below works)
    // $answer = json_decode($answer); //from json
    // _d($answer);
    // $USD = $answer->conversion_rates->USD;
    // $DATA->set($answer); // <---- cache new data
    // } 
    // elseif(false !== $answer) {
    //   $USD = $answer->conversion_rates->USD;
    // }

