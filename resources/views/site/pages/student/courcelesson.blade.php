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

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="text-black">{{$cource->title}}</h2>

                <p><b>
                        Kurs Hocası Adı Soyadı : {{$cource->user->name}}<br>
                        Kurs Hocası İletişim : {{$cource->user->email}}<br>
                        Kurs Açıklaması : {{$cource->description}}<br>
                        Kurs Kategorisi : {{$cource->category->name}}<br>
                        Kurs Yayınlanma Tarihi : {{$cource->created_at}}<br><br>
                        Kurs Dersleri ; <br>
                        @foreach ($cource->lessons as $lesson)
                            - {{$lesson->title}}<br>
                        @endforeach
                        <br>
                    </b></p>
            </div>
            <div class="col-md-5 ml-auto">
                <h2 class="text-black">Kursun İçerisindeki Dersler</h2>
                @if(!empty($cource->lessons))
                    @foreach($cource->lessons as $lesson)
                        <div class="p-4 border mb-3">
                            <span class="d-block text-primary h6 text-uppercase">Ders Adı : {{$lesson->title}}</span>
                            <p class="d-block ">{{$lesson->content}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$cource->title}} Dersleri</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Ders Başlığı</th>
                                    <th>Ders İçeriği</th>
                                    <th>Kurs Adı</th>
                                    <th>Ders Oluşturulma Tarihi</th>
                                    <th style="width: 40px">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cource->lessons as $lesson)
                                    <tr>
                                        <td>{{$lesson->id}}</td>
                                        <td>{{$lesson->title}}</td>
                                        <td>{{$lesson->content}}</td>
                                        <td>{{$lesson->cources->title}}</td>
                                        <td>{{$lesson->created_at}}</td>
                                        <td>
                                            <a href="{{route('stu.lesson.detail', $lesson->id)}}" class="btn btn-info"
                                                type="submit">Derse Git</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2">
    <div class="container">
        <div class="row">
            @if($examcontrol)
                <div class="col-md-12 ml-auto mt-5">
                    <h2 class="text-black text-center mb-5">Sınav Sonucu</h2>
                    <div class="p-4 border mb-3 bg-light">
                        <span class="d-block text-primary h6 text-uppercase text-center">{{$cource->title}} Kursunun {{$cource->exams->title}} Sonucu</span>
                        <p class="d-block ">Sınava Giren Ad Soyad : {{$examcontrol->user->name}}</p>
                        <p class="d-block ">Sınav Sonucu : {{$examcontrol->score}}</p>
                        <b>Online Cource Platformunda {{$cource->category->name}} Kategorisindeki {{$cource->title}} Kursunu {{$cource->price}} ₺ ye satın alarak
                            giren {{Auth::user()->name}} Kişisinin sınav sonucu ve o sınav sonucuna uygun bir sertifikası türkiyenin en büyük ve en yetenekli hocalarına sahip olan
                            Online Cource Platformunun verdiği sertifaka
                            @if ($certifica->certifica == '0')
                                <b>Maelesef tekrar yapmak zorundasınız bu kursu geçemdiniz belge alamadınız , hadi şimdi tekrar kurs eğitimi al ve güçlen Başarılar !</b>
                            @elseif ($certifica->certifica == '1')
                                <b>Tebrikler bu kursun teşekkür belgesine hak kazandınız online cource Başarılarınızın devamını diler !</b>
                            @elseif ($certifica->certifica == '2')
                                <b>Tebrikler bu kursun takdir belgesine hak kazandınız online cource platformu senden çok memnun başarılarının devamını online cource platformunda gerçekleştirmeni isteriz
                                    seni aramızda görmek çok mutluluk verici Başarılar
                                </b>
                            @endif
                        </b>
                    </div>
                </div>
            @else
                <div class="col-md-12 mt-5">
                    <a href="{{route('exam.start', $cource->id)}}" type="submit" class="btn btn-success">{{$cource->title}}
                        Sınavına Gir </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection