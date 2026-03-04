<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $users = collect();
    if (Auth::user()->isAdmin()) {
        $users = User::all();
    }

    //$user = auth()->user();
    return view('dashboard', compact('users'));
}
}
