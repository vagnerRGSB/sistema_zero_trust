<?php 

namespace App\Interface;

interface CrudInterface{
    public function find(int $id);
    public function findAll();
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}