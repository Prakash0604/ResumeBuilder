<?php

namespace App\Services;

use App\Models\Education;

class EducationService{
    protected $modal;
    public function __construct(Education $education){
        $this->modal=$education;
    }

    public function storeData(array $array){
        return $this->modal->create($array);
    }

    public function viewDetail($id){
        return $this->modal->with(['user','degree','field','gradingType','joinYear','passYear','createdBy','updatedBy'])->find($id);
    }

    public function updateData(array $array, $id){
        $id=$this->modal->find($id);
        return $id->update($array);
    }
}
