@extends('layout.app')

@section('content')
    <div class="container">
    @foreach ($posts as $post)
    <div>
        <a href='\post\{{ $post->slug }}'> 
            <h1>{!! $post->title !!}</h1>
        </a>
        <p>
            Written by 
            <a href='\author\{{ $post->user->username }}'>
                {{ $post->user->name }}
            </a> in category 
            <a href='\category\{{ $post->category->slug}}'>
                {{ $post->category->name }}
            </a>
        </p>
        <p>{!! $post->excerpt !!}</p>
    </div>
    @endforeach
</div>
@endsection