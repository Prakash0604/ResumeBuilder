<?php
namespace App\Services;

use App\Models\Industry;

class IndustryService{
    protected $model;
    public function __construct(protected Industry $industry){
        $this->model=$industry;
    }

    public function update(array $array,$id){
        $id=$this->model->find($id);
        $id->update($array);
    }

    public function delete($id){
        $id=$this->model->find($id);
        $id->delete();
    }
}
