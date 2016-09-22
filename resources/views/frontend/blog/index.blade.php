@extends('layouts.master')

@section('title')
    Blog Index
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@endsection

@section('content')
    @foreach($posts as $post)
    <article class="blog-post">
        <h3>{{$post->title}}</h3>
        <span class="subtitle">{{$post->author}} | {{$post->created_at}}</span>
        <p>{{$post->body}}</p>
        <a href="{{route('blog.single', ['post_id' => $post->id, 'frontend'])}}">Read more..</a>
    </article>
    @endforeach
    @if($posts->lastPage() > 1)
        <section class="pagination">
            @if($posts->currentPage() !== 1)
                <a href="{{$posts->previousPageUrl()}}"><span class="fa fa-caret-left"></span></a>
            @endif
            @if($posts->currentPage() !== $posts->lastPage() && $posts->hasPages())
                <a href="{{$posts->nextPageUrl()}}"><span class="fa fa-caret-right"></span></a>
            @endif
        </section>
    @endif

@endsection


