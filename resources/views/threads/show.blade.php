@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 1em;">
                <div class="card-header">{{$thread->title}}</div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
