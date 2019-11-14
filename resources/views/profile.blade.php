<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">


  </head>
  <body>
    @include('layouts.menu2')

    @yield('menu')

    <div class="profile-container">

      <div class="content">
        <div class="user">
            <h1>{{Auth::user()->name}}'s flats</h1>
            <div class="btn">
              <a class="btn-add" href="{{ route('addFlat')}}">Add Flat</a><br>
              <a class="btn-add" href="{{ route('edit', $user -> id) }}">Edit Profile</a><br>
              <a class="btn-add" href="{{ route('destroy', $user -> id) }}">Delete Profile</a><br>
              <a class="btn-add" href="{{ route('messageshow', $user -> id) }}">Message</a><br>
            </div>
        </div>

        <div class="flats-list">
          @foreach ($userFlat as $flat)
            <a href="{{route ('showFlat', $flat ->id)}}" class="box">
              <img src="../img/{{$flat ->detail -> img}}">
              <div class="box-sections">
                  {{-- $arrDetail = array con dentro un oggetto --}}
                  @foreach ($arrDetail as $key => $details)
                    @if ($details != "[]" && $details[0] ->flat_id == $flat -> id )
                      {{-- <h1>flat_id : {{$details[0] ->flat_id}}</h1> --}}
                      <h1 class="flat-title">{{$details[0] ->title}}</h1>
                      <div class="details">
                        <p>rooms : {{$details[0] ->bed}}</p>
                        <p>bed : {{$details[0] ->bed}}</p>
                      </div>

                    @endif
                  @endforeach
                  {{-- $arrDetail = array con dentro un oggetto --}}

                  <div class="address-section">
                    @foreach ($arrAddress as $key => $address)
                      @if ($address != "[]" && $address[0] ->flat_id == $flat -> id )
                        <p>{{$address[0] ->city}}</p>
                      @endif
                    @endforeach
                  </div>
              </div>
              <div class="rate">
                <p>{{$flat -> rate }}</p>
              </div>
            </a>
          @endforeach
        </div>
        <div class="paginate">
          {{ $userFlat -> links()}}
        </div>
      </div>
    </div>




  </body>
</html>
