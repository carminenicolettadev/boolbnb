<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/menu.css')}}">

    <title></title>
  </head>
  <body>
    @include('layouts.menu2')


    @yield('menu')

    <div class="list-message">
      <div class="single-message">
        @if (count($flat))
            @for ($i=0; $i < count($flat); $i++)
              <p>{{$flat[$i]->detail ->title}}</p>
              @for ($j=$i; $j<=$i ; $j++)
                <p>Email: {{$messages [$j] -> email}}</p>
                <p>Messaggio: {{$messages[$j] -> msg}}</p>
              @endfor
            @endfor
          @else
        <h1>no message</h1>
        @endif


      </div>
    </div>


  </body>
</html>
