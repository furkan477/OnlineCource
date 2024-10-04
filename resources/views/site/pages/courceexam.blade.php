@extends('site.layout.layout')

@section('content')


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">{{$cource->title}} Sınavı</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black text-center">{{$exam->title}}</h2>
            </div>
            <div class="col-md-12">
                <p class="text-center mb-5">{{$exam->description}}.&nbsp;&nbsp; ( Her soru 10 puandır ! )</p>
            </div>
            <div class="col-md-12 pl-5">
                <form action="{{route('exam.result',$exam->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <?php $soru = 1 ?>
                        @csrf
                        @foreach ($exam->questions as $question)
                            <div class="col-md-6 pl-5 mt-5">
                                <div class="pl-5">
                                    <h2 class="text-primary">Soru {{$soru}} : </h2>
                                    <h4>{{ $question->question }}</h4>
                                    @foreach ($question->choices as $choice)
                                        <div>
                                            <input type="radio" name="answers[{{
                                                $question->id }}]" value="{{ $choice->id }}"
                                                id="choice-{{ $choice->id }}" required>
                                            <label for="choice-{{ $choice->id }}">{{ $choice->choice }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <?php $soru ++ ?>
                        @endforeach
                        <p class="mt-5" style="margin-left: auto;"><b>Online Cource Platformu Başarılar Diler :)</b></p>
                        <button class="mt-5 btn btn-success" style="width: 1200px;" type="submit">Sınavı Bitir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection