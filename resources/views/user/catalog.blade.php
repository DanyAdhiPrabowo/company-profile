@extends('layouts.user')

@section('header')
  <style>
      #hero{
        background: url('{{asset('user/images/Tugu-Jogja.png')}}') top center;
        background-repeat: no-repeat;
        width:100%;
        background-size:cover;
      }
  </style>
@endsection

@section('hero')
    <h1>Catalog Fourjoo</h1>
    <h2>Cek semua katalog yang anda inginkan</h2>
@endsection


@section('content')
  @php
    $c = request()->input('c');
  @endphp
  <!--========================== Catalog Section ============================-->
  <section id="catalog">
    <div class="container">

      <div class="row">
        <div class="col-12 my-5">
          <div class="">
            <div class="section-header">
              <h3 class="section-title">Catalog</h3>
              <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
          </div>
          <div class="d-flex justify-content-center mb-3 gap-2">
            <a href="{{route('catalog', ['c' => 'vape'])}}" class="btn btn-sm text-light mr-3 {{$c !='coffee'?'btn-primary':'btn-secondary'}}">Vape</a>
            <a href="{{route('catalog', ['c' => 'coffee'])}}" class="btn btn-sm text-light {{$c =='coffee'?'btn-primary':'btn-secondary'}}">Coffee</a>
          </div>
          <div class=" wow fadeInUp">
            <div class="row" style="">
              <div class="card-deck">
                @if (count($catalogs) != 0)
                  @foreach($catalogs as $item)
                  <div class="col-lg-4 col-md-6">
                      <div class="card my-3" style="min-width: 328px;">
                        <img class="card-img-top" src="{{asset('catalog_image/'.$item->image)}}" alt="Card image cap" style="width:328px; height: 200px; object-fit: cover;">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold">{{$item->name}}</h5>
                          <p class="card-text">{{$item->description}}</p>
                          <div class="row mt-3">
                            <div class="col text-right d-flex">
                              <h5 class="mr-auto card-text">Harga</h5>
                              <p class="font-weight-bold" style="color: #2dc997">Rp. {{$item->price}}</p>
                            </div>
                          </div>
                          <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        </div>
                      </div>
                  </div>
                  @endforeach
                @else
                  <div class="mt-5 d-flex align-items-center justify-content-center" style="height: 10vh;">
                    <div class="code font-weight-bold text-center" style="border-right: 3px solid; font-size: 60px; padding: 0 15px 0 15px;">
                      404
                    </div>
                    <div class="text-center" style="padding: 10px; font-size: 46px;">
                      Not Found
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
