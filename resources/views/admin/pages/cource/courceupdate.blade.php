@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$cource->title}} Kursu Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.cource.update', $cource->id)}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>İsim Soyisim</label>
                      <div class="input-group">
                        <input disabled type="text" class="form-control" value="{{$cource->user->name}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <input disabled type="text" class="form-control" value="{{$cource->user->email}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Kategorisi:</label>
                      <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
              @include('updateundercategories', ['category' => $category, 'cat_value' => $cource->category->id, 'prefix' => ' '])
            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Durumu:</label>
                      <select class="form-control" name="status">
                        <option {{$cource->status == '0' ? 'selected' : ''}} value="0">Yayında</option>
                        <option {{$cource->status == '1' ? 'selected' : ''}} value="1">Beklemede</option>
                        <option {{$cource->status == '2' ? 'selected' : ''}} value="2">İncelemede</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Fiyatı</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="price" value="{{$cource->price}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kurs Başlığı</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="title" value="{{$cource->title}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kurs Açıklaması</label>
                      <div class="input-group">
                        <textarea type="text" class="form-control" name="description" >{{$cource->description}}</textarea>
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