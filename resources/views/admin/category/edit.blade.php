@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" accept-charset="utf-8">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nameInput">Nazwa kategorii</label>
                    <input id="nameInput" name="name" type="text" class="form-control" placeholder="Tytuł kategorii..." value="{{$category->name}}" required>
                </div>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>
        </div>
    </div>
</div>
@endsection
