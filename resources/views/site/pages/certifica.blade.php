@extends('site.layout.layout')

@section('content')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Kurs Detayaları</strong>
            </div>
        </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto mt-5">
                <h2 class="text-black text-center mb-5">Sınav Sonucu</h2>
                @if(!empty($user->certifica) && $user->certifica->count() >= 1)
                    @foreach($user->certifica as $certifica)
                        <div class="p-4 border mb-3 bg-light">
                            <span class="d-block text-primary h6 text-uppercase text-center">{{$certifica->cources->title}}
                                Kursunun
                                {{$certifica->cources->exams->title}} Sonucu</span>
                            <p class="d-block ">Sınava Giren Ad Soyad : {{$certifica->users->name}}</p>
                            <p class="d-block ">Sınav Sonucu : {{$certifica->examresults->score}} Puan</p>
                            <b>Online Cource Platformunda {{$certifica->cources->category->name}} Kategorisindeki
                                {{$certifica->cources->title}} Kursunu
                                {{$certifica->cources->price}} ₺ ye satın alarak
                                giren ad Kişisinin sınav sonucu ve o sınav sonucuna uygun bir sertifikası
                                türkiyenin en büyük ve en yetenekli hocalarına sahip olan
                                Online Cource Platformunun verdiği sertifaka
                                @if ($certifica->certifica == '0')
                                    <b>Maelesef tekrar yapmak zorundasınız bu kursu geçemdiniz belge alamadınız , hadi şimdi tekrar
                                        kurs eğitimi al ve güçlen Başarılar !</b>
                                @elseif ($certifica->certifica == '1')
                                    <b>Tebrikler bu kursun teşekkür belgesine hak kazandınız online cource Başarılarınızın devamını
                                        diler !</b>
                                @elseif ($certifica->certifica == '2')
                                    <b>Tebrikler bu kursun takdir belgesine hak kazandınız online cource platformu senden çok memnun
                                        başarılarının devamını online cource platformunda gerçekleştirmeni isteriz
                                        seni aramızda görmek çok mutluluk verici Başarılar
                                    </b>
                                @endif
                            </b>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection