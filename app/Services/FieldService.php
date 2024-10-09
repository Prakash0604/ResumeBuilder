<?php
namespace App\Services;

use App\Models\Field;

class FieldService{
    protected $modal;
    public function __construct(protected Field $field){
        $this->modal=$field;
    }

    public function edit($id){
        return $this->modal->find($id);
    }

    public function update(array $array,$id){
        $id=$this->modal->find($id);
        $id->update($array);
        return $id;
    }

    public function delete($id){
        return $this->modal->find($id)->delete();
    }
}
