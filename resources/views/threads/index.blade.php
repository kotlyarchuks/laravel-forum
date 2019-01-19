@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($threads->count()) @foreach ($threads as $thread)
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 1em;">
                <div class="card-header">
                    <a href="{{$thread->path()}}">
                        <h4 class="title is-size-5">{{$thread->title}}</h4>
                    </a>
                </div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
        </div>
        @endforeach @else
        <div class="div col-md-8">
            <p>There are no threads :(</p>
        </div>
        @endif
        <div style="margin-top: 2em;">
            {{$threads->links()}}
        </div>
    </div>
</div>
@endsection