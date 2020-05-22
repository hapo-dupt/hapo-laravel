@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pending Projects</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Projets is Pending</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title Project</th>
                                        <th>Time Begin</th>
                                        <th>Time Finish</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listProject as $value)
                                        <tr>
                                            <td>{{ $value->project_id }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ date('H:i d-m-Y', strtotime($value->begin_at)) }}</td>
                                            <td>{{ date('H:i d-m-Y', strtotime($value->finish_at)) }}</td>
                                            <td>
                                                <a href="{{ route('member.manage_tasks', $value->id) }}" class="btn btn-success">view</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
