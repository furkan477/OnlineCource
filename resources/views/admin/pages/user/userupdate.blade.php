@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$user->name}} Profili Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.user.update',$user->id)}}" method="post">
                @csrf
                <div class="form-group">
                  <label>İsim Soyisim</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                  </div>
                </div>
                <div class="form-group">
                  <label>Rolü:</label>
                  <select class="form-control" name="role">
                    <option {{$user->role == 'tch' ? 'selected' : ''}} value="tch">Öğretmen</option>
                    <option {{$user->role == 'stu' ? 'selected' : ''}} value="stu">Öğrenci</option>
                    <option {{$user->role == 'adm' ? 'selected' : ''}} value="adm">Admin</option>
                  </select>
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