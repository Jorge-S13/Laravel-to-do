<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ToDoController extends Controller
{
    public function index(): View
    {
        return view('todo.index');
    }
}
