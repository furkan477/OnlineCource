@extends('site.layout.layout')

@section('content')


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black">İletişim</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Online E-Kurs İle İletişime Geçin</h2>
            </div>
            <div class="col-md-8">
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
                <form action="{{route('contact.create')}}" method="post">
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
                                <label for="subject" class="text-black">Konu</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="message" class="text-black">Mesaj</label>
                                <textarea name="message" id="message" cols="30" rows="7"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Mesajı Gönder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 ml-auto">
                @if(!empty($user->contacts))
                @foreach($user->contacts as $contact)
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase">{{$contact->subject}}</span>
                        <span class="d-block text-primary h6 text-uppercase">Tarih : {{$contact->created_at}}</span>
                        <p class="mb-0">{{$contact->message}}</p>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection