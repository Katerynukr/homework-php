<?php

namespace Garden; 

class StoreJSON implements Store{
    private const PATH = DIR.'/data/';
    private $fileName = 'garden';
    public $data;
    public function __construct($file){
        $this->fileName = $file;
        if(!file_exists(self::PATH.$this->fileName.'.json')){
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['garden'=>[], 'ID'=>0]));
            $this->data = ['garden'=>[], 'ID'=>0];
        } else{
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json');
            $this->data = json_decode($this->data, 1); //1 means array ; 0 means object
        }
    }

    public function __destruct(){
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data));
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getNewID(){
        $this->data['ID']++;
        $id = $this->data['ID'];
        return $id;
    }

    //METHOD THAT SAVES OBJECT INTO JSON
    public function saveNewObject($object){
        $this->data['garden'][] = serialize($object);
    }

    //METHOD THAT DELETES OBJECT FROM JSON
    public function deleteObject($id ){
        foreach($this->data['garden'] as $index => $berry){
            $bush = unserialize($berry);
            if($id ==  $bush -> bushID ){
                unset($this->data['garden'][$index]);
                // APP::redirect($fileName);  
            }
        }
    }

    //METHOD THAT GET ALL ELEMENTS FROM JSON
    public function getAll(){
        $all = [];
        foreach($this->data['garden'] as $obj) {
            $all[] = unserialize($obj);
        }
        return $all;
    }

     //METHOD THAT GROWS BERRIES ON BUSHES 
     public function grow(){
        foreach( $this->data['garden'] as $index => $berry){
            $bush = unserialize($berry);
            $howMuch = $_POST['berry'][$bush->bushID];
            $bush->growBerries();
            $this->data['garden'][$index] = serialize($bush);
        }
    }

    //METHOD THAT CHECKS ARE ANY BERRIES PLANTED
    public function areBerries(){
        if(empty($this->data['garden'])){
            echo 'You can\'t collect berries!';
            APP::redirect('planting'); 
        }
    }


    //METHOD THAT DELETES ALL BUSHES 
    public function delete(){
        foreach( $this->data['garden'] as $index => $berry){
            unset($this->data['garden'][$index]);
         }
    }

    //METHOD THAT COLLECTS ALL BERRIES FROM ONE BUSH
    public function collectAllBerries($idToDelete){
        foreach($this->data['garden'] as $index => $berry){
            $bush =  unserialize($berry);
            if($idToDelete == $bush->bushID){
                $bush-> collectAll();
                $this->data['garden'][$index] = serialize($bush);
            }
        }
    }

    //METHOD THAT COLLECTS SPECIFIC AMOUNT OF BERRIES FROM ONE BUSH
    public function collectSpecificAmount($idToDelete, $amount){
        foreach($this->data['garden'] as $index => $berry){
            $bush = unserialize($berry);
            if($idToDelete == $bush->bushID){
                if($amount !== ''){
                    $bush->collect($amount);
                    $this->data['garden'][$index] = serialize($bush);
                }
            }
        }
    }
}