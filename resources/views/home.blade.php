@extends('layouts.app')
@section('title',__('interface.Home'))

@section('content')
<div class="container">
   <a href="{{route("articles.create")}}" class="btn btn-lg btn-primary mb-4">{{__("interface.New Article")}}</a>
</div>

    @forelse($posts  as $post)
    <div class="mb-2">
        <a href="{{route("articles.edit",$post)}}"class="btn btn-warning">{{__('interface.Edit')}}</a>
    <form method="post" action="{{route('articles.destroy',$post)}}" style="display: inline-block">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('{{__("interface.Are you sure?")}}')">{{__('interface.Delete')}}</button>
    </form>
        <a href="{{route("articles.show",$post)}}" class="btn">{{$post->title}}</a>
    </div>
    @empty

    @endforelse
@endsection
