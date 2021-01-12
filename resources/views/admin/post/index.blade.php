@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('flash_message'))
    <div class="col-12 mx-auto px-0">
        <div class="alert alert-success">{{ Session::get('flash_message')}}</div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 mb-2">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Dodaj post</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post</th>
                        <th>Data</th>
                        <th>Opcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->date }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Grupa przycisków z opcjami">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" type="button" class="btn btn-success">Edytuj</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"
                                    accept-charset="utf-8">
                                    @csrf
                                    @method("DELETE")
                                    <div class="form-group col-12 mb-0 pl-0">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" onclick="return confirm('Czy napewno usunąć?')"
                                                class="btn btn-danger rounded-right" style="border-radius: 0;">Usuń</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
