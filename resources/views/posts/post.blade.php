@extends('layout.app')

@section('content')
    <div class="container">
        <a href='\{{ $post->id }}'> 
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
        <p>{!! $post->body !!}</p>
        <a href='\'>go back</a>
    </div>   

@endsection