@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$exam->title}} Sınavını Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.exam.update',$exam->id)}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Kursu :</label>
                  <select class="form-control" name="cource_id">
                    @foreach ($cources as $cource)
                      <option {{$cource->id == $exam->cources->id ? 'selected' : ''}} value="{{$cource->id}}">{{$cource->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kurs Başlığı</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="title" value="{{$exam->title}}"/>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kurs Açıklaması</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="description" value="{{$exam->description}}"/>
                  </div>
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