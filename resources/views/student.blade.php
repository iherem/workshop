<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row row justify-content-center">
        <div class="col-md-1"></div>
          <div class="col-md-10">
            <table class="table table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th>Student Id</th>
                  <th>Password</th>
                  <th>Name</th>
                  <th>Tel</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($student as $val)
                <tr>
                  <td>{{$val->student_id}}</td>
                  <td>{{$val->password}}</td>
                  <td>{{$val->name}}</td>
                  <td>{{$val->tel}}</td>
                  <td>
                    <a href="{{url('edit/'.$val->student_id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{url('delete/'.$val->student_id)}}" class="delete btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-1"></div>
      </div>
      <div class="row row justify-content-center">
        <div class="col-md-3 text-center">
            <a href="{{url('add')}}" class="btn btn-warning">Add Student</a>
        </div>
      </div>
      <br>
      <div class="row row justify-content-center">
        <div class="col-md-6 text-center">
          @if(!empty($errmsg))
          <div class="alert alert-danger" role="alert">
            {{$errmsg or ''}}
            </div>
        </div>
        @endif
      </div>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.delete').click(function(){
        return confirm('Are u Sure you want to delete?');
      });
    </script>
  </body>
</html>
