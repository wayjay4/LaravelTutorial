@extends('layouts.posts.master')

@section('content')
<h1>Publish a Post</h1>

<hr>

<form method="POST" action="/posts">
  <!--
  * add this to all forms in laravel
  * as it protects against 'cross-site request forgery'
-->
  {{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Body:</label>
    <textarea id="body" name="body" class="form-control"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection
