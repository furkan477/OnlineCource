@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sınav Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Sınav Listesi</li>
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
                                        <h3 class="text-center"><a href>{{$exam->title}} Hakkında </a></h3>
                                        <p class="mb-3 text-center">{{$exam->description}}</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Sınavın Öğretmeni : {{$exam->cources->user->name}}<br>
                                                Kurs Adı : {{$exam->cources->title}}<br>
                                                Sınava Katılan Kişi Sayısı : {{count($exam->examresults)}}<br>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <div class="div mt-5">
                                                        <h3 class="mb-3">Sınava Katılan Öğrenciler</h3>
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
                                                                @foreach ($exam->examresults as $examresult)                                                                                   <tr>
                                                                        <td>{{$examresult->user->id}}</td>
                                                                        <td>{{$examresult->user->name}}</td>
                                                                        <td>{{$examresult->user->role}}</td>
                                                                        <td>{{$examresult->user->created_at}}</td>
                                                                        <td><a href="{{route('admin.user.about', $examresult->user->id)}}"
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
                                                        <h3 class="mb-3">Sınavın Soru & Cevap</h3>
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

                                                                @foreach ($exam->questions as $question)
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