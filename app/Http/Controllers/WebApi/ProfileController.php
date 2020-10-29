<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProfileResource;
use App\User;

class ProfileController extends Controller
{

    public function get(){
        return new ProfileResource(\Auth::user());
    }

    public function show($id){
        return new ProfileResource(User::find($id));
    }
}
