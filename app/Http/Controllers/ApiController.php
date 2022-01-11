<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $model;

    public function __construct($modelClass)
    {
        $this->model = \App::make($modelClass);
    }

    // GET /resource/
    function index()
    {
        return $this->model::all();
    }

    // POST /resource/
    function store(Request $request)
    {
        return $this->model->create($request->input());
    }

    // GET /resource/1
    function show($id)
    {
        if ($this->model->find($id) != null)
            return $this->model->find($id);
        else
            return "{'not found':true}";
    }

    // PUT /resource/1
    function update(Request $request, $id)
    {

        if ($model = $this->model->find($id)) {
            $model->update($request->input());
            return $model;
        }
        return json_encode('Resource: ' . $id . ' with presented ID does not exist.');
    }

    // DELETE resource/1
    function destroy($id)
    {
        $this->model->destroy($id);
    }
}
