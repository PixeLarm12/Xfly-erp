<?php

namespace App\Http\Controllers;

use App\Xfly\Model\User;
use App\Xfly\Model\Company;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $companies = Company::all();
        $message[0] = ['content' => '', 'type' => 'message'];
        if (auth()->attempt($request->validated(), $request->getRemember())) {
            return redirect('/')->with('companies');
        }

        $message[0] = ['content' => 'E-MAIL ou SENHA incorretos!', 'type' => 'error'];

        return view('login', compact('message'));
    }

    public function login_page()
    {
        $message[0] = ['content' => '', 'type' => 'message'];

        return view('login', compact('message'));
    }

    public function logout()
    {
        $companies = Company::all();
        auth()->logout();
        session()->flush();

        return redirect('/')->with('companies');
    }

    public function password()
    {
        $message[0] = ['content' => '', 'type' => 'message'];

        return view('Auth.Password.forgot', compact('message'));
    }

    public function confirm(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        $message[0] = ['content' => '', 'type' => 'message'];
        $token = rand(0001, 9999);

        if (count($user) > 0) {
            Mail::send('Auth.Email.forgot', ['code' => $token], function ($m) use ($user) {
                $m->from('ruby.tecnologia.bauru@gmail.com', 'Ruby Tecnologia');
                $m->subject('Esqueci minha senha - Xfly Tecnologia Bauru');
                $m->to($user[0]['email']);
            });

            $value = User::where('id', $user[0]['id'])->update(['token' => $token]);

            return view('Auth.Password.token', compact('user', 'message'));
        }

        $message[0] = ['content' => 'O E-MAIL informado não existe!', 'type' => 'error'];

        return view('Auth.Password.forgot', compact('message'));
    }

    public function verifyToken(Request $request)
    {
        $user = User::where('id', $request->user_id)->get();

        if ($request->token == $user[0]['token']) {
            $message[0] = ['content' => '', 'type' => 'message'];
            $value = User::where('id', $user[0]['id'])->update(['token' => null]);

            return view('Auth.Password.reset', compact('user', 'message'));
        }

        $message[0] = ['content' => 'O código não pôde ser confirmado!', 'type' => 'error'];
        $value = User::where('id', $user[0]['id'])->update(['token' => null]);

        return view('Auth.Password.forgot', compact('message'));
    }

    public function reset(Request $request)
    {
        $user = User::where('id', $request->user_id)->get();

        if ($request->password == $request->password_confirmed) {
            $value = User::where('id', $user[0]['id'])->update(['token' => null, 'password' => bcrypt($request->password)]);

            return redirect('/login/page');
        }

        $message[0] = ['content' => 'As senhas não coincidem!', 'type' => 'error'];

        return view('Auth.Password.reset', compact('user', 'message'));
    }
}
