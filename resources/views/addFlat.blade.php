<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

  </head>
  <body>

    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <a href="{{ URL::previous() }}" class="mb-5">Back</a>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <form  action="{{ route('storeFlat')}}"  method="post" id="form-flat"  accept-charset="UTF-8"
        enctype="multipart/form-data" >
            @csrf
            @method('POST')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title"  required placeholder="title">
                </div>

                <div class="form-group col-md-6">
                  <label>rooms</label>
                  <input type="number" min="0" step="1" class="form-control" name="num_room" required  placeholder="room number">
                </div>

                <div class="form-group col-md-6">
                  <label>beds</label>
                  <input type="number" min="0" step="1" class="form-control" name="bed" required  placeholder="beds">
                </div>

                <div class="form-group col-md-6">
                  <label>bathroom</label>
                  <input type="number" min="0" step="1" class="form-control" name="bathroom" required  placeholder="bathroom">
                </div>


                <div class="form-group col-md-6">
                  <label>space area</label>
                  <input type="number" min="0" step="1" class="form-control" name="mq" required  placeholder="space area">
                </div>


                <div class="form-group col-md-6">
                  <label>img</label>
                  <input type="file" name="img" accept="image/*">
                </div>

                <div class="form-group col-md-6 d-none">
                  <label>user_id</label>
                  <input type="text" class="form-control" name="user_id" required  value="{{Auth::user()->id}}">
                </div>

                {{-- Address section  --}}
                <div class="form-group col-md-12 mt-5">
                  <h4>Address</h4>
                </div>

                <div class="form-group col-md-6">
                  <label>state</label>
                  <input type="text" id="state" class="form-control" name="state" required  placeholder="State">
                </div>

                <div class="form-group col-md-6">
                  <label>city</label>
                  <input type="text" id="city" class="form-control" name="city" required  placeholder="city">
                </div>

                <div class="form-group col-md-6">
                  <label>CAP</label>
                  <input type="number" id="cap" class="form-control" name="cap" required  placeholder="CAP">
                </div>

                <div class="form-group col-md-6">
                  <label>road</label>
                  <input type="text" id="road" class="form-control" name="road" required  placeholder="road">
                </div>

                <div class="form-group col-md-6">
                  <label>civic number</label>
                  <input type="text" id="civ_num" class="form-control" name="civ_num" required  placeholder="civic number">
                </div>

                <div class="form-group  col-md-6">
                  <input type="hidden" id="lat" class="form-control" name="lat"  value="">
                </div>
                <div class="form-group  col-md-6">
                  <input type="hidden" id="lon" class="form-control" name="lon"  value="">
                </div>


                <div class="form-group col-md-12 mt-5">
                  <h4>Services</h4>
                </div>
                <div class="service-control col-md-12">

                @foreach($services as $service)
                  <label for="{{$service -> name}}">{{$service ->name}}</label>
                  <input type="checkbox"   name="checkboxvar[]" value="{{$service ->id}}">

                @endforeach

                </div>

              </div>

              <button id="bottone" type="submit"  class="btn btn-add mt-2" disabled >Add Flat</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>

    {{-- <script type="text/javascript">

    $(window).hover(function(){
      $( "input").each(function( index ) {
        // console.log( index + ": " + $( this ).val() );
        if ($( this ).val() === '' && index == 14 &&  index == 15 ) {
          $('.btn-add').prop('disabled',true);
        }
        else {
          $('.btn-add').prop('disabled',false);
        }
      });

    })

    </script> --}}

  </body>
</html>
