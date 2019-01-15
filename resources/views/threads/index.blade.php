@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($threads as $thread) 
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
        @endforeach
    </div>
</div>
@endsection
