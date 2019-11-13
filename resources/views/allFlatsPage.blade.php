<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <title></title>
    <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>

    <link href="{{ asset('sdk/poi.css') }}" rel="stylesheet">
    <link href="{{ asset('sdk/map.css') }}" rel="stylesheet">
    <link href="{{ asset('sdk/search-markers.css') }}" rel="stylesheet">

    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/1.0.6/SearchBox.css'>

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/allFlats.css') }}" rel="stylesheet">

    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

  </head>
  <body>

    @include('layouts.menu2')

    @yield('menu')
    {{-- <input type="text" name="" id="city" value="{{ $city}}"> --}}
    <button type="submit" name="button">udiysfbsdifk dbsifdsb fjhsdbf sdjhfbsd kf</button>

    <div class="centrone">
      <div class="search-bar">
        <div class="services">
          <form  action="{{ route('filters')}}"  method="post" id="form-flat"  accept-charset="UTF-8">
            @csrf
            @method('POST')
            @foreach ($services as $service)
              <input type="checkbox" name="checkboxvar[]"  value="{{ $service -> name}}">{{ $service -> name}}
            @endforeach
            <button type="submit" name="button">invia</button>

          </form>
        </div>
      </div>
      <div class="sidebar">
        <div class="results">
          <div class="flats-list">
            @foreach ($flats as $flat)
              <a href="{{route ('showFlat', $flat ->id)}}" class="box">
                <img src="../img/{{$flat ->detail -> img}}" >
                <div class="box-sections">
                        <h1 class="flat-title">{{$flat -> detail -> title}}</h1>
                        <div class="details">
                          <p>rooms : {{$flat -> detail -> num_room}}</p>
                          <p>bed : {{$flat -> detail -> bed}}</p>
                        </div>

                    <div class="address-section">
                          <p>{{$flat -> address -> city}}</p>
                    </div>
                    @foreach ($flat->services as $service)
                        <h1>{{$service -> name}}</h1>
                    @endforeach
                </div>
                <div class="rate">
                  <p>{{$flat -> rate }}</p>
                </div>
              </a>
            @endforeach

          </div>
          <div class="paginate">
            {{-- {{ $flats -> links()}} --}}
          </div>
        </div>
      </div>
      {{-- <div class="mappa" id="map">
      </div> --}}
      <div class="mappa2" id="map2">
      </div>




    </div>



    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.38.0/maps/maps-web.min.js"></script>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/1.0.6/SearchBox-web.js"></script>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('sdk/marker.js')}}"></script>

    <script type="text/javascript" src="{{ asset('sdk/marker-manager.js')}}"></script>

    <style media="screen">
      .mapboxgl-canvas{
      }
      .mapboxgl-ctrl-top-right{
        display: none;
      }
      .mapboxgl-ctrl-bottom-right{
        display: none;
      }
      .tt-search-box-result-list-container{
        z-index: 10;
        width:100%;
        max-height:188px !important;
      }
      .tt-search-box-search-icon{
        padding-right:20px;
      }
      .tt-search-box-result-list:hover{
       background:rgb(60,179,113);
       color:red;
      }
      .tt-search-box{
        width:490px !important;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script type="text/javascript">
      console.log("ok funziono");

      $(document).ready(function(){
        $('.tt-search-box-input').val($('#city').val());
        var posto = $('#city').val();
        //create a map
        $.ajax({
         url:"/getCoordi",
         method:"GET",
         success:function(data){
           console.log(data);


           getRadius(45.00002,9.10000);
         },
         error:function(err){
           console.log(err);
         }
       });


      function getRadius(lat2,lon2){
        var latitude1 =45.46362;
        var longitude1 =9.18812;
        var latitude2 =lat2;
        var longitude2 = lon2;
        raggio = get_meters_between_points(latitude1,longitude1,latitude2,longitude2);
        // console.log("raggio",raggio);
        function get_meters_between_points(latitude1, longitude1, latitude2, longitude2) {
           if ((latitude1 == latitude2) && (longitude1 == longitude2)) { return 0; } // distance is zero because they're the same point
            let p1 = deg2rad(latitude1);
             let p2 = deg2rad(latitude2);
              let dp = deg2rad(latitude2 - latitude1);
               let dl = deg2rad(longitude2 - longitude1);
               console.log(Math.sin(dp/2)*2);
               console.log( Math.sin(dp/2));
                let a = ( Math.sin(dp/2) * Math.sin(dp/2)) + (Math.cos(p1) * Math.cos(p2) * Math.sin(dl/2) * Math.sin(dl/2));
                 let c = 2 * Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
                  let r = 6371008; // Earth's average radius, in meters
                   let d = r * c;
                   let km = Math.round(d/1000);
                   console.log("raggio",km);
                   //test
                   // (x - center_x)^2 + (y - center_y)^2 < radius^2
                   // var test = (Math.pow((longitude2 - latitude1), 2)) + (Math.pow((longitude2 - longitude1), 2)) < (Math.pow(km, 2));
                   // console.log("test",test);

                   //
                   // if (test) {}

                   //

                   if(km <20){
                     console.log("flat trovato");
                   }
                    return km; // distance, in meters
                  }
                function deg2rad(x){
                  var pi = Math.PI;
                  return x * (pi/180);
                }
      }





      });//end jquery




      //
      //
      //
      //
      //  // //
      //  // var markers = [];
      //
      //
      //  var map = tt.map({
      //      key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy',
      //      container: 'map',
      //      style: 'tomtom://vector/1/basic-main',
      //      options : {
      //        showZoom: false,
      //        showPitch: false
      //      }
      //  });
      //
      //
      //
      //  var ttSearchBox = new tt.plugins.SearchBox(tt.services.fuzzySearch, {
      //      searchOptions: {
      //          key: 'i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy'
      //      }
      //  });
      //  map.addControl(new tt.FullscreenControl());
      //  map.addControl(new tt.NavigationControl());
      //  map.addControl(ttSearchBox, 'top-left');
      //  var searchMarkersManager = new SearchMarkersManager(map);
      //  function getBounds(data) {
      //      if (data.viewport) {
      //          var btmRight = [data.viewport.btmRightPoint.lng, data.viewport.btmRightPoint.lat];
      //          var topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat];
      //      }
      //      return [btmRight, topLeft];
      //  }
      //
      //  function fitToViewport(markerData) {
      //      if (!markerData || (markerData instanceof Array && !markerData.length)) {
      //          return;
      //      }
      //      var bounds = new tt.LngLatBounds();
      //      if (markerData instanceof Array) {
      //          markerData.forEach(function(marker) {
      //              bounds.extend(getBounds(marker));
      //          });
      //      } else {
      //          bounds.extend(getBounds(markerData));
      //      }
      //      map.fitBounds(bounds, { padding: 100, linear: true });
      //  }
      //  ttSearchBox.on('tomtom.searchbox.resultscleared', function() {
      //      searchMarkersManager.clear();
      //  });
      //  ttSearchBox.on('tomtom.searchbox.resultsfound', function(resp) {
      //    console.log(resp);
      //      searchMarkersManager.draw(resp.data.results);
      //      fitToViewport(resp.data.results);
      //  });
      //  ttSearchBox.on('tomtom.searchbox.resultselected', function(resp) {
      //      searchMarkersManager.draw([resp.data.result]);
      //      fitToViewport(resp.data.result);
      //  });







      </script>

  </body>
</html>
