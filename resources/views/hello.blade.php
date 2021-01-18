@extends('layouts.app')
@section('title','Contact me')
@section('content')
    @include('part.warn')
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
    @php
    $today = date('d-m-y')
    @endphp
    <p>Today: {{$today}}</p>
    @if(date('D') != 'Mon')
        <h2>{{$message}}</h2>
    @endif
        @auth
            <p>Welcome {{$user->name}}</p>
        @endauth
<form action="" method="post">
    {{csrf_field()}}
    <div class="form-group">
    <input type="text" name="nameofsender" placeholder="Your name">
    </div>
    <div class="form-group">
        <select>
            @forelse($option as $option)
                <option>{{$option}}</option>
            @empty
                <option>null</option>
            @endforelse
        </select>

    </div>
    <div class="form-group">
    <textarea cols="30" rows="5" name="message" placeholder="massege"></textarea>
    </div>
    <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Send!</button>
    </div>
</form>
@endsection
