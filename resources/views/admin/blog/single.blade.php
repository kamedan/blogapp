@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

@endsection


@section('content')
    @include('includes.info-box')
    <div class="container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{route('admin.blog.create_post')}}" class="btn">Edit Post</a>
            <a href="{{route('admin.blog.create_post')}}" class="btn">Delete Post</a>
        </section>
        <section class="post">


                            <h1>{{$post->title}}</h1>
                            <span class="info">{{$post->author }} | {{$post->created_at}}</span>
                            <p>{{$post->body }}</p>




        </section>

    </div>

@endsection