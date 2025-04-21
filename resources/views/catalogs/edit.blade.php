@extends('layouts.admin')

@section('title', 'Edit Catalogs')

@section('breadcrumbs', 'Catalogs' )

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
            <form action="{{route('catalogs.update', [$catalog->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="col-10">
                    <div class="mb-3">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" placeholder="Catalog name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{$catalog->name}}" required>
                        <div class="invalid-feedback"> {{$errors->first('name')}}</div>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="font-weight-bold">Description</label>
                      <textarea type="text" name="description" placeholder="Catalog Description..." class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" value="">{{$catalog->description}}</textarea>
                      <div class="invalid-feedback"> {{$errors->first('description')}}</div>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="font-weight-bold">Price</label>
                      <input type="number" min=0 name="price" placeholder="Catalog Price..." class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" value="{{$catalog->price}}" required>
                      <div class="invalid-feedback"> {{$errors->first('price')}}</div>
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
                              <label for="coffee" class="form-check-label ">
                                <input type="radio" name="category" value="coffee" class="form-check-input">Coffee
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="font-weight-bold d-flex">Image</label>
                      @if($catalog->image)
                        <img src="{{asset('catalog_image/'.$catalog->image)}}" alt="" width="120px">
                      @else
                        No Image
                      @endif
                      <input type="file" name="image" class="form-control mt-2" >
                      <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>
                    <div class="mb-3 mt-4">
                      <a href="{{route('categories.index')}}" class="btn btn-md btn-secondary">Back</a>
                      <button type="submit" class="btn btn-md btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
