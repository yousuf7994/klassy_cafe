<div class="col-lg-6">
          <div class="contact-form">
            <form action="{{ route('backend.reservation.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <h4>Table Reservation</h4>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" placeholder="Your Name*" >
                  </fieldset>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                    <input name="email" type="email"
                      placeholder="Your Email Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                    <input name="phone" type="number" placeholder="Phone Number*" required="">
                  </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="guest" type="number" placeholder="Number of Guest*" required="">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <fieldset>
                      <input name="date" type="date" class="form-control">
                    </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <select name="time" class="form-select">
                      <option selected disabled>Select Time</option>
                      <option>Breakfast</option>
                      <option>Lunch</option>
                      <option>Dinner</option>
                    </select>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" placeholder="Message" ></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" name="submit" class="main-button-icon">Make A Reservation</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>