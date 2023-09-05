@extends('backend.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

    	<!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">Profile Edit</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

<div class="row">
    <div class="col-xl-2"></div>
        <div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Profile</h4>
            

            <form class="custom-validation" action="{{ route('update.profile') }}" novalidate="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label id="name">Name</label>
                    <input for="name" type="text" class="form-control" required="" name="name" value="{{ $admin->name }}">
                </div>

                <div class="mb-3">
                    <label id="username">Username</label>
                    <input for="username" type="text" class="form-control" required="" name="username" value="{{ $admin->username }}">
                </div>

                <div class="mb-3">
                    <label id="email">Email</label>
                    <input for="email" type="email" class="form-control" required="" name="email" value="{{ $admin->email }}">
                </div>

                <div class="mb-3">
                    <label id="phone">Phone</label>
                    <input for="phone" type="text" class="form-control" required="" name="phone" value="{{ $admin->phone }}">
                </div>

                <div class="mb-3">
                    <label id="address">Address</label>
                    <input for="address" type="text" class="form-control" required="" name="address" value="{{ $admin->address }}">
                </div>


                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <h5>Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="file" name="photo" class="form-control" required="" id="image" > </div>
                    </div>
                    
                    </div>  

                    <div class="col-md-6">
                    <img class="rounded-circle" src="{{ (!empty($admin->photo))? url('upload/admin_images/'.$admin->photo): url('upload/no_image.jpg') }}" alt="User Avatar" style="width: 100px;, height=100px;" id="showImage">
                    </div>  

                </div>
            <br>
                
                <div class="mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
  </div> <!-- end col -->
        
</div>

</div>
</div>

<script type="text/javascript">  
  $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']); 
    });
});

</script>
@endsection