<!DOCTYPE html>
<html>
  <head>
    <title>MLT: Welcome Page</title>
  </head>

  <body>
    <h1>Hello, <?=$name;?>!</h1>
    <p> Did I here you just turned <?=$age;?> billion years old?</p>

    <ul>
      @foreach($tasks as $task)
        <li>{{ $task }}</li>
      @endforeach
    </ul>
  </body>
</html>
