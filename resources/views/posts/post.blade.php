<div class="blog-post">
  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>

  <p class="blog-post-meta">
    {{ $post->user->name }} on

    <?php
    // using timestamped created data inherits from the 'Carbon' library
    // for more information visit: 'carbon.nesbot.com/docs/'
    ?>
    {{ $post->created_at->toFormattedDateString() }}
  </p>

  <p>
    {{ $post->body }}
  </p>
</div><!-- /.blog-post -->
