<?php

namespace App\Policies;

use App\Models\Fichero;
use App\Models\User;

class FicheroPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function upload(user $user, Fichero $fichero){
        return $user->id === $fichero->user_id;
    }
    public function delete(user $user, Fichero $fichero){
        return $user->id === $fichero->user_id;
    }
    public function download(user $user, Fichero $fichero){
        return $user->id === $fichero->user_id;
    }
}
