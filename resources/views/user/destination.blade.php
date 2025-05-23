@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/destination.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
            margin:5px;
        }
        .full-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 180px;
        }
        .content{
          line-height: 1.6;
          font-size: 15px;
        }
    </style>
@endsection

@section('hero')
    <h1>Destinasi Jogja-Travel</h1>
    <h2>Cek semua destinasi-destinasi yang dapat anda kunjungi untuk liburan anda</h2>
@endsection

@section('content')

    <section id="contact">
      <div class="row justify-content-center">
        <div class="col-sm-10">
          <div class="row container">
            <div class="col-sm-9">

              @if (empty(request()->segment(2)) )
                @component('user.component.all_destination', ['destinations'=> $destinations])
                @endcomponent
              @else
                @component('user.component.single_destination', ['destination'=> $destinations])
                @endcomponent
              @endif


            </div>
            <div class="col-sm-3 mt-5">
              <form action="{{route('destination')}}" class="mt-5">
                <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                  <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Destinasi lain?" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                  <div class="input-group-append border-0">
                    <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
              <div class="mb-3 font-weight-bold">Other Posts</div>
              @foreach ($other as $item)
                <div>
                    <a href="{{route('destination.show', [$item->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                      {{$item->title}}
                    </a>
                    <hr >
                </div>
              @endforeach
            </div>

          </div>
        </div>

      </div>
    </section>

@endsection
