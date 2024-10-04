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

    <div class="row mb-5">
      <div class="col-md-9 order-2">
        <div class="row mb-5">
          @if(!empty($cources))
            @foreach($cources as $cource)
              <div class="col-sm-6 col-lg-12 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.html">{{$cource->title}}</a></h3>
                    <p class="mb-3">{{$cource->description}}</p>
                    <div class="row">
                      <div class="col-md-6">                    
                        <a class="btn btn-primary" href="{{route('cource.detail',$cource->id)}}" type="submit">Detayları</a>
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
        <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <form action="{{route('cource.d')}}" method="get">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-black d-block">Fiyatına Göre Filtrele</h3>
              <input type="text" name="start_price" placeholder="En Düşük : {{$minprice}} ₺">
              <input class="mt-2" type="text" name="end_price" placeholder="En Yüksek : {{$maxprice}} ₺">
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-black d-block">Kategoriye Göre Filtrele</h3>
              <select name="category_id">
                <option null selected value="0">Tüm Kategoriler</option>
                @foreach ($categories as $category)
                  @include('undercategories',['category' => $category , 'prefix' => ''])
                @endforeach
              </select>
            </div>
            <button class="btn btn-primary" type="submit">Filtrele</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection