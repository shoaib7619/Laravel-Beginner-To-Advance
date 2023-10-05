<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>
        #outer
        {
            width:100%;
            text-align: center;
        }
        .inner
        {
            display: inline-block;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Posts</title>
</head>
<body>
    <div class="row">
        <div class="col-md-7 offset-3 mt-5">
          <h3 class="text-center">Posts</h3>
          @if ($post)
            <span><b>Title:</b>{{$post->title}}</span><br>
            <span><b>Description:</b>{{$post->description}}</span><br>
            <span><b>Publish:</b>{{$post->is_publish == '1' ? 'Yes' : 'No'}}</span><br>
            <span><b>Active:</b>{{$post->is_active == '1' ? 'Yes' : 'No'}}</span>
           @else
          <h2 class="text-center text-danger mt-5">No Post Found....</h2>
          @endif
         
          
        </div>

    </div>


{{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script>
  $('form').parsley();
</script>


</body>
</html>