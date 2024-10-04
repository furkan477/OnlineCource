@extends('site.layout.layout')

@section('content')


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">Kurs Eğitimi Düzenle</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Online E-Kurs Düzenleme</h2>
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
                <form action="{{route('course.update',$cource->id)}}" method="post">
                    @csrf
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Adınız Soyadınız<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" disabled value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" disabled value="{{Auth::user()->email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="c_fname" class="text-black">Kursun Kategorisi : {{$cource->category->name}} <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id">
                                    <option disabled selected>Kursunuzun Kategorisini Seçiniz</option>
                                    @foreach ($categories as $category)
                                        @include('undercategories',['category' => $category , 'prefix' => ' '])
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="c_fname" class="text-black">Kursun Durumu<span class="text-danger">*</span></label>
                                <select class="form-control" name="status">
                                    @if ($status == true)
                                        <option {{$cource->status == 0 ? 'selected' : ''}} value="0">Yayında Kalsın</option>
                                    @else
                                        <option disabled>Yayına Açmak için kursunuza 5 ders , 1 sınav ve 10 sınav sorusu ekleyiniz</option>
                                    @endif
                                    <option {{$cource->status == 1 ? 'selected' : ''}} value="1">Beklemeye Al</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="price" class="text-black">Kurs'un Fiyatı <span class="text-danger">*</span></label>
                                <input type="integer" class="form-control" name="price" value="{{$cource->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title" class="text-black">Kurs Başlığı</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$cource->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="description" class="text-black">Kurs Açıklaması</label>
                                <textarea name="description" id="description" cols="30" rows="7" class="form-control">{{$cource->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Kursu Düzenle</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection