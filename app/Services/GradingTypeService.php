<?php
namespace App\Services;

use App\Models\GradingType;

class GradingTypeService{
    protected $model;
    public function __construct(GradingType $gradingType){
        $this->model=$gradingType;
    }

    public function getData($id){
        return $this->model->find($id);
    }

    public function updateData(array $array,$id){
        $id=$this->model->find($id);
        return $id->update($array);
    }

    public function deleteData($id){
        return $this->model->find($id)->delete();
    }
}
