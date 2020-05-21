@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('members') }}">Home</a></li>
                            <li class="breadcrumb-item active">Member Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('storage/images/'.( new \App\Models\Member)->info()->image) }}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ ( new \App\Models\Member)->info()->username }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Projects Pending</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tasks Pending</b> <a class="float-right">543</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" method="POST" action="{{ route('member.change_profiles') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-12 col-form-label mb-2 text-danger">
                                                    Review and update your information:
                                                </label>
                                            </div>
                                            @if(session('success'))
                                                <div class="alert alert-success text-center">
                                                    {{session('success')}}
                                                </div>
                                            @endif
                                            @if(session('errorMsg'))
                                                <div class="alert alert-success text-center">
                                                    {{session('errorMsg')}}
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="id" value="{{ auth()->guard('member')->user()->id }}" hidden>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Your Full Name"
                                                           value="{{ auth()->guard('member')->user()->full_name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" value="{{ auth()->guard('member')->user()->email }}"
                                                           class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                        <option value="">Choose a gender</option>
                                                        <option value="{{ auth()->guard('member')->user()->gender_male }}"
                                                                @if(auth()->guard('member')->user()->gender === (new \App\Models\Member)->gender_male) selected @endif>Male</option>
                                                        <option value="{{ auth()->guard('member')->user()->gender_female }}"
                                                                @if(auth()->guard('member')->user()->gender === (new \App\Models\Member)->gender_female) selected @endif>Female</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>
                                                <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="phone" value="{{ auth()->guard('member')->user()->phone }}"
                                                           class="form-control @error('phone') is-invalid @enderror" id="inputEmail" placeholder="Your Number Phone">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control @error('address') is-invalid @enderror" id="inputExperience" name="address"
                                                              placeholder="Your Address">{{ auth()->guard('member')->user()->address }}</textarea>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Change Avatar</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                                           id="inputSkills" name="image">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail" placeholder="New Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Re-Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="repassword" class="form-control @error('repassword') is-invalid @enderror" id="inputEmail" placeholder="Re-Password">
                                                    @error('repassword')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
