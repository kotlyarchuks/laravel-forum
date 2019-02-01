@extends('layouts.app') 
@section('content')
<div class="forum-container">
    <div class="columns">
    @include('threads.forum-left')
        <div class="forum__center column is-8">
            <thread-view inline-template :initial-replies-count="{{$thread->replies_count}}">
                <div class="threads__list">
                    <div class="columns threads__list__item">
                        <div class="column is-1">
                            <div class="thread__img"></div>
                        </div>
                        <div class="column is-11 thread__content">
                            <div class="thread__head">
                                <div class="thread__head__main">
                                    <h4 class="thread__title is-inline"><a href="/profiles/{{$thread->user->name}}">{{$thread->user->name}}</a></h4> <span class="thread__info">- {{$thread->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="thread__head__meta">
                                    <span class="meta__icon"><i class="fas fa-comment"></i> <span v-text="repliesCount"></span></span>
                                    <span class="thread__tag">{{$thread->category->name}}</span> @can('update', $thread)
                                    <form action="{{$thread->path()}}" method="POST" id="delete-thread-form" class="is-inline">
                                        @csrf @method('DELETE')
                                        <span class="thread__delete"><i class="fas fa-trash-alt" onclick="document.getElementById('delete-thread-form').submit()"></i></span>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            <div class="thread__topic thread__title">
                                {{$thread->title}}
                            </div>
                            <div class="thread__body">
                                {{$thread->body}}
                            </div>
                        </div>
                    </div>

                    {{-- Comments --}}
                    <replies :data="{{$thread->replies}}" @removed="repliesCount--"></replies>

                    @if (auth()->check())
                    <newreply data="{{$thread}}" @submitMessage=""></newreply>
                    @else
                    <div><a href="{{route('login')}}">Log in</a> to discuss this stuff!</div>
                    @endif {{-- End form --}}
                </div>
            </thread-view>
        </div>
    @include('threads.forum-right')
    </div>
</div>
</thread>
@endsection