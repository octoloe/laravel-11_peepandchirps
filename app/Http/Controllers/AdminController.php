<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::where('is_admin', 0)->get()
        ]);
    }

    public function block(User $user)
    {
        $user->update(['banned_at' => now()->addMonth()]);

        return redirect()->back()->with('success', 'The User has been blocked!');
    }

    public function unblock(User $user)
    {
        $user->update(['banned_at' => null]);

        return redirect()->back()->with('success', 'The User has been unblocked!');
    }
}