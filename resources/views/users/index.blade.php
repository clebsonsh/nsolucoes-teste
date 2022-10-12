@extends('layouts.app')

@section('content')
    <div class="container-xl p-4">
        <h1 class="text-center">Listagem De Usuários</h1>
        <!-- Button novo usuário modal -->
        <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal" data-bs-target="#modalNovoUsuario">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="icon me-2">
                <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
            </svg>
            Criar novo usuário
        </button>
        @if ($errors->isNotEmpty())
            <div class="mt-2 alert alert-danger" role="alert">
                Aconteceu algum erro com os dados do usuário, tente novamente
            </div>
        @endif

        <!-- Modal novo usuário -->
        <div class="modal fade" id="modalNovoUsuario" tabindex="-1" aria-labelledby="modalNovoUsuarioLaval"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalNovoUsuarioLaval">Criar novo usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-2">
                            <label for="nome_completo" class="col-md-4 col-form-label text-md-end">
                                Nome Completo:
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="nome_completo" class="form-control" name="nome_completo"
                                    value="{{ old('nome_completo') }}" required>
                                @error('nome_completo')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">
                                CPF:
                            </label>
                            <div class="col-md-8">
                                <input onkeyup="inputMask.cpf(this)" type="text" id="cpf" class="form-control"
                                    name="cpf" value="{{ old('cpf') }}" required>
                                @error('cpf')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                E-Mail:
                            </label>
                            <div class="col-md-8">
                                <input onkeyup="inputMask.email(this)" type="email" id="email" class="form-control"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="telefone" class="col-md-4 col-form-label text-md-end">
                                Telefone:
                            </label>
                            <div class="col-md-8">
                                <input onkeyup="inputMask.telefone(this)" type="text" id="telefone" class="form-control"
                                    name="telefone" value="{{ old('telefone') }}" required>
                                @error('telefone')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="cep" class="col-md-4 col-form-label text-md-end">
                                CEP:
                            </label>
                            <div class="col-md-8">
                                <input onkeyup="inputMask.cep(this)" type="text" id="cep" class="form-control"
                                    name="cep" value="{{ old('cep') }}" required>
                                @error('cep')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="endereco" class="col-md-4 col-form-label text-md-end">
                                Endereço:
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="endereco" class="form-control" name="endereco"
                                    value="{{ old('endereco') }}" required>
                                @error('cendereco')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-2">
                            <label for="numero" class="col-md-4 col-form-label text-md-end">
                                Número:
                            </label>
                            <div class="col-md-8">
                                <input type="number" id="numero" class="form-control" name="numero"
                                    value="{{ old('numero') }}" required>
                                @error('numero')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="complemento" class="col-md-4 col-form-label text-md-end">
                                Complemento:
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="complemento" class="form-control" name="complemento"
                                    value="{{ old('complemento') }}" required>
                                @error('complemento')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="bairro" class="col-md-4 col-form-label text-md-end">
                                Bairro:
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="bairro" class="form-control" name="bairro"
                                    value="{{ old('bairro') }}" required>
                                @error('bairro')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="cidade" class="col-md-4 col-form-label text-md-end">
                                Cidade:
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="cidade" class="form-control" name="cidade"
                                    value="{{ old('cidade') }}" required>
                                @error('cidade')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">
                                Estado:
                            </label>
                            <div class="col-md-8">
                                <select class="form-select" id="estado" name="estado" value="{{ old('estado') }}"
                                    required>
                                    <option value="AC" @selected(old('estado') == 'AC')>AC</option>
                                    <option value="AL" @selected(old('estado') == 'AL')>AL</option>
                                    <option value="AP" @selected(old('estado') == 'AP')>AP</option>
                                    <option value="AM" @selected(old('estado') == 'AM')>AM</option>
                                    <option value="BA" @selected(old('estado') == 'BA')>BA</option>
                                    <option value="CE" @selected(old('estado') == 'CE')>CE</option>
                                    <option value="DF" @selected(old('estado') == 'DF')>DF</option>
                                    <option value="ES" @selected(old('estado') == 'ES')>ES</option>
                                    <option value="GO" @selected(old('estado') == 'GO')>GO</option>
                                    <option value="MA" @selected(old('estado') == 'MA')>MA</option>
                                    <option value="MT" @selected(old('estado') == 'MT')>MT</option>
                                    <option value="MS" @selected(old('estado') == 'MS')>MS</option>
                                    <option value="MG" @selected(old('estado') == 'MG')>MG</option>
                                    <option value="PA" @selected(old('estado') == 'PA')>PA</option>
                                    <option value="PB" @selected(old('estado') == 'PB')>PB</option>
                                    <option value="PR" @selected(old('estado') == 'PR')>PR</option>
                                    <option value="PE" @selected(old('estado') == 'PE')>PE</option>
                                    <option value="PI" @selected(old('estado') == 'PI')>PI</option>
                                    <option value="RJ" @selected(old('estado') == 'RJ')>RJ</option>
                                    <option value="RN" @selected(old('estado') == 'RN')>RN</option>
                                    <option value="RS" @selected(old('estado') == 'RS')>RS</option>
                                    <option value="RO" @selected(old('estado') == 'RO')>RO</option>
                                    <option value="RR" @selected(old('estado') == 'RR')>RR</option>
                                    <option value="SC" @selected(old('estado') == 'SC')>SC</option>
                                    <option value="SP" @selected(old('estado') == 'SP')>SP</option>
                                    <option value="SE" @selected(old('estado') == 'SE')>SE</option>
                                    <option value="TO" @selected(old('estado') == 'TO')>TO</option>
                                </select>
                                @error('estado')
                                    <div class="mt-2 alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        {{ $users->links() }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nome_completo }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefone }}</td>
                        <td>
                            <div class="d-flex">
                                <div role="button" data-bs-toggle="modal"
                                    data-bs-target="#modalMostrarUsuario{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="icon">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>

                                <div role="button" data-bs-toggle="modal"
                                    data-bs-target="#modalEditarUsuario{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="ms-2 icon">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>

                                </div>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <svg role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor"
                                        onclick="event.preventDefault()
                                        if (confirm('Tem certeza que quer excluir')) {
                                        this.closest('form').submit()
                                        }"
                                        class="ms-2 icon">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @foreach ($users as $user)
            <!-- Modal mostrar usuário -->
            <div class="modal fade" id="modalMostrarUsuario{{ $user->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalMostrarUsuario{{ $user->id }}Label">
                                Mostrar usuário
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-2">
                                <label for="nome_completo" class="col-md-4 col-form-label text-md-end">
                                    Nome Completo:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="nome_completo" class="form-control" name="nome_completo"
                                        value="{{ $user->nome_completo }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="cpf" class="col-md-4 col-form-label text-md-end">
                                    CPF:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="cpf" class="form-control" name="cpf"
                                        value="{{ $user->cpf }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    E-Mail:
                                </label>
                                <div class="col-md-8">
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ $user->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="telefone" class="col-md-4 col-form-label text-md-end">
                                    Telefone:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="telefone" class="form-control" name="telefone"
                                        value="{{ $user->telefone }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="cep" class="col-md-4 col-form-label text-md-end">
                                    CEP:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="cep" class="form-control" name="cep"
                                        value="{{ $user->cep }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="endereco" class="col-md-4 col-form-label text-md-end">
                                    Endereço:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="endereco" class="form-control" name="endereco"
                                        value="{{ $user->endereco }}" disabled>
                                </div>
                            </div>



                            <div class="form-group row mb-2">
                                <label for="numero" class="col-md-4 col-form-label text-md-end">
                                    Número:
                                </label>
                                <div class="col-md-8">
                                    <input type="number" id="numero" class="form-control" name="numero"
                                        value="{{ $user->numero }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="complemento" class="col-md-4 col-form-label text-md-end">
                                    Complemento:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="complemento" class="form-control" name="complemento"
                                        value="{{ $user->complemento }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="bairro" class="col-md-4 col-form-label text-md-end">
                                    Bairro:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="bairro" class="form-control" name="bairro"
                                        value="{{ $user->bairro }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="cidade" class="col-md-4 col-form-label text-md-end">
                                    Cidade:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="cidade" class="form-control" name="cidade"
                                        value="{{ $user->cidade }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="estado" class="col-md-4 col-form-label text-md-end">
                                    Estado:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="estado" class="form-control" name="estado"
                                        value="{{ $user->estado }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal editar usuário -->
            <div class="modal fade" id="modalEditarUsuario{{ $user->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalEditarUsuario{{ $user->id }}Label">Criar novo
                                usuário
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-2">
                                <label for="nome_completo" class="col-md-4 col-form-label text-md-end">
                                    Nome Completo:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="nome_completo" class="form-control" name="nome_completo"
                                        value="{{ $user->nome_completo }}" required>
                                    @error('nome_completo')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="cpf" class="col-md-4 col-form-label text-md-end">
                                    CPF:
                                </label>
                                <div class="col-md-8">
                                    <input onkeyup="inputMask.cpf(this)" type="text" id="cpf"
                                        class="form-control" name="cpf" value="{{ $user->cpf }}" required>
                                    @error('cpf')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    E-Mail:
                                </label>
                                <div class="col-md-8">
                                    <input onkeyup="inputMask.email(this)" type="email" id="email"
                                        class="form-control" name="email" value="{{ $user->email }}" required>
                                    @error('email')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="telefone" class="col-md-4 col-form-label text-md-end">
                                    Telefone:
                                </label>
                                <div class="col-md-8">
                                    <input onkeyup="inputMask.telefone(this)" type="text" id="telefone"
                                        class="form-control" name="telefone" value="{{ $user->telefone }}" required>
                                    @error('telefone')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="cep" class="col-md-4 col-form-label text-md-end">
                                    CEP:
                                </label>
                                <div class="col-md-8">
                                    <input onkeyup="inputMask.cep(this)" type="text" id="cep"
                                        class="form-control" name="cep" value="{{ $user->cep }}" required>
                                    @error('cep')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="endereco" class="col-md-4 col-form-label text-md-end">
                                    Endereço:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="endereco" class="form-control" name="endereco"
                                        value="{{ $user->endereco }}" required>
                                    @error('cendereco')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-2">
                                <label for="numero" class="col-md-4 col-form-label text-md-end">
                                    Número:
                                </label>
                                <div class="col-md-8">
                                    <input type="number" id="numero" class="form-control" name="numero"
                                        value="{{ $user->numero }}" required>
                                    @error('numero')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="complemento" class="col-md-4 col-form-label text-md-end">
                                    Complemento:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="complemento" class="form-control" name="complemento"
                                        value="{{ $user->complemento }}" required>
                                    @error('complemento')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="bairro" class="col-md-4 col-form-label text-md-end">
                                    Bairro:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="bairro" class="form-control" name="bairro"
                                        value="{{ $user->bairro }}" required>
                                    @error('bairro')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="cidade" class="col-md-4 col-form-label text-md-end">
                                    Cidade:
                                </label>
                                <div class="col-md-8">
                                    <input type="text" id="cidade" class="form-control" name="cidade"
                                        value="{{ $user->cidade }}" required>
                                    @error('cidade')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-2">
                                <label for="estado" class="col-md-4 col-form-label text-md-end">
                                    Estado:
                                </label>
                                <div class="col-md-8">
                                    <select class="form-select" id="estado" name="estado"
                                        value="{{ $user->estado }}" required>
                                        <option value="AC" @selected($user->estado == 'AC')>AC</option>
                                        <option value="AL" @selected($user->estado == 'AL')>AL</option>
                                        <option value="AP" @selected($user->estado == 'AP')>AP</option>
                                        <option value="AM" @selected($user->estado == 'AM')>AM</option>
                                        <option value="BA" @selected($user->estado == 'BA')>BA</option>
                                        <option value="CE" @selected($user->estado == 'CE')>CE</option>
                                        <option value="DF" @selected($user->estado == 'DF')>DF</option>
                                        <option value="ES" @selected($user->estado == 'ES')>ES</option>
                                        <option value="GO" @selected($user->estado == 'GO')>GO</option>
                                        <option value="MA" @selected($user->estado == 'MA')>MA</option>
                                        <option value="MT" @selected($user->estado == 'MT')>MT</option>
                                        <option value="MS" @selected($user->estado == 'MS')>MS</option>
                                        <option value="MG" @selected($user->estado == 'MG')>MG</option>
                                        <option value="PA" @selected($user->estado == 'PA')>PA</option>
                                        <option value="PB" @selected($user->estado == 'PB')>PB</option>
                                        <option value="PR" @selected($user->estado == 'PR')>PR</option>
                                        <option value="PE" @selected($user->estado == 'PE')>PE</option>
                                        <option value="PI" @selected($user->estado == 'PI')>PI</option>
                                        <option value="RJ" @selected($user->estado == 'RJ')>RJ</option>
                                        <option value="RN" @selected($user->estado == 'RN')>RN</option>
                                        <option value="RS" @selected($user->estado == 'RS')>RS</option>
                                        <option value="RO" @selected($user->estado == 'RO')>RO</option>
                                        <option value="RR" @selected($user->estado == 'RR')>RR</option>
                                        <option value="SC" @selected($user->estado == 'SC')>SC</option>
                                        <option value="SP" @selected($user->estado == 'SP')>SP</option>
                                        <option value="SE" @selected($user->estado == 'SE')>SE</option>
                                        <option value="TO" @selected($user->estado == 'TO')>TO</option>
                                    </select>
                                    @error('estado')
                                        <div class="mt-2 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
