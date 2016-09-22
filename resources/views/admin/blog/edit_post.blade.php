@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">

@endsection


@section('content')

    <div class="container">

        @include('includes.info-box')
        <form action="{{route('admin.blog.post.update')}}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" {{$errors->has('title') ? 'class=has-error' : ''}} value="{{Request::old('title')}}">
            </div>

            <div class="input-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" {{$errors->has('author') ? 'class=has-error' : ''}} value="{{Request::old('author')}}">
            </div>
            <div class="input-group">
                <label for="category_select">Add Categories</label>
                <select name="category_select" id="gategory_select">
                    <option value="cat ID">cat</option>
                </select>
                <button type="submit" class="btn">Add Category</button>
                <div class="added-categories">
                    <ul>

                    </ul>
                </div>
                <input type="hidden" name="categories" id="categories">
            </div>
            <div class="input-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" {{$errors->has('body') ? 'class=has-error' : ''}} value="{{Request::old('body')}}"></textarea>
            </div>
            <button type="submit" class="btn">Create Post</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::to('src/js/posts.js')}}"></script>
@endsection