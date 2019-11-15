<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      @auth
        @for ($i=0; $i < count($flat); $i++)
          <p>{{$flat[$i]->detail ->title}}</p>
          @for ($j=$i; $j<=$i ; $j++)
            <p>Email: {{$messages [$j] -> email}}</p>
            <p>Messaggio: {{$messages[$j] -> msg}}</p>
          @endfor
        @endfor
      @endauth
    </div>


  </body>
</html>
