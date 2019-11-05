<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('sdk/map.css') }}" rel="stylesheet">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/singleFlat.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('sdk/tomtom.min.js')}}"></script>



  </head>
  <body>
    <div class="profile-container">
      <div class="sidebar">
        <h3>Users</h3>
        <ul>
          <li>
            <p>name</p>
            <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>
          </li>
          <li>
            <p>email</p>
            <p>{{Auth::user()->email}}</p>
          </li>
        </ul>
        <div class="btn-sidebar">
          <a class="btn-add" href="{{ route('addFlat')}}">Add Flat</a><br>
          @guest
            @else
            <a class="btn-delete" href="">update Flat</a><br>
            <a class="btn-delete" href="{{ route('deleteFlat', $singleFlat ->id)}}">Delete Flat</a><br>


          @endguest
          <a href="{{ URL::previous() }}" class="mb-5">Back</a>



        </div>
      </div>

      <div class="content">
        <div class="hero">
            <img src="https://source.unsplash.com/random?house">
        </div>
        <div class="flats-list">
          <div class="intro">
              <h1>{{$detailFlat[0] ->title}}</h1>
              <p>{{$addressFlat[0] ->city}}</p>
          </div>
          <h3 class="section-title">Details</h3>
          <ul class="details">
            <li>
              <p>rooms</p>
              <p>{{$detailFlat[0] ->num_room}}</p>
            </li>
            <li>
              <p>bed</p>
              <p>{{$detailFlat[0] ->bed}}</p>
            </li>
            <li>
              <p>bathroom</p>
              <p>{{$detailFlat[0] ->bathroom}}</p>
            </li>
            <li>
              <p>Area</p>
              <p>{{$detailFlat[0] ->mq}} <span>m2</span></p>
            </li>
          </ul>

          <h3 class="section-title">Address</h3>
          <ul class="address">
            <li>
              <h2>City</h2>
              <p>{{$addressFlat[0] ->city}}</p>
            </li>
            <li>
              <h2>Road</h2>
              <p>{{$addressFlat[0] ->road}}</p>
            </li>
            <!--input text for get value for script js style=display:none-->
            <input type="text" id="lat" value="{{$addressFlat[0] ->lat}}"style="display:none">
            <input type="text" id="lon" value="{{$addressFlat[0] ->lon}}"style="display:none">
            <input type="text"id="addrss" value="{{$addressFlat[0]->road}}"style="display:none">
            <input type="text"id="city" value="{{$addressFlat[0]->city}}"style="display:none">
            <input type="text"id="civ_num"value="{{$addressFlat[0]->civ_num}}"style="display:none">
          </ul>
          <!-- <div class="rate">
            <p>{{$singleFlat -> rate }}</p>
          </div> -->
        </div>
        {{-- mappa  --}}
        <div id="map" class="mappa map" ></div>


      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>

    <script type="text/javascript">

      $(document).ready(function(){
        console.log("init");
        //get value for marker info
        var latiVal = $("#lat").val();
        var longVal = $("#lon").val();
        var address= $("#addrss").val();
        var city = $("#city").val();
        var civ_num = $("#civ_num").val();



        //create a map
        var map = tomtom.L.map('map', {
        key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy",
        basePath: 'sdk/',
        zoom: 40,
        center: [latiVal, longVal]
        });
        //add marker in position[latiVal,longVal]

        var marker = tomtom.L.marker([latiVal,longVal]).addTo(map);
        marker.bindPopup("<b>MY Home</b><br/>" +city + " " +address + " " +
        "N" + civ_num );

      });
    </script>


  </body>
</html>
