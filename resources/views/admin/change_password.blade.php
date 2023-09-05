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
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">Change Password</a></li>
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
            <h4 class="card-title">Change Password</h4>
            

            @if(count($errors))
            @foreach($errors->all() as $error)
            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
            @endforeach
            @endif

            <form class="custom-validation" action="{{ route('update.password') }}" novalidate="" method="post">
                @csrf

                <div class="mb-3">
                    <label id="old_password">Old Password</label>
                    <input for="old_password" type="password" class="form-control" required="" name="old_password" >
                </div>

                <div class="mb-3">
                    <label id="password">New Password</label>
                    <input for="password" type="password" class="form-control" required="" name="password">
                </div>

                <div class="mb-3">
                    <label id="password_confirmation">Confirm Password</label>
                    <input for="password_confirmation" type="password" class="form-control" required="" name="password_confirmation" >
                </div>
                
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


@endsection