<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css') }}">;
    <style>
        #outer
        {
            /* width:100%; */
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
          <a href="{{route('posts.create')}}" class="btn btn-info mb-2 align-right">Create Post</a>
          @if (count($posts)>0)

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Sr.No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Publish</th>
                <th scope="col">Active</th>
                <th class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{Str::limit($post->title,'10','...')}}</td>
                    <td>{{Str::limit($post->description,'20','...')}}</td>
                    <td>{{$post->is_publish == '1' ? 'Yes' : 'No'}}</td>
                    <td>{{$post->is_active  == '1' ? 'Yes' : 'No'}}</td>
                    <td id="outer">
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-success inner"><i class="fa fa-eye"></i></a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info inner"><i class="fa fa-edit"></i></a>
                    <form method="post" class="inner" action="{{route('posts.destroy',$post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>  
                    @if ($post->trashed())
                    <a href="{{route('posts.soft-delete', $post->id)}}" class="btn btn-warning inner"><i class="fa fa-undo"></i></a>
                    @endif                  
                    </td>
                </tr>
             @endforeach
            </tbody>
          </table>           
           @else
          <h2 class="text-center text-danger mt-5">No Post Found....</h2>
          @endif
          {{-- {{$posts->render()}} --}}
          {{$posts->links()}}
        </div>

    </div>


{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script>
  $('form').parsley();
</script>
<script src="{{asset('assets/js/toastr.min.js') }}"></script>
<script>
    @if (Session::has('alert-success'))
        // toastr["success"]("message");
        toastr["success"]("{{Session:get('alert-success')}}");
    @endif

</script>

</body>
</html>