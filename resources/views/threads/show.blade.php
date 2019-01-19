@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-three-quarters">
            <div class="card" style="margin-bottom: 1em;">
                <div class="card-header">{{$thread->title}}</div>

                <div class="card-content">
                    {{$thread->body}}
                </div>
            </div>
            <!-- Replies -->
            @foreach ($replies as $reply)
    @include('threads.replies')
            <!-- End foreach -->
            @endforeach
            <div class="columns">
                <div class="column is-one-quarter has-text-centered" style="margin: 2em 0">
                    {{$replies->links()}}
                </div>
            </div>

            <!-- Form -->
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

        <!-- Sidebar -->
        <div class="column is-one-quarter">
            <div class="box">
                <p>This thread was published by <a href="#">{{$thread->user->name}}</a> {{$thread->created_at->diffForHumans()}}</p>
                <p>It has {{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}</p>
            </div>
        </div>
    </div>


</div>
@endsection