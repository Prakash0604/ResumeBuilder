<?php
namespace App\Services;

use App\Models\JobLevel;

class JobLevelService{
    protected $model;
    public function __construct(protected JobLevel $jobLevel){
        $this->model=$jobLevel;
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
