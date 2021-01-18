@extends('layouts.app')

@section('title',__("interface.create new article"))

@section('content')

    <h2 dir="rtl">{{__("interface.Create New Article")}}</h2>

    <form  action="{{route("articles.store")}}" method="post">

        @include('article.form',['submit' =>__("interface.Save")])


    </form>

@endsection
