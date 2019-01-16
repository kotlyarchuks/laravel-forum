@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-half">
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
            <p class="box">
                {{$reply->body}}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection