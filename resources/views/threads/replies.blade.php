<reply :reply="{{$reply}}" inline-template v-cloak>
    <div class="columns threads__list__item">
        <div class="column is-1">
            <div class="thread__img"></div>
        </div>
        <div class="column is-11 thread__content">
            <div class="thread__head">
                <div class="thread__head__main">
                    <h4 class="thread__title is-inline"><a href="/profiles/{{$reply->user->name}}">{{$reply->user->name}}</a></h4> <span class="thread__info">- {{$reply->created_at->diffForHumans()}}</span>
                </div>
                <div class="thread__head__meta">
                    @can('update', $reply)
                    <span class="thread__edit" @click="editing=true"><i class="fas fa-pencil-alt"></i></span>
                    <form action="/replies/{{$reply->id}}" method="POST" id="delete-reply-form" class="is-inline">
                        @csrf @method('DELETE')
                        <span class="thread__delete"><i class="fas fa-trash-alt" onclick="document.getElementById('delete-reply-form').submit()"></i></span>
                    </form>
                    @endcan
                </div>
            </div>
            <div class="thread__body">
                <div v-if="editing" class="control">
                    <div class="thread__edit__input">
                        <input class="input" type="text" v-model="body">
                    </div>
                    <div class="thread__edit__buttons">
                        <span class="thread__edit__ok" @click="submit"><i class="fas fa-check-circle"></i></span>
                        <span class="thread__edit__cancel" @click="editing=false"><i class="fas fa-ban"></i></span>
                    </div>
                </div>
                <p v-else v-text="body">
                    {{$reply->body}}
                </p>
            </div>
            <div class="thread__info thread__like">
                <form action="/replies/{{$reply->id}}/favorites" method="POST" id="reply__form">
                    @if ($reply->isFavoritedByCurrentUser()) @method('DELETE') @endif @csrf
                    <a onclick="this.parentElement.submit()" class="{{$reply->isFavoritedByCurrentUser() ? 'liked' : ''}}">
                    {{$reply->favorites->count()}} <i class="fas fa-heart"></i>
                </a>
                </form>
            </div>
        </div>
    </div>
</reply>