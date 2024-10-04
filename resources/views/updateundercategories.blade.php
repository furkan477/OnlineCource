<option value="{{$category->id}}" {{$cat_value == $category->id ? 'selected' : ''}}>{{$prefix}} {{$category->name}}</option>

@if (!empty($category->underCategory))

    @foreach ($category->underCategory as $alt_cat)
        @include('updateundercategories',['category' => $alt_cat , 'prefix' => $prefix.'-'])
    @endforeach

@endif