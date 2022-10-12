@extends('layouts.app')

@section('content')
    @forelse ($users as $user)
        <p>
            {{ $user->name }}
        </p>
    @empty
        <p>
            Nenhum Usuário cadastrado
        </p>
    @endforelse
@endsection
