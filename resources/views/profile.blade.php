<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>{{Auth::user()->id}}</h1>
    <h1>{{Auth::user()->name}}</h1>
    <h1>{{Auth::user()->surname}}</h1>
    <h1>{{Auth::user()->email}}</h1>

    <h1>{{Auth::user()->flat ->id }}</h1>

  </body>
</html>
