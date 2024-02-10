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

              <article id='tabs-1'>
                <div class="row">
                  @foreach ($activeBreakfast as $breakfast)
                    <div class="col-lg-6">
                      <form action="{{ route('frontend.cart.store', ['category'=>'breakfast','id'=>$breakfast->id]) }}" method="POST">
                        @csrf
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
                              <div class="text-center mt-3">
                                <input type="number" class="text-center" name="quantity" min="1" value="1"
                                  style="width: 80px;font-size:20px;">
                                <input type="submit" name="" value="Add To Cart"
                                  style="width: 130px; background: #fb5849; color:white; font-size:20px; border: 1px solid #e3e6e9;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  @endforeach
                </div>
              </article>
              <article id='tabs-2'>
                <div class="row">
                  @foreach ($activeLunch as $lunch)
                    <div class="col-lg-6">
                      <form action="{{ route('frontend.cart.store', ['category'=>'lunch','id'=>$lunch->id]) }}" method="POST">
                        @csrf
                      <div class="row">
                        <div class="left-list">
                          <div class="col-lg-12">
                            <div class="tab-item">
                              <img src="storage/lunch/{{ $lunch->photo }}" alt="">
                              <h4>{{ $lunch->name }}</h4>
                              <p>{{ $lunch->description }}</p>
                              <div class="price">
                                <h6>${{ $lunch->price }}</h6>
                              </div>
                              <div class="text-center mt-3">
                                <input type="number" class="text-center" name="quantity" min="1" value="1"
                                  style="width: 80px;font-size:20px;">
                                <input type="submit" name="" value="Add To Cart"
                                  style="width: 130px; background: #fb5849; color:white; font-size:20px; border: 1px solid #e3e6e9;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  @endforeach
                </div>
              </article>
              <article id='tabs-3'>
                <div class="row">
                  @foreach ($activeDinner as $dinner)
                    <div class="col-lg-6">
                      <form action="{{ route('frontend.cart.store', ['category'=>'dinner','id'=>$dinner->id]) }}" method="POST">
                        @csrf
                      <div class="row">
                        <div class="left-list">
                          <div class="col-lg-12">
                            
                            <div class="tab-item">
                              <img src="storage/dinner/{{ $dinner->photo }}" alt="">
                              <h4>{{ $dinner->name }}</h4>
                              <p>{{ $dinner->description }}</p>
                              <div class="price">
                                <h6>${{ $dinner->price }}</h6>
                              </div>
                              <div class="text-center mt-3">
                                <input type="number" class="text-center" name="quantity" min="1" value="1"
                                  style="width: 80px;font-size:20px;">
                                <input type="submit" name="" value="Add To Cart"
                                  style="width: 130px; background: #fb5849; color:white; font-size:20px; border: 1px solid #e3e6e9;">
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  @endforeach
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
