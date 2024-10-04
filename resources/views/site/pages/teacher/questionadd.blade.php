@extends('site.layout.layout')

@section('content')


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Sınav Hazırlama</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Online E-Kurs ile {{$exam->title}} Soru Hazırlayın</h2>
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
                <form action="{{route('question.create', $exam->id)}}" method="post">
                    @csrf
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="question" class="text-black">Soru</label>
                                <textarea name="question" id="question" cols="30" rows="2"
                                    class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="choice" class="text-black">Cevap Şıkkı 1</label>
                                <input type="text" class="form-control" name="choice[0][text]">
                                <input type="radio" name="choice[0][is_correct]" value="1" class="correct-choice"> Doğru
                                <input type="radio" name="choice[0][is_correct]" value="0" class="correct-choice"> Yanlış
                            </div>
                            <div class="col-md-6">
                                <label for="choice" class="text-black">Cevap Şıkkı 2</label>
                                <input type="text" class="form-control" name="choice[1][text]">
                                <input type="radio" name="choice[1][is_correct]" value="1" class="correct-choice"> Doğru
                                <input type="radio" name="choice[1][is_correct]" value="0" class="correct-choice"> Yanlış
                            </div>
                            <div class="col-md-6">
                                <label for="choice" class="text-black">Cevap Şıkkı 3</label>
                                <input type="text" class="form-control" name="choice[2][text]">
                                <input type="radio" name="choice[2][is_correct]" value="1" class="correct-choice"> Doğru
                                <input type="radio" name="choice[2][is_correct]" value="0" class="correct-choice"> Yanlış
                            </div>
                            <div class="col-md-6">
                                <label for="choice" class="text-black">Cevap Şıkkı 4</label>
                                <input type="text" class="form-control" name="choice[3][text]">
                                <input type="radio" name="choice[3][is_correct]" value="1" class="correct-choice"> Doğru
                                <input type="radio" name="choice[3][is_correct]" value="0" class="correct-choice"> Yanlış
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Soruyu ve Cevapları
                                    Sınava Ekle</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            const correctChoices = document.querySelectorAll('input[type="radio"][value="1"]:checked');

            if (correctChoices.length > 1) {
                alert("Sadece bir doğru cevap seçebilirsiniz!");
                event.preventDefault(); // Formun gönderilmesini engelle
            }
        });

        const radios = document.querySelectorAll('input[type="radio"][class="correct-choice"]');

        radios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                const correctChoices = document.querySelectorAll('input[type="radio"][value="1"]:checked');

                if (correctChoices.length > 1) {
                    alert("Sadece bir doğru cevap seçebilirsiniz!");
                    this.checked = false; // İkinci doğru şıkkın seçilmesini engelle
                }
            });
        });
    });
</script>

@endsection