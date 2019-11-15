<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      @auth
      @foreach ($messages as $msg)
        <div>
          {{-- <h3>messaggio relativo a: {{$detail -> name}}</h3> --}}
          <p>Email: {{$msg -> email}}</p>
          <p>Messaggio: {{$msg -> msg}}</p>
        </div>
      @endforeach
        @endauth
    </div>

  </body>
</html>
