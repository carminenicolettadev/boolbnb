<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
        <script type="text/javascript">
          $(document).ready(changebkg);
          function changebkg () {
            setTimeout('changebkg1()',10000);
          }
          function changebkg3() {
            document.getElementById('background-3').id = 'background-1';
            setTimeout('changebkg1()', 10000);
          }
          function changebkg2() {
            document.getElementById('background-2').id = 'background-3';
            setTimeout('changebkg3()', 10000);
          }
          function changebkg1() {
            document.getElementById('background-1').id = 'background-2';
            setTimeout('changebkg2()', 10000);
          }
        </script>
        <div class="container search "id="background-1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11 ">
                  <div class="searchbox">
                    <h1 >Cerca Alloggi</h1>
                    <form class="searchform" action="index.html" method="post">
                      <div class="place-element">
                        <label for="place">DOVE</label>
                        <br>
                        <input type="text" name="place" value="" placeholder="Ovunque">
                      </div>
                    </form>
                    <div class="search-go">
                      <a href="#">CERCA</a>
                    </div>
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
                        <img src="{{$flat -> detail -> img }}')}}" alt="">
                      </a>
                      <div class="flex-rate">
                        <p>{{$flat -> address -> city}}</p>
                        <p >{{$flat -> rate}}<span><i class="fas fa-star rate"></i></span></p>

                      </div>
                      <p>Appartamento - {{$flat -> detail -> bed}}
                        @if ($flat -> detail -> bed === 1)
                          letto
                        @else
                          letti
                        @endif
                      </p>
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
                        <img src="{{$flat -> detail -> img }}')}}" alt="">
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


    </body>
</html>
