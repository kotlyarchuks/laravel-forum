@extends('layouts.app') 
@section('content')

<div class="forum-container">
    <div class="columns">
        @include('threads.forum-left')
        <div class="forum__center column is-8">
            <div class="forum__filter">
                <input type="text" class="filter__searchbar" placeholder="What to search?" />
            </div>
            <div class="threads__list">
                @if ($threads->count())
                <!-- List threads -->
                @foreach ($threads as $thread)
                <div class="columns threads__list__item">
                    <div class="column is-1"><div class="thread__img"></div></div>
                    <div class="column is-10 thread__content">
                        <h4 class="thread__title">
                            <a href="{{$thread->path()}}">
                                {{$thread->title}}
                            </a>
                        </h4>
                        <div class="thread__body">
                            {{$thread->body}}
                        </div>
                        <div class="thread__info">Created <span class="thread__time">{{$thread->created_at->diffForHumans()}}</span> ago by <span class="thread__author"><a href="/profiles/{{$thread->user->name}}">{{$thread->user->name}}</a></span></div>
                    </div>
                    <div class="column is-1 thread__meta">
                        <div class="thread__comments">
                            <span><i class="fas fa-comment"></i></span> {{$thread->replies_count}}
                        </div>
                    </div>
                </div>
                @endforeach @endif
            </div>
            <div style="margin-top: 2em;">
                {{$threads->links()}}
            </div>
        </div>
        @include('threads.forum-right')
    </div>
</div>


@endsection





