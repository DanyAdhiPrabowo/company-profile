@extends('layouts.admin')

@section('title', 'Edit Employees')

@section('breadcrumbs', 'Employees' )

@section('second-breadcrumb')
	<li>Edit</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="col-12 mb-3">
            <h3 align="center"></h3>
          </div>
          <form action="{{route('employees.update', [$employee->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-10">
              <div class="mb-3">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" name="name" placeholder="Name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{ old('name', $employee->name)}}" required>
                <div class="invalid-feedback"> {{$errors->first('name')}}</div>
              </div>
              <div class="mb-3">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" placeholder="Email..." class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" value="{{ old('email', $employee->email) }}" required>
                <div class="invalid-feedback"> {{$errors->first('email')}}</div>
              </div>
              <div class="mb-3 mt-4">
                <a href="{{route('employees.index')}}" class="btn btn-md btn-secondary">Back</a>
                <button type="submit" class="btn btn-md btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
