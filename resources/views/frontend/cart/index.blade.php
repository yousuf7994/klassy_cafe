@extends('layouts.frontend')
@section('content')
  <div class="container" style="padding-top: 120px;">
    @include('alert.messsage')
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">My Cart</h1>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Food Id</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th class="text-center">Quantity</th>
                  <th>Total</th>
                  <th class="text-center">Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($carts as $cart)
                  <tr class="parent_row">
                    <td>{{ $cart->user_id }}</td>
                    <td>{{ $cart->food_id }}</td>
                    <td>{{ $cart->name }}</td>
                    <td>$
                      <span class="base_price">
                        {{ $cart->price }}
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="quantity_input">
                        <input type="hidden" class="cart_id" value="{{ $cart->id }}">
                        <button type="button" class="input_number_decrement">
                          <i class="fa-solid fa-minus"></i>
                        </button>
                        <input class="input_number" type="text" value="{{ $cart->quantity }}" style="width:20%" />
                        <button type="button" class="input_number_increment">
                          <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                    <td>
                      $
                      <span class="price_total">
                        {{ $cart->total }}
                      </span>
                    </td>
                    <td class="text-center remove" style="font-size: 25px"><a
                        href="{{ route('frontend.cart.delete', $cart->id) }}"><button><i
                            class="fa-solid fa-trash"></i></button></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="cart_btns_wrap mt-4">
          <div class="row">
            <div class="col col-lg-6">
              <form action="{{ route('backend.coupon.applyCoupon') }}" method="POST">
                @csrf
                <div class="coupon_form form_item mb-0">
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                  <input type="text" name="coupon" placeholder="Coupon Code..."
                    value="{{ Session::has('coupon') ? Session::get('coupon')['name'] : '' }}" style="width:60%">
                  <button type="submit" class="btn btn-dark">Apply Coupon</button>
                </div>
              </form>
            </div>

            <div class="col col-lg-6">
              <ul class="btns_group ul_li_right" style="float:right">
                <li><a class="btn btn-dark" href="{{ route('frontend.cart.checkout') }}">Prceed To Checkout</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col col-lg-6 mt-4">
            <div class="calculate_shipping">
              <h3 class="wrap_title">Calculate Shipping</h3>
              <form action="#">

                <select class="form-control form-select mt-2 shipping_cost">
                  <option selected disabled>Select Location</option>
                  @foreach ($shippingcharges as $shippingcharge)
                    <option value="{{ $shippingcharge->id }}">{{ $shippingcharge->location }}</option>
                  @endforeach
                </select>

              </form>
            </div>
          </div>

          <div class="col col-lg-6 mt-5">
            <div class="cart_total_table">
              <h3 class="text-center">Cart Totals</h3>
              <ul class="ul_li_block">
                <li>
                  <span>Cart Subtotal</span>
                  <span>$
                    <strong id="display_sub_total">
                      {{ $carts->sum('total') }}
                    </strong>
                  </span>
                </li>
                @if (Session::has('coupon'))
                  <li>
                    <span>Coupon({{ Session::get('coupon')['name'] }})</span>
                    <span class="coupon_charge">-${{ Session::get('coupon')['amount'] }}</span>
                  </li>
                @endif
                <li class="display_shipping_charge_list display_shipping_charge" id="shipping_charge">
                </li>
                <li>
                  <span>Order Total</span>
                  <span class="total_price">$
                    <strong class="order_total">
                      @if (Session::has('coupon'))
                        {{ $carts->sum('total') - Session::get('coupon')['amount'] }}
                      @else
                        {{ $carts->sum('total') }}
                      @endif
                    </strong>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </section>
    </div>
  </div>
  </div>
@endsection
@section('script')
  <script>
    $(function() {
      var order_total = $('.order_total');
      var input_number = $('.input_number');
      var display_sub_total = $('#display_sub_total');


      $('.input_number_increment').on('click', function() {
        var parent_row = $(this).parents('.parent_row');
        var base_price = parent_row.children('td').find('.base_price').html();
        var price_total = parent_row.children('td').find('.price_total');
        var child = $(this).parent('.quantity_input').children('.input_number');
        var inc = child.val();
        if (inc) {
          inc++;
        }
        child.val(inc);
        var cart_id = $(this).parent('.quantity_input').children('.cart_id').val();
        $.ajax({
          url: "{{ route('frontend.cart.update') }}",
          type: "POST",
          data: {
            cart_id: cart_id,
            quantity: inc,
            base_price: base_price,
            _token: '{{ csrf_token() }}',
          },
          datatype: 'json',
          success: function(data) {
            price_total.html(parseInt(base_price) * inc);
            display_sub_total.html(data);
            var display_shipping_charge = $('#shipping_charge').html();
            var shipping_charge = display_shipping_charge.replace(/\D/g, '')

            if (shipping_charge == '') {
              shipping_charge = 0
            }
            var coupon_charge = $('.coupon_charge').html();
            var coupon_charge = coupon_charge.replace(/\D/g, '')
            if (coupon_charge == '') {
              coupon_charge = 0
            }
            order_total.html(+data + +shipping_charge - +coupon_charge);
          }
        });
      });
      $('.input_number_decrement').on('click', function() {
        var parent_row = $(this).parents('.parent_row');
        var base_price = parent_row.children('td').find('.base_price').html();
        var price_total = parent_row.children('td').find('.price_total');
        var child = $(this).parent('.quantity_input').children('.input_number');
        var inc = child.val();
        if (inc > 1) {
          inc--;
        }
        child.val(inc);
        var cart_id = $(this).parent('.quantity_input').children('.cart_id').val();
        $.ajax({
          url: "{{ route('frontend.cart.update') }}",
          type: "POST",
          data: {
            cart_id: cart_id,
            quantity: inc,
            base_price: base_price,
            _token: '{{ csrf_token() }}',
          },
          datatype: 'json',
          success: function(data) {
            price_total.html(parseInt(base_price) * inc);
            display_sub_total.html(data);
            var display_shipping_charge = $('#shipping_charge').html();
            var shipping_charge = display_shipping_charge.replace(/\D/g, '')
            if (shipping_charge == '') {
              shipping_charge = 0
            }
            var coupon_charge = $('.coupon_charge').html();
            var coupon_charge = coupon_charge.replace(/\D/g, '')
            if (coupon_charge == '') {
              coupon_charge = 0
            }
            order_total.html(+data + +shipping_charge - +coupon_charge);
          }
        });
      });
      /* Shipping cost */
      $('.shipping_cost').on('change', function() {
        var display_sub_total = $('#display_sub_total');
        $.ajax({
          url: "{{ route('backend.shippingcharge.applyCharge') }}",
          type: "POST",
          data: {
            location_id: $('.shipping_cost').val(),
            _token: '{{ csrf_token() }}',
          },
          datatype: 'json',
          success: function(data) {
            if (parseInt(data.charge) === 0) {
              $('.display_shipping_charge').html(
                '<span>Shipping and Handling</span><span class="display_shipping_charge">Free</span>'
              );
            } else {
              $('.display_shipping_charge').html(
                '<span>Shipping and Handling</span><span class="display_shipping_charge">+' + parseInt(
                  data.charge) + '</span>'
              );
            }
            var coupon_charge = $('.coupon_charge').html();
            var coupon_charge = coupon_charge.replace(/\D/g, '')
            if (coupon_charge == '') {
              coupon_charge = 0
            }
            var total = parseInt(display_sub_total.html()) + parseInt(data.charge) - parseInt(coupon_charge);
            order_total.html(total);
          }
        });
      });
    })
  </script>
@endsection
