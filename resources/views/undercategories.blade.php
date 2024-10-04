<option value="{{$category->id}}">{{$prefix}} {{$category->name}}</option>

@if (!empty($category->underCategory))

    @foreach ($category->underCategory as $alt_cat)
        @include('undercategories',['category' => $alt_cat , 'prefix' => $prefix.'-'])
    @endforeach

@endif