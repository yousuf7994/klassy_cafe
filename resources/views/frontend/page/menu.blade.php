@extends('layouts.frontend')
@section('content')
  <section class="section" id="offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4 text-center">
          <div class="section-heading">
            <h6>Klassy Week</h6>
            <h2>This Week’s Special Meal Offers</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row" id="tabs">
            <div class="col-lg-12">
              <div class="heading-tabs">
                <div class="row">
                  <div class="col-lg-6 offset-lg-3">
                    <ul>
                      <li><a href='#tabs-1'><img src="frontend/assets/images/tab-icon-01.png" alt="">Breakfast</a>
                      </li>
                      <li><a href='#tabs-2'><img src="frontend/assets/images/tab-icon-02.png" alt="">Lunch</a></a>
                      </li>
                      <li><a href='#tabs-3'><img src="frontend/assets/images/tab-icon-03.png"
                            alt="">Dinner</a></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <section class='tabs-content'>
                @foreach ($activeBreakfast as $breakfast)
                  <article id='tabs-1'>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row">
                          <div class="left-list">
                            <div class="col-lg-12">
                              <div class="tab-item">
                                <img src="storage/breakfast/{{ $breakfast->photo }}" alt="">
                                <h4>{{ $breakfast->name }}</h4>
                                <p>{{ $breakfast->description }}</p>
                                <div class="price">
                                  <h6>${{ $breakfast->price }}</h6>
                                </div>
                              </div>
                            </div>
                            {{-- <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-02.png" alt="">
                              <h4>Orange Juice</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$8.50</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-03.png" alt="">
                              <h4>Fruit Salad</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$9.90</h6>
                              </div>
                            </div>
                          </div> --}}
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="row">
                          <div class="right-list">
                            <div class="col-lg-12">
                              <div class="tab-item">
                                <img src="storage/breakfast/{{ $breakfast->photo }}" alt="">
                                <h4>{{ $breakfast->name }}</h4>
                                <p>{{ $breakfast->description }}</p>
                                <div class="price">
                                  <h6>${{ $breakfast->price }}</h6>
                                </div>
                              </div>
                            </div>
                            {{-- 
                        <div class="col-lg-12">
                          <div class="tab-item">
                            <img src="frontend/assets/images/tab-item-05.png" alt="">
                            <h4>Dollma Pire</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                            <div class="price">
                              <h6>$5.00</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="tab-item">
                            <img src="frontend/assets/images/tab-item-06.png" alt="">
                            <h4>Omelette & Cheese</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                            <div class="price">
                              <h6>$4.10</h6>
                            </div>
                          </div>
                        </div> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                @endforeach
                <article id='tabs-2'>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="left-list">
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-04.png" alt="">
                              <h4>Eggs Omelette</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$14</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-05.png" alt="">
                              <h4>Dollma Pire</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$18</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-06.png" alt="">
                              <h4>Omelette & Cheese</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$22</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="right-list">
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-01.png" alt="">
                              <h4>Fresh Chicken Salad</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$10</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-02.png" alt="">
                              <h4>Orange Juice</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$20</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-03.png" alt="">
                              <h4>Fruit Salad</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$30</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
                <article id='tabs-3'>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="left-list">
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-05.png" alt="">
                              <h4>Eggs Omelette</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$14</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-03.png" alt="">
                              <h4>Orange Juice</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$18</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-02.png" alt="">
                              <h4>Fruit Salad</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$10</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="right-list">
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-06.png" alt="">
                              <h4>Fresh Chicken Salad</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$8.50</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-01.png" alt="">
                              <h4>Dollma Pire</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$9</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="frontend/assets/images/tab-item-04.png" alt="">
                              <h4>Omelette & Cheese</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                              <div class="price">
                                <h6>$11</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
            <div class="item">
              <div class='card card1'>
                <div class="price">
                  <h6>${{ $cake_pastry->price }}</h6>
                </div>
                <div class='info'>
                  <h1 class='title'>{{ $cake_pastry->name }}</h1>
                  <p class='description'>{{ $cake_pastry->description }}</p>
                  <div class="main-text-button">
                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                          class="fa fa-angle-down"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
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
@endsection
