<?php

namespace App\Http\Controllers;

use App\UniClass;
use Illuminate\Http\Request;

class ClassController extends ApiController
{
    public function __construct()
    {
        parent::__construct(UniClass::class);
    }
}
