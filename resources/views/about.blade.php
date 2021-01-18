@extends('layouts.app')
@section('title',__('About me'))
@section('content')
    @include('part.warn')

<h1>{{__('welcome')}} {{$userName}}</h1>
<a href="clear">Remove my name :(</a>
@endsection
