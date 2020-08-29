<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    private $model;

    public function __construct($modelClass)
    {
        $this->model = \App::make($modelClass);
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
