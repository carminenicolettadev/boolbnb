<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    @section('sidebar')
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
          @if(Request::url() === 'profile/*')
              <a class="btn-add" href="{{ route('addFlat')}}">Add Flat</a><br>
          @endif
          @guest
            @else
            <a class="btn-update" href="{{ route('editFlat', $singleFlat ->id)}}">Update Flat</a><br>
            <a class="btn-delete" href="{{ route('deleteFlat', $singleFlat ->id)}}">Delete Flat</a><br>
          @endguest
          <a href="{{ URL::previous() }}" class="mb-5">Back</a>
        </div>
      </div>
    @endsection



  </body>
</html>
