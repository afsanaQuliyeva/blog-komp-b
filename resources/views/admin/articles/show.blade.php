@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <h1>{{$article->title}}</h1>
            <p>{{$article->desc}}</p>
            <img src="{{$article->image}}" alt="">
            <p>{{$article->content}}</p>
        </section>
    </div>

@endsection
