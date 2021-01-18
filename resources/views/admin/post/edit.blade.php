@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" accept-charset="utf-8">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="titleInput">Tytuł</label>
                    <input id="titleInput" name="title" type="text" class="form-control" placeholder="Tytuł..." value="{{$post->title}}" required>
                </div>
                <div class="form-group">
                    <label for="contentInput">Zawartość</label>
                    <textarea id="contentInput" name="content" type="text" class="form-control" placeholder="Zawartość posta">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="categorySelect">Kategoria</label>
                    <select name="category_id" id="categorySelect" class="form-control" required>
                        @foreach ($categories as $category)
                            @if ($category->id == $post->group_id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Data">Data</label>
                    <input id="dateInput" name="date" type="date" class="form-control" value="{{$post->date}}">
                </div>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>
        </div>
    </div>
</div>
@endsection
