<?php

namespace App\Http\Controllers\api\services;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        //get all posts
        $todos = Todo::latest()->paginate(5);

        //return collection of todos as a resource
        return new TodoResource(true, 'List Data todos', $todos);
    }

}
