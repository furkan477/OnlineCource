@extends('site.layout.layout')

@section('content')

@if(Auth::user()->role == 'stu' || Auth::user()->role == 'adm')
    <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">Kurslar</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">Kurs satın alın ve derslerini işleyerek kursun sınavına girerek sertifikanızı alın.<br> İYİ Günler :) </p>
                        <p>
                            <a href="{{route('cource.d')}}" class="btn btn-sm btn-primary">Şimdi Uygun Fiyata Kurs Al</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif(Auth::user()->role == 'tch' || Auth::user()->role == 'adm')
    <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">Kurslar</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">Kurs eğitimi vermek için şartlarımız vardır : Kurs eğitimi ver dediğinizde kurs yayında olmuyacaktır , kursun 1 sınavı olabilir , kursun en az 5 dersi olmalıdır , kursun 10 sınav sorusu olur ve kursu öğrenci aldıysa kursu silemezsin fakat güncelleyebilirsiniz.<br> İYİ Günler :) </p>
                        <p>
                            <a href="{{route('cource.show')}}" class="btn btn-sm btn-primary">Şimdi Kurs Eğitimi Ver</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<x-info />

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>En Son Yüklenen 5 kurs</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    @if(!empty($cources))
                        @foreach($cources as $cource)
                            <div class="item">
                                <div class="block-4 text-center">
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
            </div>
        </div>
    </div>
</div>

@endsection