<section class="section" id="menu">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="section-heading">
          <h6>Our Menu</h6>
          <h2>Our selection of cakes with quality taste</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="menu-item-carousel">
    <div class="col-lg-12">
      <div class="owl-menu-item owl-carousel">
        @foreach ($activeCake_pastry as $cake_pastry)
          <form action="{{ route('frontend.cart.store', ['category'=>'cake','id'=>$cake_pastry->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="item">
              <div class='card' style="background-image: url({{ url('storage/cake_pastry/' . $cake_pastry->photo) }});">
                <div class="price">
                  <h6>${{ $cake_pastry->price }}</h6>
                </div>
                <div class='info'>
                  <h1 class='title'>{{ $cake_pastry->name }}</h1>
                  <p class='description'>{{ $cake_pastry->description }}</p>
                </div>
              </div>
              <div class="text-center mt-3">
                <input type="number" class="text-center" name="quantity" min="1" value="1" style="width: 80px;font-size:20px;">
                <input type="submit" name="" value="Add To Cart" style="width: 130px; background: #fb5849; color:white; font-size:20px; border: 1px solid #e3e6e9;">
              </div>

              {{-- <button type="submit" name="submit" class="text-center mt-2" style="background: #fb5849; color:white; font-size:20px">Add to Cart</button> --}}
            </div>
          </form>
        @endforeach
        {{-- <div class="item">
                        <div class='card card2'>
                            <div class="price"><h6>$22</h6></div>
                            <div class='info'>
                              <h1 class='title'>Klassy Pancake</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                            <div class="price"><h6>$18</h6></div>
                            <div class='info'>
                              <h1 class='title'>Tall Klassy Bread</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card4'>
                            <div class="price"><h6>$10</h6></div>
                            <div class='info'>
                              <h1 class='title'>Blueberry CheeseCake</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card5'>
                            <div class="price"><h6>$8.50</h6></div>
                            <div class='info'>
                              <h1 class='title'>Klassy Cup Cake</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                            <div class="price"><h6>$7.25</h6></div>
                            <div class='info'>
                              <h1 class='title'>Klassic Cake</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div> --}}
      </div>
    </div>

  </div>
</section>
