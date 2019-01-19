<div style="margin-bottom: 2em;">
<div class="is-inline-block">
    <div>{{$reply->user->name}}</div>
    <div class="help"><i>{{$reply->created_at->diffForHumans()}}</i></div>
    <div class="box">
      {{$reply->body}}
    </div>
    @include('errors')
</div>
</div>