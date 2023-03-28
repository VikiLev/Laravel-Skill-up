@extends('layouts.base')

@section('page.title')
    Edit post
@endsection
@section('content')
    <h1> Edit post </h1>

    <x-form action="{{ route('user.posts.update', $post->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>
                {{ __('Title') }}
            </label>
            <input type="title" name="title" value="{{ $post->title }}">
        </div>
        <div>
            <label>
                {{ __('content') }}
            </label>
            <textarea name="content" rows="10" >{{ $post->content}}</textarea>
        </div>
        <button type="submit">save</button>
    </x-form>

    <div>
        <a href="{{ route('user.posts.show', $post->id) }}">
            Back
        </a>
    </div>
@endsection
