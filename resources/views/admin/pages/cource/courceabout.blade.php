@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kursların Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Kurs Listesi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 mb-5 pl-5">
        <div class="row pl-5">
            <div class="col-md-11 pl-5">
                <div class="card card-primary card-outline mb-3">
                    <div class="card-body box-profile">
                        <div class="row mb-5 mt-3">
                            <div class="col-sm-12 col-lg-12 mb-1" data-aos="fade-up">
                                <div class="block-4 border">
                                    <div class="block-4-text p-4">
                                        <h3 class="text-center"><a href>{{$cource->title}} Hakkında </a></h3>
                                        <p class="mb-3 text-center">{{$cource->description}}</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                Kurs Öğretmeni : {{$cource->user->name}}<br>
                                                Kurs Adı : {{$cource->title}}<br>
                                                Kurs Açıklaması : {{$cource->description}}<br>
                                                Kurs Fiyatı : {{$cource->price}} ₺<br>
                                                Kurs Kategorisi : {{$cource->category->name}}<br>
                                                Kurs Durumu : {{$cource->status}}<br>
                                                Kurs Oluşturulma Tarihi : {{$cource->created_at}}<br>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                öğrenci sayısı : {{count($cource->enrollments)}}<br>
                                                Ders sayısı : {{count($cource->lessons)}}<br>
                                                Sınav Adı : {{$cource->exams->title}}<br>
                                                Sınav Açıklaması: {{$cource->exams->description}}<br>
                                                Sınav Soru sayısı : {{count($cource->exams->questions)}}<br>
                                                Sınav Cevap Şık sayısı : {{count($cource->exams->questions) * 4}}<br>
                                                Sınava Katılan Öğrenci Sayısı : {{count($cource->exams->examresults)}}<br>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <div class="div mt-5">
                                                        <h3 class="mb-3">Kursun Öğrencileri</h3>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">ID</th>
                                                                    <th>Adı Soyadı</th>
                                                                    <th>Rolü</th>
                                                                    <th>Katılma Tarihi</th>
                                                                    <th style="width: 40px">Bilgi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($cource->enrollments as $student)                                                                                   <tr>
                                                                        <td>{{$student->user->id}}</td>
                                                                        <td>{{$student->user->name}}</td>
                                                                        <td>{{$student->user->role}}</td>
                                                                        <td>{{$student->user->created_at}}</td>
                                                                        <td><a href="{{route('admin.user.about', $student->user->id)}}"
                                                                                class="btn btn-primary"
                                                                                type="submit">Hakkında</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="div mt-5">
                                                        <h3 class="mb-3">Kursun Sınavına Girenler</h3>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">ID</th>
                                                                    <th>Adı Soyadı</th>
                                                                    <th>Rolü</th>
                                                                    <th>Puanı</th>
                                                                    <th>Belgesi</th>
                                                                    <th>Bilgi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($cource->exams->examresults as $result)                                                                                  <tr>
                                                                        <td>{{$result->user->id}}</td>
                                                                        <td>{{$result->user->name}}</td>
                                                                        <td>{{$result->user->role}}</td>
                                                                        <td>{{$result->score}}</td>
                                                                        <td>
                                                                            @if($result->certifica->certifica == 0)
                                                                                Belgesiz
                                                                            @elseif($result->certifica->certifica == 1)
                                                                                Teşekkür
                                                                            @elseif($result->certifica->certifica == 2)
                                                                                Takdir
                                                                            @endif
                                                                        </td>

                                                                        <td><a href="{{route('admin.user.about', $result->user->id)}}"
                                                                                class="btn btn-primary"
                                                                                type="submit">Hakkında</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="div mt-5">
                                                        <h3 class="mb-3">Kursun Dersleri</h3>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">ID</th>
                                                                    <th>Ders</th>
                                                                    <th>Açıklaması</th>
                                                                    <th>işlem</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($cource->lessons as $lesson)                                                                                     <tr>
                                                                        <td>{{$lesson->id}}</td>
                                                                        <td>{{$lesson->title}}</td>
                                                                        <td>{{$lesson->content}}</td>
                                                                        <td><a href="{{route('admin.lesson.edit',$lesson->id)}}" class="btn btn-primary"
                                                                                type="submit">Düzenle</a>
                                                                            <a href="{{route('admin.lesson.delete',$lesson->id)}}" class="btn btn-danger"
                                                                                type="submit">Sil</a>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="div mt-5">
                                                        <h3 class="mb-3">Sınav Soru & Cevap</h3>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Soru</th>
                                                                    <th>Cevapları</th>
                                                                    <th>Doğru Cevap</th>
                                                                    <th>İşlem</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($cource->exams->questions as $question)
                                                                    <tr>
                                                                        <td>{{$question->question}}</td>
                                                                        <td>
                                                                            @foreach ($question->choices as $choice)
                                                                                {{$choice->choice}} ,<br>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($question->choices as $choice)
                                                                                {{$choice->is_correct == 1 ? $choice->choice : ''}}<br>
                                                                            @endforeach
                                                                        </td>
                                                                        <td><a href="{{route('admin.question.edit',$question->id)}}" class="btn btn-primary"
                                                                                type="submit">Düzenle</a>
                                                                            <a href="{{route('admin.question.delete',$question->id)}}" class="btn btn-danger"
                                                                                type="submit">sil</a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection