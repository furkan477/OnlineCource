@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Yeni Kategori Ekleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.category.create')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Adı</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="name"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Türü :</label>
                      <select class="form-control" name="cat_ust">
                        <option value="0">Ana Kategori</option>
                        @foreach ($categories as $category)
                          @include('undercategories', ['category' => $category , 'prefix' => ''])
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kategori Açıklaması</label>
                  <div class="input-group">
                    <textarea type="text" class="form-control" name="description"></textarea>
                  </div>
                </div>
                <div class="form-group mt-5">
                  <button type="submit" class="form-control bg-primary">Kategori Ekle</button>
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