@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Soru & Cevap Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.question.update', $question->id)}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Soru</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="question" value="{{$question->question}}" />
                      </div>
                    </div>
                  </div>
                  @php $sayi = 1; @endphp
                  @foreach ($question->choices as $key => $choice)
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cevap {{$sayi}}</label>
                        <div class="input-group">
                          <input type="hidden" name="choice[{{$key}}][id]" value="{{$choice->id}}">
                          <input type="text" class="form-control" name="choice[{{$key}}][text]" value="{{$choice->choice}}">
                          <input type="radio" name="choice[{{$key}}][is_correct]" {{$choice->is_correct == 0 ? 'checked' : ''}} value="0" class="correct-choice"> Yanlış
                          <input type="radio" name="choice[{{$key}}][is_correct]" {{$choice->is_correct == 1 ? 'checked' : ''}} value="1" class="correct-choice"> Doğru
                        </div>
                      </div>
                    </div>
                    @php $sayi ++ @endphp
                  @endforeach
                </div>
                <div class="form-group mt-5">
                  <button type="submit" class="form-control bg-primary">Güncelle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection