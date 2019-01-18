@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="columns is-centered">
    <div class="column is-half">
  @include('errors')
      <h4 class="title">Create new thread</h4>
      <div>
        <form action="/threads" method="POST">
          @csrf
          <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
              <input class="input" name="title" type="text" placeholder="" value="{{old('title')}}" required>
            </div>
          </div>
          <div class="field">
            <label class="label" for="body">Message</label>
            <div class="control">
              <textarea class="textarea" name="body" value="{{old('body')}}" required></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Category</label>
            <div class="control">
              <div class="select">
                <select name="category_id" required>
                  <option value="">Choose one</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
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