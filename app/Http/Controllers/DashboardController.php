<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard',[
            'todos' => ToDo::with('user')->latest()->get(),
        ]);
    }
}
