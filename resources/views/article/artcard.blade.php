<div class="col-md-4 pb-5">

    <div class="card">
        <h4 class="card-header"><a class="btn" href="{{route('articles.show',$art->id)}}"> {{$art->title}}</a></h4>
        <div class="card-body">
            {{$art->content}}
        </div>
        <div class="card-footer">
            {{__('interface.Author')}} : {{$art->user->name}}
        </div>
    </div>
</div>
