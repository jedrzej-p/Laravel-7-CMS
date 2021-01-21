@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('flash_message'))
    <div class="col-12 mx-auto px-0">
        <div class="alert alert-success">{{ Session::get('flash_message')}}</div>
    </div>
    @endif
    <div class="row mx-0 justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('admin.user.password') }}">
                @csrf
                <h4>Zmiana hasła</h4>
                <div class="my-3">
                    <label for="current_password"
                        class="col col-form-label px-0 px-lg-3 font-weight-bold">{{ __('Aktualne hasło') }}</label>
                    <div class="col">
                        <input id="current_password" type="password"
                            class="form-control @error('starehaslo') is-invalid @enderror"
                            aria-label="Podaj stare hasło" name="current_password" autofocus>
                        @if ($errors->has('current_password'))
                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="my-3">
                    <label for="new_password"
                        class="col col-form-label px-0 px-lg-3 font-weight-bold">{{ __('Nowe hasło') }}</label>
                    <div class="col">
                        <input id="new_password" type="password"
                            class="form-control @error('new_password') is-invalid @enderror"
                            aria-label="Podaj nowe hasło" name="new_password" autofocus>
                        @if ($errors->has('new_password'))
                        <small class="text-danger">{{ $errors->first('new_password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="my-3">
                    <label for="new_confirm_password"
                        class="col col-form-label px-0 px-lg-3 font-weight-bold">{{ __('Potwierdź nowe hasło') }}</label>
                    <div class="col">
                        <input id="new_confirm_password" type="password"
                            class="form-control @error('new_confirm_password') is-invalid @enderror"
                            aria-label="Zatwierdź hasło" name="new_confirm_password" autofocus>
                        @if ($errors->has('new_confirm_password'))
                        <small class="text-danger">{{ $errors->first('new_confirm_password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="my-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Zatwierdź') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form method="POST" action="{{ route('admin.user.updateprofile') }}">
                @csrf
                <h4>Zmiana danych profilu</h4>
                <div class="my-3">
                    <label for="current_name"
                        class="col col-form-label px-0 px-lg-3 font-weight-bold">{{ __('Nazwa użytkownika') }}</label>
                    <div class="col">
                        <input id="current_name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            aria-label="Podaj nową nazwę" name="current_name" value="{{ $user->name }}" autofocus>
                        @if ($errors->has('current_name'))
                        <small class="text-danger">{{ $errors->first('current_name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="my-3">
                    <label for="current_email"
                        class="col col-form-label px-0 px-lg-3 font-weight-bold">{{ __('Adres email') }}</label>
                    <div class="col">
                        <input id="current_email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            aria-label="Podaj nowy email" name="current_email" value="{{ $user->email }}" autofocus>
                        @if ($errors->has('current_email'))
                        <small class="text-danger">{{ $errors->first('current_email') }}</small>
                        @endif
                    </div>
                </div>
                <div class="my-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Zmień') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
