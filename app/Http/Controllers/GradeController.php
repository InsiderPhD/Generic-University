<?php

namespace App\Http\Controllers;

use App\Grade;
use App\User;
use Illuminate\Http\Request;

class GradeController  extends AuthApiController
{
    public function __construct()
    {
        parent::__construct(Grade::class, 'user_id', 'Auth::id()');
    }
    use authIndex;
    use authShow;

}
