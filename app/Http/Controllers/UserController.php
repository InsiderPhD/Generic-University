<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController  extends AuthApiController
{
    public function __construct()
    {
        parent::__construct(User::class, 'id','Auth::id()');
    }
    //use authIndex;
}
