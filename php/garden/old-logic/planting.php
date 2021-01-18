<!-- <?php 
defined('DOOR_BELL') || die('enter only with log in');
$store= new Garden\Store('garden');
$fileName = 'planting';
$price = 0.78;

    //CACHE START
    include DIR. '/class/Catche.php';
    $DATA = new Catche;
    $answer = $DATA->get();
    $method = false === $answer ? 'API' : 'CATCHE';
    if (false === $answer) {

    //API START
    $ch = curl_init();//object-resource
    curl_setopt(
    $ch, CURLOPT_URL, 
    'https://v6.exchangerate-api.com/v6/0c5915f141c43a24cb93fe77/latest/EUR'
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $answer = curl_exec($ch);
     // send and wait for answer(till no answ - nothing below works)
    $answer = json_decode($answer); //from json
    _d($answer);
    $USD = $answer->conversion_rates->USD;
    $DATA->set($answer); // <---- cache new data
    } 
    elseif(false !== $answer) {
      $USD = $answer->conversion_rates->USD;
    }

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1); //decodes json string to object

    //LIST
    if(isset($rawData['list'])) {
        ob_start();
        include __DIR__.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    //PLANTING
   if(isset($rawData['btnName']) && $rawData['btnName'] == 'buttonGrowOneStraberry'){

        /*planting a strawberry bush*/

        $object = new Garden\Strawberry($store->getNewID() );
        $store->saveNewObject($object);
        
        ob_start();
        include __DIR__.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
        
    } elseif(isset($rawData['btnName']) && $rawData['btnName']== 'buttonGrowManyStraberry' ){

        /* planting many strawberry bushes at once*/

        $amount = (int )$rawData['amount'];
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include __DIR__.'/error.php';
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
            $object = new Garden\Strawberry($store->getNewID() );
            $store->saveNewObject($object);
        }
            ob_start();
            include __DIR__.'/views/planting/list.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(201);
            echo $json;
            die;
    } elseif(isset($rawData['btnName']) && $rawData['btnName'] == 'buttonGrowOneBlueberry'  ){

        /*planting a blueberry bush*/

        $object = new Garden\Blueberry($store->getNewID() );
        $store->saveNewObject($object);
        
        ob_start();
        include __DIR__.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    } elseif(isset($rawData['btnName']) && $rawData['btnName'] == 'buttonGrowManyBlueberry'){

        /* planting many blueberry bushes at once*/

        $amount =(int) $rawData['amount'];
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include __DIR__.'/error.php';
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
            $object = new Garden\Blueberry($store->getNewID() );
            $store->saveNewObject($object);
        }
        ob_start();
        include __DIR__.'/views/planting/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    } elseif(isset($rawData['delete']) && $rawData['delete'] == '1'){ 
        $idToDelete = $rawData['id'];
        _d($idToDelete, 'remove');
        $store->deleteObject($idToDelete );
        ob_start();
        include __DIR__.'/views/planting/list.php';
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
?> -->
