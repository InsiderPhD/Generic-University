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
        $rootEndpoint = new \stdClass();
        $rootEndpoint->endpoint = "/";
        $rootEndpoint->desc = "Shows this manual";

        $deleteEndpoint = new \stdClass();
        $deleteEndpoint->endpoint = "delete";
        $deleteEndpoint->desc = "deletes everything from the database NO BACKUP";

        $restoreEndpoint = new \stdClass();
        $restoreEndpoint->endpoint = "restore";
        $restoreEndpoint->desc = "Restores the database from last manual backup";
        return collect([$rootEndpoint, $restoreEndpoint, $deleteEndpoint]);

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