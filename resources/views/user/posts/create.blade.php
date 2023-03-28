@extends('layouts.base')

@section('page.title')
    My posts
@endsection
@section('content')
    <h1> Create post </h1>

    <x-form action="{{ route('user.posts.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>
                {{ __('Title') }}
            </label>
            <input type="title" name="title">
        </div>
        <div>
            <label>
                {{ __('content') }}
            </label>
            <textarea name="content" rows="10"></textarea>
        </div>
        <button type="submit">save</button>
    </x-form>

    <div>
        <a href="{{ route('user.posts.index') }}">
            Back
        </a>
    </div>
@endsection
