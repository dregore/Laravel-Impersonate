<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var User|null $user */
        $user = Auth::user();
        $users = collect();

        if ($user && $user?->isAdmin()) {
            $users = User::all();
        }

        return view('dashboard', compact('users'));
    }
}
