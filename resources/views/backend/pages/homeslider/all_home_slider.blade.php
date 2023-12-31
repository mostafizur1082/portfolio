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
                            <li class="breadcrumb-item"><a href="<?php echo URL::current(); ?>">All Home Slider</a></li>
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
                            <a href="{{ route('add.slider') }}" class="btn btn-outline-danger waves-effect waves-light"> Add Home Slide</a>
                        </div>
                        <br>

                        <h4 class="card-title">All Home Slide</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Short Title</th>
                                <th>Video Url</th>
                                <th>Slide Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($homesliders as $key => $homeslider)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>
                                    {{ Illuminate\Support\Str::limit($homeslider->title, 20) }}</td>
                                <td>
                                    {{ Illuminate\Support\Str::limit($homeslider->short_title, 20) }}
                                </td>
                                <td>
                                {{ Illuminate\Support\Str::limit($homeslider->video_url, 20) }}
                                <td>
                                    <img src="{{ asset( $homeslider->slider_img) }}"  style="width: 70px; height: 40px;" rounded>
                                </td>
                                <td>
                                    <a href="{{ route('edit.slider', $homeslider->id) }}" class="btn btn-info waves-effect waves-light"> Edit </a>
                                    <a href="{{ route('delete.slider', $homeslider->id) }}" class="btn btn-danger waves-effect waves-light" id="delete"> Delete </a>
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