@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
      <h4 class="title">Create new thread</h4>
      <div>
        <form action="/threads" method="POST">
          @csrf
          <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
              <input class="input" name="title" type="text" placeholder="">
            </div>
          </div>
          <div class="field">
            <label class="label" for="body">Message</label>
            <div class="control">
              <textarea class="textarea" name="body" placeholder=""></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Category</label>
            <div class="control">
              <div class="select">
                <select name="category">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="control">
            <button class="button is-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection