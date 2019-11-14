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
    <input type="hidden" name="" id="city" value="{{ $city}}">

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
        <div class="flats">


        @foreach ($flats as $flat)
        <div class="valflat"style="display:none" rif="{{$flat->id}}">
          <input id=titleflat type="hidden" value="{{$flat ->detail ->title}}"></input>
          <input id="latval"type="hidden" value="{{$flat -> address ->lat}}"></input>
          <input id="lonval"type="hidden" value="{{$flat -> address ->lon}}"></input>
        </div>
        @endforeach
      </div>
      <input id="centerx"type="hidden" name="" value="{{$latin}}">
      <input id="centery" type="hidden" name="" value="{{$lonin}}">

      <div class="mappa2" id="map">
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
            crossorigin="anonymous">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

        var posto = $('#city').val();
        
        var centerx=$('#centerx').val();
        var centery=$('#centery').val();
        if(centerx ==="" || centery ===""){//set default values ​​without location search for map
          centerx = 45.46362;
          centery = 9.18812;
        };
        createmapmarker();


        function createmapmarker(){
          var divflats = $('div.flats >div').length;
          var divflatselement = $('div.flats >div');
          var map = tomtom.L.map('map', {
          key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy",
          basePath: 'sdk/',
          zoom: 10,
          center: [centerx,centery],
          });

          for (var i = 0; i < divflats; i++) {
            let title = divflatselement[i].children[0].value;//titleflat
            let lat = divflatselement[i].children[1].value;//lat
            let lon = divflatselement[i].children[2].value;//long
            var marker = tomtom.L.marker([lat,lon]).addTo(map);
            marker.bindPopup(title);

          }
        }
      });//end jquery

    </script>

  </body>
</html>
