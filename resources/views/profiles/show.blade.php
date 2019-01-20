@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="profile__header">
        <h4 class="title">{{$profileUser->name}}</h4>
        <div class="help">since {{$profileUser->created_at->diffForHumans()}}</div>
    </div>
    <hr>
    <div class="profile__threads">
        <h4 class="forum__heading">Threads</h4>
        @foreach ($threads as $thread)
            <div class="columns threads__list__item">
                <div class="column is-11 thread__content">
                    <h4 class="thread__title">
                        <a href="{{$thread->path()}}">
                            {{$thread->title}}
                        </a>
                    </h4>
                    <div class="thread__body">
                        {{$thread->body}}
                    </div>
                    <div class="thread__info">Created <span class="thread__time">{{$thread->created_at->diffForHumans()}}</span></div>
                </div>
                <div class="column is-1 thread__meta">
                    <div class="thread__comments">
                        <span><i class="fas fa-comment"></i></span> {{$thread->replies_count}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    {{-- <div class="profile__replies">
        <h4 class="forum__heading">Replies</h4>
    </div> --}}
</div>



@endsection





