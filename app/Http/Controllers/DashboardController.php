<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AcceptedTask;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $data = [
            'posts' => $user->posts->sortByDesc("created_at"),
            'tasks' => $user ->tasks->sortByDesc("created_at"),
        ];
        return view('dashboard')->with($data);
    }
}
