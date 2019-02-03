<div class="forum__left column is-2">
    <a href="/threads/create" class="new-thread">New discussion</a>
    <div class="forum__sections">
        <div class="forum__sections__item flex">
            <span class="section__icon"><i class="fab fa-leanpub"></i></span>
            <div class="section__name"><a href="/threads/">All Threads</a></div>
        </div>
        @if (auth()->check())
        <div class="forum__sections__item flex">
            <span class="section__icon"><i class="fas fa-question-circle"></i></span>
            <div class="section__name"><a href="/threads?by={{auth()->user()->name}}">My Threads</a></div>
        </div>  
        @endif
        <div class="forum__sections__item flex">
            <span class="section__icon"><i class="fas fa-star"></i></span>
            <div class="section__name"><a href="/threads?popular=1">Popular Threads</a></div>
        </div>
        <div class="forum__sections__item flex">
            <span class="section__icon"><i class="fas fa-exclamation-circle"></i></span>
            <div class="section__name"><a href="/threads?unanswered=1">Unanswered Threads</a></div>
        </div>
    </div>
</div>