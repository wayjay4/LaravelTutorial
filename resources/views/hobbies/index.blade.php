<!DOCTYPE html>
<html>
<head>
  <title>MLT: About Page</title>
</head>
<body>
  <h3>My Hobbies for Today (pulled from a DB):</h3>
  <ul>
    @foreach($hobbies as $hobby)
      <li>
        <a href="/hobbies/{{ $hobby->id }}">
          {{ $hobby->body }}
        </a>
      </li>
    @endforeach
  </ul>
</body>
</html>
