@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-half">
            <div>{{$thread->user->name}}</div>
            <div class="help"><i>{{$thread->created_at->diffForHumans()}}</i></div>
            <div class="card" style="margin-bottom: 1em;">
                <div class="card-header">{{$thread->title}}</div>

                <div class="card-content">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>
    @foreach ($thread->replies as $reply)
    <div class="columns">
        <div class="column is-one-third">
            <div>{{$reply->user->name}}</div>
            <div class="help"><i>{{$reply->created_at->diffForHumans()}}</i></div>
            <div class="box">
                {{$reply->body}}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection