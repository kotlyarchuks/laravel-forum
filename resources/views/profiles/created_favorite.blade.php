@component('profiles.profile')
    @slot('heading')
        {{-- {{dd($activity->subject->toArray())}} --}}
        Liked comment in thread <a href="{{$activity->subject->favorited->thread->path()}}" class="profile__link">"{{$activity->subject->favorited->thread->title}}"</a>
    @endslot

    @slot('body')
        {{$activity->subject->favorited->body}}
    @endslot

    @slot('counter')
    @endslot
@endcomponent