@extends('site.layout.layout')

@section('content')


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Dersi Güncelle</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Online E-Kurs İle Ders Güncelleme</h2>
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
                <form action="{{route('lesson.update',$lesson->id)}}" method="post">
                    @csrf
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Adınız Soyadınız<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" disabled value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" disabled value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title" class="text-black">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$lesson->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="content" class="text-black">İçeril</label>
                                <textarea name="content" id="content" cols="30" rows="7"
                                    class="form-control">{{$lesson->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Dersi Güncelle</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection