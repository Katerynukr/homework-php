<?php
namespace Garden;

interface Store{
    public function getAll();
    public function deleteObject($id);
    public function getNewID();
    public function saveNewObject($object);
}