<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function store(Request $request)
    {
        // verifica se os campos de login foram preenchidos
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // tenta logar o usuario usando os dados informados
        // se estiver tudo certo o usuário e logado no sistema e redirecionado
        if (auth()->attempt($validated)) {
            return redirect()->route('users.index')->with('success', 'Usuário logado com sucesso');
        }

        // caso os dados de login estejam incorrentos o usuário recebe um mensagem de erro
        throw ValidationException::withMessages([
            'email' => 'E-mail ou senha incorreto'
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Usuário deslogado com sucesso');
    }
}
