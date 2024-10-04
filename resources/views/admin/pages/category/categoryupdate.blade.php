@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12 mt-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$categoryy->name}} Kategori Güncelleme</h3>
            </div>
            <div class="card-body">
              <form action="{{route('admin.category.update', $categoryy->id)}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Adı</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="name" value="{{$categoryy->name}}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Türü :</label>
                      <select class="form-control" name="cat_ust">
                        @foreach ($categories as $category)
                          @include('updateundercategories', ['category' => $category , 'cat_value' => $categoryy->id , 'prefix' => ''])
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kategori Açıklaması</label>
                  <div class="input-group">
                    <textarea type="text" class="form-control" name="description">{{$categoryy->description}}</textarea>
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