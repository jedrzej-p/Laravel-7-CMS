@extends('layouts.app')

@section('pageTitle', 'Dane kontaktowe')

@section('content')
<div class="justify-content-start row px-0 px-lg-2 mx-0 mx-lg-auto no-gutters container">
    <div class="col-12 p-2 post">
        <form method="post" action="{{ route('contact.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label tabindex="0" for="nadawca">Imie i nazwisko</label>
                <input type="text" class="form-control contact-form" name="nadawca" value="{{ old('nadawca') }}"
                    aria-describedby="textHelp" required autofocus>
                @if ($errors->has('nadawca'))
                <small class="text-danger">{{ $errors->first('nadawca') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label tabindex="0" for="email">Adres e-mail</label>
                <input type="email" class="form-control contact-form" name="email" value="{{ old('email') }}"
                    aria-describedby="textHelp" required>
                @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="form-group">
                <label tabindex="0" for="wiadomosc">Wiadomość</label>
                <br>
                <textarea name="wiadomosc" class="form-control contact-form" rows="4"
                    required>{{ old('wiadomosc') }}</textarea>
                @if ($errors->has('wiadomosc'))
                <small class="text-danger">{{ $errors->first('wiadomosc') }}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary border">Wyślij</button>
        </form>
    </div>
</div>
@stop
