<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h3 class="container">upload</h3>
  <div class="container">


        @if(Session::has('success'))
        <div class="alert alert-success">
            <p>Success</p>
            {{ Session::get('success') }}
        </div>
        @endif
  <form enctype="multipart/form-data" action="{{ url('upload-image') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
               
                <input type="file" name="filename" class="form-control w-50">

            </div>

            <div class="form-group mt-2">
               
              <button class="btn btn-primary" type="submit">Submit</button>

            </div>
           
        </form>

        <div class="row">
          <div class="col-md-6">
              @if($image)
                @foreach($image as $img)
                  <img src="{{ asset('thumbnail/'.$img->filename) }}" alt="">
                @endforeach
              @endif
          </div>
        </div>

        
  </div>
    

 
</body>
</html>