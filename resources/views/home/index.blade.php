@extends('layouts.app')

@section('content')
    <main class="login-form pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    @guest
                        <div class="card">
                            <div class="card-header text-center">Login</div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group row mb-2">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">
                                            E-Mail:
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" id="email" class="form-control" name="email"
                                                value="{{ old('email') }}" required autofocus>
                                            @error('email')
                                                <div class="mt-2 alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">
                                            Senha:
                                        </label>
                                        <div class="col-md-8">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                            @error('password')
                                                <div class="mt-2 alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3 offset-md-9">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Enviar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endguest
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="btn btn-primary"
                                onclick="event.preventDefault();
                                   this.closest('form').submit();">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
