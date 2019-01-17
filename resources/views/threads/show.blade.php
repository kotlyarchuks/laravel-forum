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
    @include('threads.replies')
    <!-- End foreach -->
    @endforeach
    <!-- Show form if authorized -->
    @if (auth()->check())
    <div class="columns">
        <div class="column is-half">
            <form action="{{$thread->path()}}/replies" method="POST">
                @csrf
                <div class="field">
                    <div class="control" style="margin-bottom: 1em;">
                        <textarea class="textarea" name="body" placeholder="Have something to say?"></textarea>
                    </div>
                    <div class="control">
                        <button class="button is-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @else
    <div><a href="{{route('login')}}">Log in</a> to discuss this stuff!</div>
    @endif
</div>
@endsection