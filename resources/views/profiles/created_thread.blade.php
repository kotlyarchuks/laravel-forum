@component('profiles.profile')
    @slot('heading')
        Created thread <a href="{{$activity->subject->path()}}" class="profile__link">"{{$activity->subject->title}}"</a>
    @endslot

    @slot('body')
        {{$activity->subject->body}}
    @endslot

    @slot('counter')
        <span>{{$activity->subject->replies_count}} <i class="fas fa-comment"></i></span>
    @endslot
@endcomponent