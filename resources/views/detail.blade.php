@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <small>{{ $post->date }}</small>
                    <p>{{ $post->content}}</p>
                    <a title="Udostępnianie strony na Facebook" class="btn btn-primary"
                        href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"
                        aria-label="Przycisk udostępniania na Facebook">Udostępnij na FB
                        test
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
