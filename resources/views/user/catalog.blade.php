@extends('layouts.user')

@section('header')
    <style>
        #hero{
          background: url('{{asset('user/images/Tugu-Jogja.png')}}') top center;
          background-repeat: no-repeat;
          width:100%;
          background-size:cover;
        }
        .form-control:focus {
          box-shadow: none;
        }

        .form-control::placeholder {
          font-size: 0.95rem;
          color: #aaa;
          font-style: italic;
        }
        .article{
          line-height: 1.6;
          font-size: 15px;
        }
    </style>
@endsection

@section('hero')
    <h1>Catalog Fourjoo</h1>
    <h2>Cek semua katalog yang anda inginkan</h2>
@endsection


@section('content')
      <!--========================== Article Section ============================-->
      <section id="catalog">
        <div class="container">

          <div class="row">
            <div class="col-12 my-5">
              <div class=" wow fadeInUp">
                <div class="section-header">
                  <h3 class="section-title">Catalog</h3>
                  <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
              </div>
              <div class=" wow fadeInUp">
              <div class="row" style="">
                <div class="card-deck">
                    @foreach($catalogs as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card my-3">
                          <img class="card-img-top" src="{{asset('catalog_image/app-1.jpg')}}" alt="Card image cap">
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
                </div>
              </div>
            </div>
            </div>
          </div>

        </div>
      </section>
@endsection
