<!DOCTYPE html>
<html>
  <head>
    <title>Module Maker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class = "container-fluid">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Module Maker</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome</a></li> 
          </ul>
        </div>
      </nav>
      <div class="panel">
      <center><h1>Module Maker</h1></center>
        <form method="post" action="{{url('module')}}" enctype="multipart/form-data" id="myform">
          {{csrf_field()}}
          <div class="row"> 
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class=""> Create your own module </h3>
                </div>              
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="module-component">Module Name</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="module" required/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <label class="module-component">Add controller</label>
                    </div>
                    <div class="col-md-4">
                      <label><input type="radio" class="icheckbox_flat-blue checked" value="resource" name="controller"/> Resource</label>
                      <label><input type="radio"  class="icheckbox_flat-blue checked" value="simple" name="controller"/> Simple</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <label class="module-component">Add Constructor in controller (if resource)</label>
                    </div>
                    <div class="col-md-2">
                      <input type="checkbox" class="icheckbox_flat-blue checked" value="constructor" name="con"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <label class="module-component">Add view</label>
                    </div>
                    <div class="col-md-2">
                      <input type="checkbox" class="icheckbox_flat-blue checked" value="view" name="view"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-body"> 
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-block margin-bottom" id="btn" value="Send" >Create Module</button>
                </div>
              </div>
              @if($data[0] == null)
              {{$data[0]}}
              @else
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="box-title">Performing task</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Result</th>
                          </tr>
                          @foreach($data as $created)
                            <tr>
                              <td>
                                <li>{{ $created }}</li>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
              </div>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>