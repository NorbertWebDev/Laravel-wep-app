@include('header')

<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
        </div>

        <form action="{{ url('/api/BookingCreate') }}" method="post" role="form" class="php-email-form"
              data-aos="fade-up" data-aos-delay="100">
            <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="FullName" class="form-control" id="name" placeholder="Your Name"
                           data-rule="minlen:8" data-maxlength="200" data-msg="Please enter at least 8 chars" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="email" class="form-control" name="Email" id="email" placeholder="Your Email"
                           data-rule="email" data-maxlength="400" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" class="form-control" name="PhoneOrMobile" id="phone"
                           placeholder="Your Phone" data-rule="minlen:12" data-maxlength="13" data-msg="Please enter at least 12 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="Date" class="form-control" id="date" placeholder="Date"
                           data-rule="minlen:8" data-maxlength="8" data-msg="Please enter at least 8 chars" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="time" name="Time" class="form-control" id="time" placeholder="Time"
                           data-rule="minlen:6" data-maxlength="8" data-msg="Please enter the time" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="number" class="form-control" name="Persons" id="people" placeholder="# of people"
                           data-rule="minlen:1" data-maxlength="255" data-msg="Please enter at least 1 chars" required>
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="Message" rows="5" placeholder="Message" data-maxlength="65535"></textarea>
                <div class="validate"></div>
            </div>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message"></div>
            </div>
            <div class="text-center"><button type="submit">Book a Table</button></div>
        </form>

    </div>
</section><!-- End Book A Table Section -->

@include('footer')
