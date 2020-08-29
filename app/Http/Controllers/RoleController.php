<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController  extends ApiController
{
    public function __construct()
    {
        parent::__construct(Role::class);
    }
}
