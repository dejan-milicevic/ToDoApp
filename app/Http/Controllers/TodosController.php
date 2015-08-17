<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;
use Input;
use Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $todos = $user->todos()->orderBy('priority')->get();
        return $todos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $todo = $user->todos()->save(new Todo(Input::all()));
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $todos = $user->todos()->find($id);
        $todos->done = Input::input('done');
        $todos->priority = Input::input('priority');
        $todos->title = Input::input('title');
        $todos->save();
        return $todos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id);
        $todo->delete();
        $todos = $user->todos()->orderBy('priority')->get();
        return $todos;
    }
}
