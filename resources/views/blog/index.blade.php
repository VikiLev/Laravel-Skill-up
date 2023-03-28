@extends('layouts.base')

@section('page.title')
    list of posts
@endsection
@section('content')
    <h1> list of posts </h1>
    
    <form action="{{ route('blog') }}" method="get">
        <div>
            <input type="search" id="search" name="search" value="{{ request('search') }}" />
            <select name="category_id" id="category_id">
                @php
                    $options = [null => 'All', 1 => 'first', 2 => 'second'];
                @endphp
                @foreach($options as $key=>$value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Search</button>
        </div>
    </form>

    @if(empty($posts))
        no posts

    @else
        @foreach($posts as $post)
            <div>
                <a href="{{ route('blog.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </div>
            <div>
                {{ $post->content }}
            </div>
        @endforeach
    @endif
@endsection
