@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sınav Soru&Cevap Listesi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin')}}">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Soru&Cevap Listesi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sitedeki Sınavların Soru&Cevap Listesi ({{count($questions)}})</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Oluşturan Kişi</th>
                                        <th>Kursu</th>
                                        <th>Sınav Adı</th>
                                        <th>Soru</th>
                                        <th>Cevapları</th>
                                        <th>Doğru Cevap</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($questions))
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{$question->id}}</td>
                                                <td><a href="{{route('admin.user.about',$question->exams->cources->user->id)}}">{{$question->exams->cources->user->name}}</a></td>
                                                <td><a href="{{route('admin.cource.about',$question->exams->cources->id)}}">{{$question->exams->cources->title}}</a></td>
                                                <td><a href="{{route('admin.exam.about',$question->exams->id)}}">{{$question->exams->title}}</a></td>
                                                <td>{{$question->question}}</td>
                                                <td>
                                                    @foreach ($question->choices as $choice)
                                                        {{$choice->choice}},<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($question->choices as $choice)
                                                        {{$choice->is_correct == 1 ? $choice->choice : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{$question->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.exam.about',$question->exams->id)}}" class="btn btn-success">Hakkında</a>
                                                    <a href="{{route('admin.question.edit',$question->id)}}" class="btn btn-info">Düzenle</a>
                                                    <a href="{{route('admin.question.delete',$question->id)}}" class="btn btn-danger">Silmek</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection