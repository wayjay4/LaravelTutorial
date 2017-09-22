@extends ('layouts.posts.master')

@section('content')
<div class="col-sm-10 blog-main">
  <h1>{{ $post->title }}</h1>

  <p>{{ $post->body }}</p>

  <hr>

  <div class="comments">
      <ul class="list-group">
      @foreach ($post->comments as $comment)
        <li class="list-group-item">
          <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp;</strong>
          {{ $comment->body }}
        </li>
      @endforeach
    </ul>
  </div>

  <!-- Add a comment -->
  <hr>

  <div class="card">
    <div class="card-block">
      <form method="post" action="/posts/{{ $post->id }}/comments">
        <!--
        * add this to all forms in laravel
        * as it protects against 'cross-site request forgery'
        -->
        {{ csrf_field() }}

        <div class="form-group">
          <textarea id="body" name="body" class="form-control" placeholder="Your Comment Here." required></textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
      </form>

      @include('layouts.posts.errors')
    </div>
  </div>
</div>
@endsection
