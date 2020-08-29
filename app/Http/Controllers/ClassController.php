<?php

namespace App\Http\Controllers;

use App\UniClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $model = UniClass::class;

    public function __construct()
    {
        $this->model = \App::make($this->model);
    }

    function index()
    {
        return $this->model::all();
    }

    function store(Request $request)
    {
        return $this->model->create($request->input());
    }

    function show($id)
    {
        if ($this->model->find($id) != null)
            return $this->model->find($id);
        else
            return "{'not found':true}";
    }

    function update(Request $request, $id)
    {

        if ($model = $this->model->find($id)) {
            $model->update($request->input());
            return $model;
        }
        return json_encode('Resource: ' . $id . ' with presented ID does not exist.');
    }

    function destroy($id)
    {
        $this->model->destroy($id);
    }
}
