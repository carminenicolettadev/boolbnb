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
      @foreach ($flats as $flats)
      <div class="flat-box">
        <img src="{{$flats -> detail -> img }}" alt="">
        <h1>{{$flats -> detail -> title }}</h1>
        <h1>{{$flats -> detail -> bed }}</h1>
        <h1>{{$flats -> detail -> bathroom }}</h1>
        <h1>{{$flats -> address -> state }}</h1>
        <h1>{{$flats -> address -> city }}</h1>
        <h1>{{$flats -> address -> road }}</h1>
        <h1>{{$flats -> rate}}</h1>
        <p>{{$flats -> views}}</p>
      </div>
      @endforeach
    </div>
    <ul>

        <li>


        </li>

    </ul>




  </body>
</html>
