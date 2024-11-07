<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard',[
            'todos' => ToDo::with('user')->where('user_id',Auth::id())->latest()->get(),
        ]);
    }
}
