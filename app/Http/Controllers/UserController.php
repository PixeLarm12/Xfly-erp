<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xfly\Model\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    private $total_pages = 10;

    public function index()
    {
        $users = User::paginate($this->total_pages);

        return view('Users.welcome', compact('users'));
    }

    public function create()
    {
        return view('Users.create');
    }

    public function store(UserCreateRequest $request)
    {
        if ($request->validated()) {
            User::create($request->data());

            return redirect('/login/page');
        }

        echo 'Erro ao cadastrar Admin';
    }

    public function edit(User $user)
    {
        return view('Users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        $users = User::paginate($this->total_pages);

        return redirect('/users')->with('users');
    }

    public function destroy(Request $request)
    {
        if ($request->confirm == 1) {
            User::where('id', $request->id)->delete();
        }

        $users = User::paginate($this->total_pages);

        return redirect('/users')->with('users');
    }
}
