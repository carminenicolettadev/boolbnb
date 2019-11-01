<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>

    <div class="list-flat">
      @foreach ($flats as $flat)
      <div class="flat-box">
        <img src="{{$flat -> detail -> img }}" alt="">
        <h1>{{$flat -> detail -> title }}</h1>
        <h1>{{$flat -> detail -> bed }}</h1>
        <h1>{{$flat -> detail -> bathroom }}</h1>
        <h1>{{$flat -> address -> state }}</h1>
        <h1>{{$flat -> address -> city }}</h1>
        <h1>{{$flat -> address -> road }}</h1>
        <h1>{{$flat -> rate}}</h1>
        <p>{{$flat -> views}}</p>
      </div>
      @endforeach
    </div>
    <ul>

        <li>


        </li>

    </ul>




  </body>
</html>
