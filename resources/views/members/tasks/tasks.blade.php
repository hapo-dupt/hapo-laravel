@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tasks Management</h1>
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
                            @if(session('success'))
                                <div class="alert alert-success text-center">
                                    {{session('success')}}
                                </div>
                            @endif

                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start at</th>
                                        <th>Finish at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ date('H:i d-m-Y', strtotime($value->begin_at)) }}</td>
                                            <td>{{ date('H:i d-m-Y', strtotime($value->finish_at)) }}</td>
                                            <td>
                                                @if($value->status == \App\Models\Member::STATUS_ACTIVE)
                                                    <p class="alert alert-success p-1 text-center">Pending</p>
                                                @else
                                                    <p class="alert alert-danger p-1 text-center">Completed</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->status == \App\Models\Member::STATUS_ACTIVE)
                                                    <a class="btn btn-success text-white dataClass" data-toggle="modal"
                                                       data-target="#exampleModal" data-whatever="@mdo"
                                                       data-id="{{ $value->id }}" data-project-id="{{ $id }}">Complete</a>
                                                @else
                                                    <a class="btn btn-secondary text-white" disabled>Complete</a>
                                                @endif
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
        <!-- Modals Completed Tasks -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group alert alert-warning p-0">
                            <strong>
                                You must to ensure that this task is completed before you continue close the task!
                            </strong>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('member.completed_tasks') }}">
                        @csrf
                        <div class="modal-data">
                            <input type="text" name="TaskId" id="TaskId" value="" hidden/>
                            <input type="text" name="projects" id="projects" value="" hidden/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-white" id="idTask">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Completed Task -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Pass data from table to modal -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $(function () {
            $(".dataClass").click(function () {
                var taskId = $(this).data('id');
                var projectId = $(this).data('project-id');
                $(".modal-data #TaskId").val(taskId);
                $(".modal-data #projects").val(projectId);
            })
        });
    </script>
    <!-- End pass data -->
@endsection
