<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Role;
use App\UniClass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return "secret ;)";
    }

    public function delete()
    {
        if(Auth::user()->role_id == 1) {
            DB::table('users')->where('id', '<>', Auth::user()->id)->delete();
            UniClass::truncate();
            Grade::truncate();

            return "deleted everything ;)";
        } else {

            return "permission required :(";
        }

    }
    public function repopulate()
    {
        if(Auth::user()->role_id == 1) {
            $dbseed = new \DatabaseSeeder();
            $dbseed->run();

            return "database repopulated";
        } else {

            return "permission required :(";
        }

    }
}