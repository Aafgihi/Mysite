@extends('layouts.app')

@section('title',__("interface.edit article"))

@section('content')

    <h2 dir="rtl">{{__("interface.edit article")}} : {{$article->title}}</h2>

    <form  action="{{route("articles.update", $article)}}" method="post">
        @method('PATCH')
        @include('article.form',['submit' =>__("interface.Edit")])


    </form>

@endsection
