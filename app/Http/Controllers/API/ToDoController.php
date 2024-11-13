<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoRequest;
use App\Http\Resources\ToDoResource;
use App\Models\ToDo;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="ToDo doc API",
 *     version="1.0.0"
 * ),
 * @OA\PathItem(
 *     path="/api/"
 * ),
 */
class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return ToDoResource::collection(ToDo::where('user_id',$user->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToDoRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        $todo = $user->todos()->create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
        return ToDoResource::make($todo);
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $todo)
    {
        return ToDoResource::make($todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToDoRequest $request, ToDo $todo)
    {
        $data = $request->validated();
        $todo->update($data);

        return ToDoResource::make($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $todo)
    {
        $todo->delete();

        return response()->json([
            'message' => 'done'
        ]);
    }
}
