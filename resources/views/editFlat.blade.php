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
          <form  action="{{ route('updateFlat', $singleFlat->id)}}"  method="post" id="form-flat" accept-charset="UTF-8"
        enctype="multipart/form-data" >
            @csrf
            @method('POST')
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Title</label>
                  <input type="text" class="form-control" value="{{$detailFlat[0]->title}}" name="title"  required placeholder="title">
                </div>

                <div class="form-group col-md-6">
                  <label>rooms</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$detailFlat[0]->num_room}}" name="num_room" required  placeholder="room number">
                </div>

                <div class="form-group col-md-6">
                  <label>beds</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$detailFlat[0]->bed}}" name="bed" required  placeholder="beds">
                </div>

                <div class="form-group col-md-6">
                  <label>bathroom</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$detailFlat[0]->bathroom}}" name="bathroom" required  placeholder="bathroom">
                </div>


                <div class="form-group col-md-6">
                  <label>space area</label>
                  <input type="number" min="0" step="1" class="form-control" value="{{$detailFlat[0]->mq}}" name="mq" required  placeholder="space area">
                </div>


                <div class="form-group col-md-6">
                  <label>img</label>
                  <input type="file" name="img"  accept="image/*">
                </div>

                <div class="form-group col-md-6 d-none">
                  <label>user_id</label>
                  <input type="text" class="form-control"  name="user_id" required  value="{{Auth::user()->id}}">
                </div>

                {{-- Address section  --}}
                <div class="form-group col-md-12 mt-5">
                  <h4>Address</h4>
                </div>

                <div class="form-group col-md-6">
                  <label>state</label>
                  <input type="text" id="state" class="form-control" value="{{$addressFlat[0]->state}}" name="state" required  placeholder="State">
                </div>

                <div class="form-group col-md-6">
                  <label>city</label>
                  <input type="text" id="city" class="form-control" value="{{$addressFlat[0]->city}}" name="city" required  placeholder="city">
                </div>

                <div class="form-group col-md-6">
                  <label>CAP</label>
                  <input type="number" id="cap" class="form-control" value="{{$addressFlat[0]->id}}" name="cap" required  placeholder="CAP">
                </div>

                <div class="form-group col-md-6">
                  <label>road</label>
                  <input type="text" id="road" class="form-control" value="{{$addressFlat[0]->road}}" name="road" required  placeholder="road">
                </div>

                <div class="form-group col-md-6">
                  <label>civic number</label>
                  <input type="text" id="civ_num" class="form-control" value="{{$addressFlat[0]->civ_num}}" name="civ_num" required  placeholder="civic number">
                </div>

                <div class="form-group d-none col-md-6">
                  <label>latitudine</label>
                  <input type="text" id="lat" class="form-control" value="{{$addressFlat[0]->lat}}" name="lat"  value="">
                </div>
                <div class="form-group d-none col-md-6">
                  <label>longitudine</label>
                  <input type="text" id="lon" class="form-control" value="{{$addressFlat[0]->lon}}" name="lon"  value="">
                </div>


              </div>

              <button id="bottone" type="submit"  class="btn btn-add mt-2">Update Flat</button>
          </form>
        </div>
      </div>
    </div>




  </body>
</html>
