@extends('layouts.base')

@section('page.title')
    My posts
@endsection
@section('content')
    <h1> My posts </h1>

    @if(empty($posts))
        no posts

    @else
        @foreach($posts as $post)
            <div>
                <a href="{{ route('user.posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </div>
            <div>
                {{ $post->content }}
            </div>
        @endforeach
    @endif
    <a href="{{ route('user.posts.create') }}">
        <button>
            {{ __('Create new post') }}
        </button>
    </a>
@endsection
