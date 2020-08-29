<?php

namespace App\Http\Controllers;

use App\Vulnerability;
use Illuminate\Http\Request;


class PageController extends Controller
{

    public function contact()
    {
        return view('contact');
    }


    public function vulnerability()
    {
        return view('vulnerability');
    }

    public function vulnerabilitySubmit(Request $request)
    {
        $values = $request->all();
        $vulnerability = new Vulnerability();

        $vulnerability->reporter = $values["email"];
        $vulnerability->issue = $values["issue"];
        $vulnerability->information = $values["information"];
        $vulnerability->save();

        return redirect()->route('home');
    }

}
