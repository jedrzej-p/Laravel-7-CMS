@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('/admin/categories') }}" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="nameInput">Nazwa</label>
                    <input id="nameInput" name="name" type="text" class="form-control" placeholder="Nazwa kategorii..." required>
                </div>
                <button type="submit" class="btn btn-success">Dodaj</button>
            </form>
        </div>
    </div>
</div>
@endsection
