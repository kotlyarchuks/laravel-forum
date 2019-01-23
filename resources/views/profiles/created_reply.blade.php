@component('profiles.profile')
    @slot('heading')
        Replied to thread <a href="{{$activity->subject->thread->path()}}" class="profile__link">"{{$activity->subject->thread->title}}"</a>
    @endslot

    @slot('body')
        {{$activity->subject->body}}
    @endslot

    @slot('counter')
        <span>{{$activity->subject->favorites->count()}} <i class="fas fa-heart"></i></span>
    @endslot
@endcomponent