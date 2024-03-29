@extends('layouts.app')
@section('content')

 <!--================Contact Area =================-->
 <section class="contact_area section_gap">
    <div class="container">

      <div class="row">
        <div class="col-lg-3">
          <div class="contact_info">
            <div class="info_item">
              <i class="ti-home"></i>
              <h6>Kigali, Rwanda</h6>
              <p>Gikondo (GBC House)</p>
            </div>
            <div class="info_item">
              <i class="ti-headphone"></i>
              <h6><a href="#">+250788522501</a></h6>
              <p>Mon to Fri 8am to 6 pm</p>
            </div>
            <div class="info_item">
              <i class="ti-email"></i>
              <h6><a href="#">yanjye.com@gmail.com</a></h6>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <form
            class="row contact_form"
            action="contact_process.php"
            method="post"
            id="contactForm"
            novalidate="novalidate"
          >
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"onfocus="this.placeholder = ''" required="" />
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email"name="email" placeholder="Enter email address"onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"required=""/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required=""/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="message" id="message" rows="1"placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <button type="submit" value="submit" class="btn primary-btn">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--================Contact Area =================-->


@endsection
