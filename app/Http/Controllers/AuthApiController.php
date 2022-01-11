<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthApiController extends ApiController
{

    public $fieldCheck;
    public $resourceCheck;

    public function __construct($modelClass, $fieldCheck, $resourceCheck)
    {
        parent::__construct($modelClass);
        $this->fieldCheck = $fieldCheck;
        $this->resourceCheck = $resourceCheck;
    }
}

trait authIndex
{
    // GET /resource/
    function index()
    {
        $val = $this->model::where($this->fieldCheck, '=', eval('return ' . $this->resourceCheck . ';'))->get();

        return $this->model::where($this->fieldCheck, '=', eval('return ' . $this->resourceCheck . ';'))->get();
    }
}

trait authStore
{
    // POST /resource/
    function store(Request $request)
    {
        $input = $request->input();
        $input[$this->fieldCheck] = \Auth::id();
        return $this->model->create($input);
    }
}


trait authShow
{
    // GET /resource/1
    function show($id)
    {
        $value = $this->model->find($id);
        if ($value != null && $value->get($this->fieldCheck) == eval('return ' . $this->resourceCheck . ';'))
            return $value;
        else
            return "{'not found':true}";
    }
}


trait authUpdate
{
    // PUT /resource/1
    function update(Request $request, $id)
    {

        $value = $this->model->find($id);
        if ($value && $value->get($this->fieldCheck) == eval('return ' . $this->resourceCheck . ';')) {
            $value->update($request->input());
            return $value;
        }
        return json_encode('Resource: ' . $id . ' with presented ID does not exist.');
    }
}


trait authDelete
{
    // DELETE resource/1
    function destroy($id)
    {
        if($this->model->find($id)->get($this->fieldCheck) == eval('return ' . $this->resourceCheck . ';')) {
            $this->model->destroy($id);
        }
    }

}
