<?php

namespace App\Services;

use App\Models\User;

class SuperAdminService{
    protected $modal;
    public function __construct(User $user){
        $this->modal=$user;
    }

    public function storeUser(array $array){
       return  $this->modal->create($array);
    }
}
