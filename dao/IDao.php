<?php

interface IDao {
    //put your code here
    public function create($o);
    public function delete($o);
    public function update($o);
    public function findById($id);
    public function findAll();
}
