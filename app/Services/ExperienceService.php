<?php

namespace App\Services;

use App\Models\Experience;
use App\Services\Main\BaseService;
class ExperienceService extends BaseService{
    protected $experience;
    public function __construct(Experience $experience){
        $this->experience=$experience;
        parent::__construct($experience);
    }

    public function getDataDetail($id){
        $id=$this->getIndividualData($id);
        return $id->with(['user','industry','jobLevel','createdBy','updatedBy'])->get();
    }
}
