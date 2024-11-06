<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ToDoController extends Controller
{
    public function index(): View
    {
        return view('todo.index');
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);
        $request->user()->todos()->create($validated);

        return redirect(route('to-do.index'));
    }
}
