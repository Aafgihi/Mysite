@extends('layouts.app')
@section('title',__('interface.Articles'))
@section('content')
    <H2 CLASS="text primary">{{__('interface.Last Article')}}</H2> <br>
    <div class="row">

        @forelse($arts as $art)

            @include('article.artcard')

        @empty

        @endforelse

    </div>

    <a class="btn" href="{{route('articles.index')}}">{{__('interface.Show all articles')}}</a>


@endsection
