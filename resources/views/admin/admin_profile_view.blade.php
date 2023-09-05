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
                            <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


       <div class="row">
        <div class="col-lg-2">
        </div>
       	<div class="col-lg-4">
        <div class="card">

        	<center>
        		<br><br>
        		<img class="rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/admin_images/'.$adminData->photo): url('upload/no_image.jpg') }}" height="150px">
        	</center>
            
            <div class="card-body">
                <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                <br>
                <h4 class="card-title">Username : {{ $adminData->username }}</h4>
                <br>
                <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                <br>
                <h4 class="card-title">Phone : {{ $adminData->phone }}</h4>
                <br>
                <h4 class="card-title">address : {{ $adminData->address }}</h4>

                <br><br>
                <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light"> Edit Profile</a>
                
            </div>
        </div>
    </div>
       </div>             	
    </div>
</div>
@endsection