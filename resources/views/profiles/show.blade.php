@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="profile__header">
        <h4 class="title">{{$profileUser->name}}</h4>
        <div class="help">since {{$profileUser->created_at->diffForHumans()}}</div>
    </div>

    <hr>

    <div class="profile__activities">
        @foreach ($activities as $date => $activity)
            <h4>{{$date}}</h4>
            @foreach ($activity as $record)
                @include("profiles.{$record->event_type}", ['activity' => $record])
            @endforeach
        @endforeach
    </div>
</div>
@endsection