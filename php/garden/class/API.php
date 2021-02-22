<?php
namespace Garden;
use Garden\Catche;

class API{
    public static function currencyAPI(){
        //CACHE START
        // include __DIR__.'/Catche.php';
        $DATA = new Catche();
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
        return $USD;
        } 
        elseif(false !== $answer) {
        $USD = $answer->conversion_rates->USD;
        return $USD;
        }
    }
}