<div class="forum__right column is-2">
    <h4 class="forum__heading">Categories</h4>
    <div class="forum__categories">
        @foreach ($categories as $category)
        <div class="category"><a href="/threads/{{$category->slug}}">{{$category->name}}</a></div>
        @endforeach
    </div>
</div>