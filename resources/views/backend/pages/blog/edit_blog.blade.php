@extends('backend.main')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
    </style>

<div class="page-content">
    <div class="container-fluid">

    	<!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">Update Blog Page</a></li>
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

                        <h4 class="card-title">Update Blog Page</h4>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    <form action="{{ route('update.blog',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Blog Category</label>
                            <div class="col-sm-10">
                                <select name="blog_category_id" id="" class="form-select">
                                    <option selected>Select Blog Category</option>
                                    @foreach($blog_category as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $blog->blog_category_id ? 'selected' : ''}}>{{ $category->blog_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label"> Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="title" name="title" value="{{ $blog->title }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="tags" class="col-sm-2 col-form-label"> Tag</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="tags" name="tags" value="tech,web" data-role="tagsinput" value="{{ $blog->tags }}">
                            </div>
                        </div>
                        <!-- end row -->
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
                               <img src="{{ asset($blog->image) }}" style="width: 100px;, height=100px;" id="showImage">
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row --> 
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label"> Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description">
                                   {{ $blog->description }}
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