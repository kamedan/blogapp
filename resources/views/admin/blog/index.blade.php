@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

@endsection


@section('content')
    <div class="container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{route('admin.blog.create_post')}}" class="btn">New Post</a>
        </section>
        <section class="list">

                @if(count($posts) == 0)
                    No posts
                @else
                    @foreach($posts as $post)

                            <article>
                                <div class="post-info">
                                    <h3>{{$post->title}}</h3>
                                    <span class="info">{{$post->author }} | {{$post->created_at}}</span>
                                    <p>{{$post->body }}</p>

                                </div>
                                <div class="edit">
                                    <ul>
                                        <li><a href="{{route('admin.blog.post', ['post_id' => $post->id, 'end' => 'admin'])}}">View Post</a></li>
                                        <li><a href="{{route('admin.blog.post.edit', ['post_id' => $post->id])}}">Edit</a></li>
                                        <li><a href="{{route('admin.blog.post.delete', ['post_id' => $post->id])}}" class="danger">Delete</a></li>
                                    </ul>
                                </div>
                            </article>

                    @endforeach
                @endif
        </section>
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
    </div>

@endsection