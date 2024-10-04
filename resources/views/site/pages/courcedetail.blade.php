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
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <input disabled type="text" class="form-control text-center" value="{{$cource->price}} ₺"
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    @if(Auth::id() == $cource->user->id)
                        @if($cource->status == '1')
                            Kursu Yayına Almak İçin 1 sınav veya 10 soru ekleyin
                        @elseif($cource->status == '0')
                            Kurs Yayında
                        @elseif($cource->status == '2')
                            OnlineCource Platformu Kursunuzu Gözetim Altına Aldı
                        @endif
                        @if($cource->exams)
                            <br><a href="{{route('cource.edit', $cource->id)}}" class="btn btn-sm btn-info">Düzenle</a>
                        @endif 
                        @if(!$cource->status == '0' && $cource->enrollments->count() < 1)
                            <a href="{{route('cource.delete', $cource->id)}}" class="btn btn-sm btn-danger">Kursu Sil</a>
                        @else
                            <a class="btn btn-sm btn-danger">Kurs Yayında Silemezsiniz</a>
                        @endif
                    @else
                        <p><a href="{{route('cart.create', $cource->id)}}" class="buy-now btn btn-sm btn-primary">Sepete
                                Ekle</a>
                        </p>
                    @endif
                </div>
                <div class="col-md-5 ml-auto">
                    <h2 class="text-black">Kursun İçerisindeki Dersler</h2>
                    @if(!empty($cource->lessons))
                        @foreach($cource->lessons as $lesson)
                            <div class="p-4 border mb-3">
                                @if($cource->user->id == Auth::id())
                                    <a href="{{route('stu.lesson.detail', $lesson->id)}}"
                                        class="d-block text-primary h6 text-uppercase">Ders Adı : {{$lesson->title}}</a>
                                @else
                                    <span class="d-block text-primary h6 text-uppercase">Ders Adı : {{$lesson->title}}</span>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (Auth::id() == $cource->user->id)
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
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">{{$cource->title}} Kursuna Ders Ekleyiniz</h2>
                    </div>
                    <div class="col-md-12">
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if (session()->get('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif

                        @if (session()->get('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <form action="{{route('lesson.create', $cource->id)}}" method="post">
                            @csrf
                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Adınız Soyadınız<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" disabled value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_email" class="text-black">Kurs Adı <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" disabled value="{{$cource->title}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title" class="text-black">Başlık</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="content" class="text-black">Sınav Açıklması</label>
                                        <textarea name="content" id="content" cols="30" rows="7"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Kursa Ders Ekle</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(!$cource->exams)
            <div class="site-section block-3 site-blocks-2 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">{{$cource->title}} Kursuna Sınav İşlemi Başlatın</h2>
                        </div>
                        <div class="col-md-12">
                            @if ($errors)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            @if (session()->get('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success')}}
                                </div>
                            @endif

                            @if (session()->get('error'))
                                <div class="alert alert-danger">
                                    {{session()->get('error')}}
                                </div>
                            @endif
                            <form action="{{route('exam.create', $cource->id)}}" method="post">
                                @csrf
                                <div class="p-3 p-lg-5 border">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_fname" class="text-black">Adınız Soyadınız<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" disabled value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_email" class="text-black">Kurs Adı <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" disabled value="{{$cource->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="name" class="text-black">Başlık</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="description" class="text-black">İçerik</label>
                                            <textarea name="description" id="description" cols="30" rows="7"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Kursa Sınav İşlemi
                                                Başlat</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="site-section block-3 site-blocks-2 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$cource->title}} Sınav Soruları</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">ID</th>
                                                <th>Soru</th>
                                                <th>Cevapları</th>
                                                <th>Doğru Cevap</th>
                                                <th>Soru Oluşturulma Tarihi</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cource->exams->questions as $question)
                                                <tr>
                                                    <td>{{$question->id}}</td>
                                                    <td>{{$question->question}}</td>
                                                    <td>
                                                        @foreach ($question->choices as $choice)
                                                            {{$choice->choice}} ,
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($question->choices as $choice)
                                                            @if ($choice->is_correct == 1)
                                                                {{$choice->choice}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$question->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('question.edit', $question->id)}}" class="btn btn-info"
                                                            type="submit">Düzenle</a>
                                                        <a href="{{route('question.delete', $question->id)}}" class="btn btn-danger"
                                                            type="submit">Sİl</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if(!empty($cource->exams) && $cource->exams->count() >= 1)
                            <div class="col-md-12 mt-5">
                                <a href="{{route('question.show', $cource->exams->id)}}" type="submit" class="btn btn-info">Soru Ekle
                                </a>
                                <a href="{{route('exam.start', $cource->id)}}" type="submit" class="btn btn-success">{{$cource->title}}
                                    Sınavına Gir </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection