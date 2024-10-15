<?php

namespace App\Services;

use App\Models\Grading;

class GradingService{

    protected $modal;
    public function __construct(Grading $grading){
        $this->modal=$grading;
    }

    public function findData($id){
        return $this->modal->find($id);
    }

    public function editData(array $array,$id){
        $id=$this->modal->find($id);
        return $id->update($array);
    }

    public function deleteData($id){
        return $this->modal->find($id)->delete();
    }
}
