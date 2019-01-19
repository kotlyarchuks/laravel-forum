@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-three-quarters">
            <div class="box content">
                <article class="post">
                    <h4 class="is-size-4">{{$thread->title}}</h4>
                    <div class="media">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    {{$thread->body}}
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Replies -->
            @if ($replies->count())
                @foreach ($replies as $reply)
                @include('threads.replies')
            <!-- End foreach -->
                @endforeach
            @endif
                  
            {{$replies->links()}}

            <!-- Form -->
            @if (auth()->check())
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
            @else
            <div><a href="{{route('login')}}">Log in</a> to discuss this stuff!</div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="column is-one-quarter">
            <div class="box">
                <p>This thread was published by <a href="#">{{$thread->user->name}}</a> in {{$thread->category->name}} {{$thread->created_at->diffForHumans()}}</p>
                <p>It has {{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}</p>
            </div>
        </div>
    </div>


</div>
@endsection