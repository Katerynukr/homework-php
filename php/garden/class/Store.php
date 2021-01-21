<?php
namespace Garden;

interface Store{
    public function getAll();
    public function deleteObject($id);
    public function getNewID();
    public function saveNewObject($object);
    public function grow();
    public function delete();
    public function collectAllBerries($idToDelete);
    public function collectSpecificAmount($idToDelete, $amount);
}