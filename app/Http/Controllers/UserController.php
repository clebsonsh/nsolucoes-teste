<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')
            ->with(['users' => User::latest()->paginate(20)]);
    }

    public function store(Request $request)
    {
        // verifica se os campos de criação de usuários foram preenchidos coretamente
        $validated = request()->validate([
            'nome_completo' => 'required|string|min:3|max:255',
            'cpf' => 'required|string|max:14|unique:users,cpf',
            'email' => 'required|email|unique:users,email',
            'telefone' => 'required|string|max:15',
            'cep' => 'required|string|max:9',
            'endereco' => 'required|string|min:3|max:255',
            'numero' => 'required|numeric|min:0|max:999999',
            'complemento' => 'required|string|min:3|max:255',
            'bairro' => 'required|string|min:3|max:255',
            'cidade' => 'required|string|min:3|max:255',
            'estado' => ' required|string|max:2',
        ]);

        // cria o novo usuário no banco de dados
        User::create($validated);

        // retorna para lista de usuários
        return back();
    }

    public function update(Request $request, User $user)
    {
        // verifica se os campos de criação de usuários foram preenchidos coretamente
        $validated = request()->validate([
            'nome_completo' => 'required|string|min:3|max:255',
            'cpf' => 'required|string|max:14|unique:users,cpf,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telefone' => 'required|string|max:15',
            'cep' => 'required|string|max:9',
            'endereco' => 'required|string|min:3|max:255',
            'numero' => 'required|numeric|min:0|max:999999',
            'complemento' => 'required|string|min:3|max:255',
            'bairro' => 'required|string|min:3|max:255',
            'cidade' => 'required|string|min:3|max:255',
            'estado' => ' required|string|max:2',
        ]);

        // cria o novo usuário no banco de dados
        $user->update($validated);

        // retorna para lista de usuários
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
