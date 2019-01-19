@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-9">
            
            @if ($threads->count())
            <!-- List threads -->
            @foreach ($threads as $thread)
            
                <div class="box content">
                    <article class="post">
                        <a href="{{$thread->path()}}" class="post__link">
                            <h4 class="is-size-4">{{$thread->title}}</h4>
                        </a>
                        <div class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        {{$thread->body}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-actions has-text-grey-light">
                                <span><i class="fa fa-comments"></i> {{$thread->replies_count}}</span>
                                <span>Follow</span>
                            </div>
                    </article>
                </div>

        @endforeach @else
        <p>There are no threads :(</p>
        @endif
            
        </div>
        <div style="margin-top: 2em;">
            {{$threads->links()}}
        </div>
    </div>
</div>
@endsection



