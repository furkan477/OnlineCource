@extends('site.layout.layout')

@section('content')

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{route('home')}}">AnaSayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sepetim</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Kurs Adı</th>
                    <th class="product-name">Kurs Açıklaması</th>
                    <th class="product-name">Ders Sayısı</th>
                    <th class="product-name">Öğrenci Sayısı</th>
                    <th class="product-total">Fiyatı</th>
                    <th class="product-remove">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($carts))
                    @foreach($carts as $cart)
                      <tr>
                        <td>{{$cart->cources->title}}</td>
                        <td>{{$cart->cources->description}}</td>
                        <td>{{count($cart->cources->lessons)}}</td>
                        <td>.</td>
                        <td>{{$cart->cources->price}}</td>
                        <td>
                          <form action="{{route('enrollment.create',$cart->cources->id)}}" method="post">
                            @csrf
                            <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-amount="{{$cart->cources->price * 100}}"
                                data-name="Online Kurs Platformu"
                                data-description="{{$cart->cources->title}}"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto"
                                data-currency="try">
                            </script>
                          </form>
                          <a href="{{route('cart.delete',$cart->id)}}" class="btn btn-primary btn-sm">X</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection