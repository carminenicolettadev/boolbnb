<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

  </head>
  <body>
    <div class="profile-container">
      <div class="sidebar">
        <ul>
          <li><h1>id : {{Auth::user()->id}}</h1></li>
          <li><h1>name : {{Auth::user()->name}}</h1></li>
          <li><h1>surname : {{Auth::user()->surname}}</h1></li>
          <li><h1>email : {{Auth::user()->email}}</h1></li>
        </ul>
        <a href="{{ route('addFlat')}}">Add Flat</a><br>
        <a href="{{ URL::previous() }}" class="mb-5">Back</a>
      </div>

      <div class="content">

        @foreach ($userFlat as $flat)
          <div class="box">
            <img src="https://source.unsplash.com/450x300/?house,flat">
            <div class="box-sections">
              <div class="details-section">
                <h1>id user : {{$flat -> user_id}}</h1>
                {{-- $arrDetail = array con dentro un oggetto --}}
                @foreach ($arrDetail as $key => $details)
                  @if ($details != "[]" && $details[0] ->flat_id == $flat -> id )
                    <p>flat_id : {{$details[0] ->flat_id}}</p>
                    <p>title : {{$details[0] ->title}}</p>
                    <p>bed : {{$details[0] ->bed}}</p>
                    <p>bathroom : {{$details[0] ->bathroom}}</p>
                  @endif
                @endforeach
              </div>

              <div class="address-section">
                {{-- $arrDetail = array con dentro un oggetto --}}
                @foreach ($arrAddress as $key => $address)
                  @if ($address != "[]" && $address[0] ->flat_id == $flat -> id )
                    <p>state : {{$address[0] ->state}}</p>
                    <p>city : {{$address[0] ->city}}</p>
                    <p>road : {{$address[0] ->road}}</p>
                    <p>civic number : {{$address[0] ->civ_num}}</p>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        @endforeach



        {{-- <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div> --}}
      </div>
    </div>



{{--
    @if (!empty($userFlat))
      vuoto
    @endif --}}



  </body>
</html>
