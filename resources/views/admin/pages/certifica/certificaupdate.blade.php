@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sertifika Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.certifica.update', $certifica->id)}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>İsim Soyisim</label>
                      <div class="input-group">
                        <input disabled type="text" class="form-control" value="{{$certifica->users->name}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kurs Adı</label>
                      <div class="input-group">
                        <input disabled type="text" class="form-control" value="{{$certifica->cources->title}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Sınav Adı</label>
                      <div class="input-group">
                        <input disabled type="text" class="form-control" value="{{$certifica->cources->exams->title}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sertificası:</label>
                      <select class="form-control" name="certifica">
                        <option {{$certifica->certifica == '0' ? 'selected' : ''}} value="0">Belgesiz</option>
                        <option {{$certifica->certifica == '1' ? 'selected' : ''}} value="1">Teşekkür Belgesi</option>
                        <option {{$certifica->certifica == '2' ? 'selected' : ''}} value="2">Takdir Belgesi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sınav Puanı</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="score" value="{{$certifica->examresults->score}}" />
                      </div>
                    </div>
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