@extends('layouts.admin')

@section('title', 'Change Password')

@section('breadcrumbs', 'Change Password' )

@section('second-breadcrumb')
    <li>Change Password</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body my-5">
            <div class="col-12 mb-5">
              <h3 align="center">Change Password</h3>
            </div>
            <form action="{{route('change-password.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="col-5 mx-auto">
                  <div class="mb-3">
                    <label for="new_password" class="font-weight-bold">New Password</label>
                    <input type="password" name="new_password" placeholder="New password..." class="form-control {{$errors->first('new_password') ? "is-invalid" : ""}}" required>
                    <div class="invalid-feedback"> {{$errors->first('new_password')}}</div>
                  </div>
                  <div class="mb-3">
                    <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password..." class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" required>
                    <div class="invalid-feedback"> {{$errors->first('password_confirmation')}}</div>
                  </div>
                  <div class="mb-3">
                    <label for="current_password" class="font-weight-bold">Current Password</label>
                    <input type="password" name="current_password" placeholder="Current password..." class="form-control {{$errors->first('current_password') ? "is-invalid" : ""}}" required>
                    <div class="invalid-feedback"> {{$errors->first('current_password')}}</div>
                  </div>
                  <button type="submit" class="btn btn-primary">Change Password</button>
              </form>
              <a href="{{route('dashboard')}}" class="btn btn-secondary">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection
