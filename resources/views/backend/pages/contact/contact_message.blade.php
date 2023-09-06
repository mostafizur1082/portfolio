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
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">All Contact Mesaage</a></li>
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

                        {{-- <div class="button-items">
                            <a href="{{ route('about.multi.image') }}" class="btn btn-outline-danger waves-effect waves-light"> Add Multi Image</a>
                        </div> --}}
                        <br>

                        <h4 class="card-title">All Contact Mesaage</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                           @foreach($allcontact as $key => $contact)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contact->name }} </td>
                                <td>{{ $contact->email }} </td>
                                <td>{{ $contact->phone }} </td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}</td>
                               
                                
                                <td>
                                    <a href="{{ route('delete.message', $contact->id)  }}" class="btn btn-danger sm" title="delete data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
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