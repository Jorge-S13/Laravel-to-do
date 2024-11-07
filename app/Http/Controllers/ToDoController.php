<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Models\ToDo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ToDoController extends Controller
{
    public function index(): View
    {
        return view('todo.index');
    }
    public function store(ToDoRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->todos()->create($validated);

        return redirect(route('dashboard'));
    }
    public function edit(ToDo $toDo):View
    {
        Gate::authorize('update',$toDo);
        return view('todo.edit',[
            'todo' => $toDo,
        ]);
    }
    public function update(ToDoRequest $request, ToDo $toDo): RedirectResponse
    {
        Gate::authorize('update',$toDo);
        $validated = $request->validated();
        $toDo->update($validated);

        return redirect(route('dashboard'));
    }
    public function destroy(ToDo $toDo): RedirectResponse
    {
        Gate::authorize('delete',$toDo);
        $toDo->delete();
        return redirect(route('dashboard'));
    }

    public function complete(ToDo $toDo): RedirectResponse
    {
        Gate::authorize('update',$toDo);
        $toDo->update(['completed' => true]);

        return redirect()->route('dashboard');
    }
}
