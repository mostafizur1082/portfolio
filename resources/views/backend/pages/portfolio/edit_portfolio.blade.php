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
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">Update Portfolio Page</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Portfolio Page</h4>

                    <form action="{{ route('update.portfolio',$portfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" value="{{ $portfolio->name }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label"> Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="title" name="title" value="{{ $portfolio->title }}">
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"> Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                               <img class="rounded-circle" src="{{ (!empty($portfolio->image))? url($portfolio->image): url('upload/no_image.jpg') }}" style="width: 100px;, height=100px;" id="showImage">
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row --> 
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label"> Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description">
                                  {{ $portfolio->description }}
                                </textarea>
                            </div>
                        </div>
                        <!-- end row -->

                       

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