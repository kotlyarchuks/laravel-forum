<div class="columns threads__list__item">
  <div class="column is-1"><div class="thread__img"></div></div>
  <div class="column is-11 thread__content">
      <div class="thread__head">
          <div class="thread__head__main">
              <h4 class="thread__title is-inline">{{$reply->user->name}}</h4> <span class="thread__info">- {{$reply->created_at->diffForHumans()}}</span>
          </div>
      </div>
      <div class="thread__body">
          <p>
              {{$reply->body}}
          </p>
      </div>
  </div>
</div>
