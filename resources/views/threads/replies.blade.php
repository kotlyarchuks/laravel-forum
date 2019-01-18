<div class="columns">
  <div class="column is-one-third">
    <div>{{$reply->user->name}}</div>
    <div class="help"><i>{{$reply->created_at->diffForHumans()}}</i></div>
    <div class="box">
      {{$reply->body}}
    </div>
  @include('errors')
  </div>
</div>