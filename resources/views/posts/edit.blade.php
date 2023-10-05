<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Post Form</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
          <h3 class="text-center">Edit Post</h3>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      @if (Session::has('alert-info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success! </strong>{{ session::get('alert-info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      
      @endif
      

            <form method="post" action="{{route('posts.update',$post->id)}}"  style="margin-top:40px" id="form" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label >Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title',$post->title) }}" required>
                </div>

                <div class="mb-3">
                    <label >Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Enter description" required>{{old('description',$post->description) }}</textarea>
                  </div>

                  <div class="mb-3">
                    <label>Publish</label>
                    <select name="is_publish" class="form-control" required>
                        <option disabled selected>Choose the option</option>
                        <option @selected( old('is_publish',$post->is_publish) ==1) value="1">Yes</option>
                        <option @selected( old('is_publish',$post->is_publish)==0) value="0">No</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label>Active</label>
                    <select name="is_active" class="form-control">
                        <option disabled selected>Choose the option</option>
                        <option @selected( old('is_active',$post->is_active)==1) value="1">Yes</option>
                        <option @selected( old('is_active',$post->is_active)==0) value="0">No</option>
                    </select>
                  </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
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