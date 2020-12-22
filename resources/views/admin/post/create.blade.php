@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('/admin/posts') }}" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="titleInput">Tytuł</label>
                    <input id="titleInput" name="title" type="text" class="form-control" placeholder="Tytuł...">
                </div>
                <div class="form-group">
                    <label for="contentInput">Zawartość</label>
                    <input id="contentInput" name="content" type="text" class="form-control" placeholder="Zawartość posta">
                </div>
                <div class="form-group">
                    <label for="Data"></label>
                    <input id="dateInput" name="date" type="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Dodaj</button>
            </form>
        </div>
    </div>
</div>
@endsection
