<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;
use Input;
use Auth;
use Validator;

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
        $todos = $user->getMyTodos();
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
        // da li je req validan
        if (($errors = Todo::isValid(Input::all())) === true)
        {
            //ako jeste, kreiracu novi todo i vraticu taj isti todo
            $newTodo = new Todo(Input::all());
            return Auth::user()->todos()->save($newTodo);
        }

        // ovde cu uraditi nesto ako request nije validan
        return response()->json($errors, 400);
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
        $todos = Auth::user()->todos()->find($id);
        if ($todos)
        {
            if (($errors = Todo::isValid(Input::all())) === true)
            {
                $todos = Auth::user()->updateMyTodos($id);
                return $todos;
            }
            return response()->json($errors, 400);
        }
        return dd($todos);
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
        $user->deleteMyTodo($id);
        $todos = $user->getMyTodos();;
        return $todos;
    }
}
