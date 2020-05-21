@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('members') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('projects') }}">Manage Projects</a></li>
                            <li class="breadcrumb-item active">Project Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects Detail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                @foreach($data as $time)
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Start Date</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ date('H:i d-m-Y', strtotime($time->begin_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">End Date</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ date('H:i d-m-Y', strtotime($time->finish_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Process</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ $process }}%<span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Projects Details</h4>
                                    @foreach($data as $projects_data)
                                    <div class="post">
                                        <div class="mb-2">
                                            <strong>Title Project</strong>
                                        </div>
                                        <p>
                                            {{ $projects_data->title }}
                                        </p>
                                    </div>

                                    <div class="post clearfix">
                                        <div class="mb-2">
                                            <strong>Project Description</strong>
                                        </div>
                                        <p>
                                            {{ $projects_data->description }}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i>Additional Information</h3>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Customer
                                    <b class="d-block">{{ $customer->full_name }}</b>
                                </p>
                                <p class="text-sm">Team members
                                    @foreach($member as $value)
                                        @if($value->full_name != auth()->guard('member')->user()->full_name)
                                            <b class="d-block mb-2">- &nbsp {{ $value->full_name }}</b>
                                        @else
                                            <b class="d-block mb-2">- &nbsp You</b>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
