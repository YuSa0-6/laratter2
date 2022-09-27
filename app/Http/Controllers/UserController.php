<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    //user delete
    public function show()
    {
        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $this->authorize('edit', $user);
        $user->delete();
        return redirect('login');
    }
}
