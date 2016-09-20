@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}">
@endsection

@section('content')
    @include('includes.info_box')
    <form action="" method="post" id="contact-form">
        <div class="input-group">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" placeholder="Your Name">
        </div>

        <div class="input-group">
            <label for="email">Your Email</label>
            <input type="text" name="email" id="email" placeholder="Your Email">
        </div>

        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="subject">
        </div>

        <div class="input-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
        </div>
        <button type="submit" class="btn">Send</button>
        <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
@endsection
