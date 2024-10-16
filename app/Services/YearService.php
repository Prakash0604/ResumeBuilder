<?php
namespace App\Services;

use App\Models\Year;

class YearService{
    protected $modal;
    public function __construct(Year $year){
        $this->modal=$year;
    }

    public function getData($id){
        return $this->modal->find($id);
    }

    public function updateData(array $array,$id){
        $id=$this->modal->find($id);
        return $id->update($array);
    }

    public function deleteData($id){
        return $this->modal->find($id)->delete();
    }
}
