@extends('backend.main')

@section('content')


<div class="page-content">
    <div class="container-fluid">

    	<!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">All Blog</a></li>
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

                        <div class="button-items">
                            <a href="{{ route('add.blog') }}" class="btn btn-outline-danger waves-effect waves-light"> Add Blog</a>
                        </div>
                        <br>

                        <h4 class="card-title">All Blog</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Tag</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($allblogs as $key => $blog)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $blog->category->blog_category}}</td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <img src="{{ asset( $blog->image) }}"  style="width: 70px; height: 40px;" rounded>
                                </td>
                                <td>{{ $blog->tag }}</td>
                                <td>
                                    <a href="{{ route('edit.blog', $blog->id) }}" class="btn btn-info sm" title="edit data"> <i class="fas fa-edit"></i> </a>
                                    <a href="{{ route('delete.blog', $blog->id)  }}" class="btn btn-danger sm" title="delete data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                    </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->            	
    </div>
</div>



@endsection