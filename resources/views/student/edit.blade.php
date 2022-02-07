<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Image Upload CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 ">
           
                <div class="card mt-4 ">
                    @if(session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                    <div class="card-header">
                        Single Image CRUD
                        <a href="{{route('student.index')}}" class="btn btn-primary float-end">All Student</a>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update-student/'.$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$student->name}}" >
                           </div>
                           <div class="form-group mb-3">
                            <label for="file">Profile Picture</label>
                            <input type="file" name="profile_image" class="form-control">
                            <img src="{{asset('uploads/students/'.$student->profile_image)}}" height="100px" width="150px" alt="profile_image" >
                         </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Update Student</button>
                        </div>
                   </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>