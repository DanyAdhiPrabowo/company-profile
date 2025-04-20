@extends('layouts.admin')

@section('title', 'Create Catalogs')

@section('breadcrumbs', 'Catalogs' )

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="col-12 mb-3">
              <h3 align="center"></h3>
            </div>
            <form action="{{route('catalogs.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-10">
                  <div class="mb-3">
                    <label for="catalog" class="font-weight-bold">Name</label>
                    <input type="text" name="name" placeholder="Catalog name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" required>
                    <div class="invalid-feedback"> {{$errors->first('name')}}</div>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea type="text" name="description" placeholder="Catalog Description..." class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" required>{{old('description')}}</textarea>
                    <div class="invalid-feedback"> {{$errors->first('description')}}</div>
                  </div>
                  <div class="mb-3">
                    <label for="catalog" class="font-weight-bold">Price</label>
                    <input type="number" min=0 name="price" placeholder="Catalog price..." class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" value="{{old('price')}}" required>
                    <div class="invalid-feedback"> {{$errors->first('name')}}</div>
                  </div>
                  <div class="mb-3">
                    <label for="catalog" class="font-weight-bold">Category</label>
                    <div class="row form-group ml-1">
                      <div class="col col-md-9">
                        <div class="form-check">
                          <div class="radio">
                            <label for="vape" class="form-check-label ">
                              <input type="radio" name="category" value="vape" class="form-check-input" checked>Vape
                            </label>
                          </div>
                          <div class="radio">
                            <label for="coffe" class="form-check-label ">
                              <input type="radio" name="category" value="coffe" class="form-check-input">Coffe
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="slug" class="font-weight-bold">Image</label>
                    <input type="file" name="image" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" required>
                    <div class="invalid-feedback"> {{$errors->first('image')}}</div>
                  </div>
                  <div class="mb-3 mt-4">
                    <a href="{{route('categories.index')}}" class="btn btn-md btn-secondary">Back</a>
                    <button type="submit" class="btn btn-md btn-success">Save</button>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
