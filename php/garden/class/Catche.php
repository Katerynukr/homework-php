<?php
namespace Garden;

class Catche {

    private $data;
    private $catcheTime = 5;

    public function __construct()
    {
        if (file_exists(__DIR__.'/currency.json')) {
            $this->data = json_decode(file_get_contents(__DIR__.'/currency.json'));
        }
    }

    public function get()
    {
        if (null === $this->data) {
            return false;
        }
        
        if ($this->data->timeStamp + $this->catcheTime <= time()) {
            return false;
        }

        return $this->data;
    }

    public function set(object $data)
    {
        $data->timeStamp = time();
        file_put_contents(__DIR__.'/currency.json', json_encode($data));
    }

}