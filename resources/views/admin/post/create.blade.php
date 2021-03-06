@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('/admin/posts') }}" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="titleInput">Tytuł</label>
                    <input id="titleInput" name="title" type="text" class="form-control" placeholder="Tytuł..." required>
                </div>
                <div class="form-group">
                    <label for="contentInput">Zawartość</label>
                    <textarea id="contentInput" name="content" type="text" class="form-control" placeholder="Zawartość posta" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categorySelect">Kategoria</label>
                    <select name="category_id" id="categorySelect" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Data">Data dodania</label>
                    <input id="dateInput" name="date" type="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Dodaj</button>
            </form>
        </div>
    </div>
</div>
@endsection
