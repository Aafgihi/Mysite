@extends('layouts.app')

@section('title',$article -> title)

@section('content')
<div class="card">

    <h2 class="card-header" dir="rtl">{{$article->title}}</h2>
    <div class="card-body">
        {!! nl2br($article->content) !!}
    </div>
    <div class="card-header">
        <div><b>{{__("interface.Author")}}</b>{{$article->user->name}}</div>
        <div><b>{{__("interface.Created")}}: </b>{{$article->created_at}}</div>
        <div><b>{{__("interface.Updated")}}: </b>{{$article->updated_at}}</div>
    </div>
</div>
{{__('interface.Comments')}}
<div class="mt-4">

    @forelse($article->comments as $comment )
        <div class="card - p - 3 mb-2">
            {{$comment->content}}
            <p>{{__('interface.Author')}}:{{$comment->user->name}}</p>
        </div>
    @empty
    @endforelse

</div>
@auth
    <div class="mt-5">
<div class="card">
    <h4 class="card-header">{{__('interface.Write your comment here')}}</h4>
    <div class="card-body">
        <form action="{{route('comment.store',$article->id)}}" method="post">
            @csrf
            <div class="form-group">

                <label for="content">{{__('interface.comment')}}</label>
                <textarea class="form-control" name="content" id="content" placeholder="{{__('interface.Write your comment here')}}" cols="30" rows="10"></textarea>

            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">{{__('interface.Save')}}</button>
            </div>
        </form>

    </div>
</div>

    </div>
@else
    <div>
        <p>{{__('interface.please login can write comment')}}</p>
    </div>
@endauth
@endsection
