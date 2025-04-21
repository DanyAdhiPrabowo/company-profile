@extends('layouts.admin')

@section('title','List Employees')

@section('breadcrumbs', 'Overview Employees')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="my-3 text-right">
            <a href="{{route('employees.create')}}" class="btn btn-sm btn-success">
              <i class="fa fa-plus"></i>
              Create
            </a>
          </div>

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <table class="table table-striped table-bordered" >
            <thead class="text-light" style="background-color:#33b751 !important">
              <tr class="text-center">
                <th style="width:10px">No</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width:165px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $index => $item)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>
                    <a href="{{route('employees.edit', [$item->id])}}" class="btn btn-sm btn-warning text-light">
                      <i class="fa fa-pencil"></i>
                      Edit
                    </a>
                    <button class="btn btn-sm btn-danger" onclick="deleteConfirm('{{$item->id}}', '{{$item->name}}')" data-target="#modalDelete" data-toggle="modal">
                      <i class="fa fa-trash"></i>
                      Delete
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title d-inline">Delete Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="message"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <form action="" id="url" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
      </div>
    </div>
  <!-- End Modal Delete -->
@endsection

@section('script')
  <script>
    function deleteConfirm(id, name){
      var url = '{{ route("employees.destroy", ":id") }}';
          url = url.replace(':id', id);
      document.getElementById("url").setAttribute("action", url);
      document.getElementById('message').innerHTML ="Are you sure want to delete emplyee "+name+" ?"
      $('#modalDelete').modal();
    }
  </script>
@endsection
