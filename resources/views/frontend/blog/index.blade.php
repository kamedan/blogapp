@extends('layouts.master')

@section('title')
    Blog Index
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@endsection

@section('content')
    <article class="blog-post">
        <h3>Post Title</h3>
        <span class="subtitle">Post Author | Date</span>
        <p>Post Body</p>
        <a href="{{route('blog.single', ['post_id' => 1])}}">Read more..</a>
    </article>
    <section class="pagination">
        Pagination
    </section>

@endsection
