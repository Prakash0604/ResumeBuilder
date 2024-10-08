<?php
namespace App\Services;

use App\Models\Degree;

class DegreeService{
    protected $modal;
    public function __construct(protected Degree $degree){
        $this->modal=$degree;
    }

    public function edit(array $array,$id){
       $id= $this->modal->find($id);
       $id->update($array);
    }

    public function delete($id){
        $id=$this->modal->find($id);
        $id->delete();
    }
}
