<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <ul>

      @foreach ($users as $user)
        <li>
          <h1>{{$user -> name}}</h1>
          <p>{{$user -> birthday}}</p>
        </li>
      @endforeach
    </ul>


  </body>
</html>
