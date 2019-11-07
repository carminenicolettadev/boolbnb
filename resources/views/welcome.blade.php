<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>

        <link href="{{ asset('sdk/map.css') }}" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('css/menu.css')}}">
        <link rel="stylesheet" href="{{asset('css/12bool.css')}}">
        <link rel="stylesheet" href="{{asset('css/homepage.css')}}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
      @include('layouts.menu2')

      @yield('menu')

      <div class="mainhomepage">

        <div class="container search "id="background-1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11 ">
                  <div class="searchbox">
                    <h1 >Cerca alloggi unici al mondo</h1>
                    <form class="searchform" action="index.html" method="post">
                        <input type="text" name="place" value="" placeholder="Ovunque">
                        <a class="search-go" href="#">CERCA</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--fine container search-->

        <div class="container showflats">
          <div class="centrone">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="linkallflats">
                  <a href="#">Alloggi in evidenza</a>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 someflats">
                <div class="row">
                @foreach ($flatsevidency as $flat)
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="flat">
                      <a href="{{route('showFlat',$flat -> id)}}">
                        <img src="../img/{{$flat ->detail -> img}}" alt="">
                      <div class="flex-rate">
                        <div class="">
                          <h3>{{$flat -> address -> city}}</h3>
                          <p>Appartamento - {{$flat -> detail -> bed}}
                            @if ($flat -> detail -> bed === 1)
                              letto
                            @else
                              letti
                            @endif
                          </p>
                        </div>
                        <p>{{$flat -> rate}}<span><i class="fas fa-star rate"></i></span></p>
                      </div>
                      </a>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container showflats">
          <div class="centrone">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="flatsratetitle">
                  <h3 href="#">Alloggi Con Le Migliori Valutazioni</h3>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 someflats">
                <div class="row">
                @foreach ($flatsrates as $flat)
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="flat">
                      <a href="{{route('showFlat',$flat -> id)}}">
                        <img src="../img/{{$flat ->detail -> img}}" alt="">
                      </a>
                      <div class="flex-rate">
                        <p>{{$flat -> address -> city}}</p>
                        <p >{{$flat -> rate}}<span><i class="fas fa-star rate"></i></span></p>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>

    <script type="text/javascript">
      console.log("ok funziono");


           var markers = [];

           var map = tt.map({
               key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy',
               container: 'map',
               style: 'tomtom://vector/1/basic-main',
           });

           var ttSearchBox = new tt.plugins.SearchBox(tt.services.fuzzySearch, {
               searchOptions: {
                   key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy'
               }
           });

           map.addControl(new tt.FullscreenControl());
           map.addControl(new tt.NavigationControl());
           map.addControl(ttSearchBox, 'top-left');

           var searchMarkersManager = new SearchMarkersManager(map);

           function getBounds(data) {
               if (data.viewport) {
                   var btmRight = [data.viewport.btmRightPoint.lng, data.viewport.btmRightPoint.lat];
                   var topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat];
               }
               return [btmRight, topLeft];
           }

           function fitToViewport(markerData) {
               if (!markerData || (markerData instanceof Array && !markerData.length)) {
                   return;
               }

               var bounds = new tt.LngLatBounds();
               if (markerData instanceof Array) {
                   markerData.forEach(function(marker) {
                       bounds.extend(getBounds(marker));
                   });
               } else {
                   bounds.extend(getBounds(markerData));
               }
               map.fitBounds(bounds, { padding: 100, linear: true });
           }

           ttSearchBox.on('tomtom.searchbox.resultscleared', function() {
               searchMarkersManager.clear();
           });

           ttSearchBox.on('tomtom.searchbox.resultsfound', function(resp) {
               searchMarkersManager.draw(resp.data.results);
               fitToViewport(resp.data.results);
           });

           ttSearchBox.on('tomtom.searchbox.resultselected', function(resp) {
               searchMarkersManager.draw([resp.data.result]);
               fitToViewport(resp.data.result);
           });

      </script>
    </body>
</html>
