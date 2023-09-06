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
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">Update Footer Page</a></li>
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

                        <h4 class="card-title">>Update Footer Page</h4>

                    <form action="{{ route('update.footer') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $allfooter->id }}">

                        <div class="row mb-3">
                            <label for="number" class="col-sm-2 col-form-label">Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="number" name="number" value="{{ $allfooter->number  }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="description" name="description" rows="4"  class="form-control">
                                    {{ $allfooter->description  }}
                                </textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="address" name="address" value="{{ $allfooter->address  }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="email" name="email" value="{{ $allfooter->email  }}">
                            </div>
                        </div>
                        <!-- end row --> 

                        <div class="row mb-3">
                            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="facebook" name="facebook" value="{{ $allfooter->facebook  }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-2 col-form-label">twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="twitter" name="twitter" value="{{ $allfooter->twitter  }}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="copyright" class="col-sm-2 col-form-label">copyright</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="copyright" name="copyright" value="{{ $allfooter->copyright  }}">
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

@endsection