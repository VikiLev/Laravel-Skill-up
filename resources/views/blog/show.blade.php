@extends('layouts.base')

@section('page.title')
    {{ $post->title }}
@endsection
@section('content')
    <h1> {{ $post->title }} </h1>
    <div>
        {{ $post->content }}
    </div>
    <div>
        <a href="{{ route('blog') }}">
           Back
        </a>
    </div>
@endsection
