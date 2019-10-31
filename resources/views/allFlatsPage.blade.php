<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <ul>

      @foreach ($flats as $flats)
        <li>
          <h1>{{$flats -> detail -> title }}</h1>
          <h1>{{$flats -> detail -> bed }}</h1>
          <h1>{{$flats -> detail -> bathroom }}</h1>
          <h1>{{$flats -> address -> state }}</h1>
          <h1>{{$flats -> address -> city }}</h1>
          <h1>{{$flats -> address -> road }}</h1>
          <h1>{{$flats -> rate}}</h1>
          <p>{{$flats -> views}}</p>

        </li>
      @endforeach
      {{-- @foreach ($addresses as $address)
        <li>
          <h1>{{$address -> city}}</h1>
          <p>{{$address -> road}}</p>
        </li>
      @endforeach --}}

    </ul>




  </body>
</html>
