@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-header"><a href={!! route('detail', $post->id) !!}>{{ $post->title }}</a></div>
                    <div class="card-body">
                        <small>{{ $post->date }}</small>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
