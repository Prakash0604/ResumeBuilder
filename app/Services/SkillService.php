<?php
namespace App\Services;

use App\Models\Skill;

class SkillService{
    protected $model;
    public function __construct(Skill $skill){
        $this->model=$skill;
    }

    public function findData($id){
        return $this->model->find($id);
    }

    public function updateData(array $array, $id){
        $id=$this->model->find($id);
        return $id->update($array);
    }

    public function deleteData($id){
            return $this->model->find($id)->delete();
    }
}
