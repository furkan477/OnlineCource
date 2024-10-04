@extends('site.layout.layout')

@section('content')

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span> <strong
          class="text-black">Kurslar</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">

    <div class="row mb-2">
      <div class="col-md-12 order-2">

        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4">
              <h2 class="text-black h5">Kurslarınız</h2>
            </div>
          </div>
        </div>
        <div class="row mb-5">
        @if(!empty($user->cources))
            @foreach($user->cources as $cource)
                <div class="col-sm-6 col-lg-4 mb-1" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <div class="block-4-text p-4">
                        <h3><a href>{{$cource->title}}</a></h3>
                        <p class="mb-3">{{$cource->description}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('cource.detail',$cource->id)}}" class="btn btn-primary" type="submit">Detayları</a>
                            </div>
                            <div class="col-md-6 mt-1">
                                <p class="text-primary font-weight-bold">{{$cource->price}} ₺</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
      </div>
    </div>

  </div>
</div>

@endsection