@csrf
<div class="form-group">
    <label for="title">{{__("interface.Title")}}</label>
    <input name="title" type="text" class="form-control"@isset($article)value="{{$article->title}}"@endisset>
</div>

<div class="form-group">
    @foreach($categories as $key => $title)
        <label for="category {{$key}}">{{__($title)}}</label>
        <input id="category {{$key}}" type="checkbox" value="{{$key}}" name="categories[]"
        @if(isset($article) &&  in_array($key , $artCat)) checked @endif
        >
    @endforeach
</div>

<div class="form-group">
    <label for="content">{{__("interface.Content")}}</label>
    <textarea name="content" id="content" class="form-control" cols="30" rows="10">@isset($article){{$article->content}}@endisset</textarea>
</div>
<div class="form-group">
    <button class="btn btn-success">{{$submit}}</button>
</div>
