@extends('layouts.master')

@section('title')
    Post title
@endsection

@section('content')
    <article>
        <h1>{{$post->title}}</h1>
        <span class="info">{{$post->author }} | {{$post->created_at}}</span>
        <p>{{$post->body }}</p>

    </article>

@endsection
