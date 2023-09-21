@extends('frontend.layouts.master')
@section('content')

<!-- banner section=================== -->
<section class="banner_section">
    <img src="{{{asset('frontend/image/baner4_1_728x410.jpg')}}}" style="height: 300px;" width="100%"    alt="">
    
</section>
<!--Contact us Section====================== -->
<section class="about_us">
  <div class="container">
    <div class="row">
      <div class="col-md-7">

        <h3 style="padding-top: 15px;
        padding-bottom: 5px;
        border-bottom: 1px solid black;
        width: 39%;">Send us a message</h3>
        
        <form action="">

          <div class="form-row row" style="background: #ddd; padding-bottom: 15px;">
            <div class="form-group col-md-6">
              <label for="Name">Name <span style="color:red; font-weight: bold;">*</span></label>
              <input type="text" name="name" id="name" class="form-control"
              placeholder="write your name">
            </div>

            <div class="form-group col-md-6">
              <label for="Email">Email <span style="color:red; font-weight: bold;">*</span></label>
              <input type="email" name="email" id="email" class="form-control"
              placeholder="write your email">
            </div>

            <div class="form-group col-md-6">
              <label for="Phone">Phone <span style="color:red; font-weight: bold;">*</span></label>
              <input type="text" name="phone" id="phone" class="form-control"
              placeholder="write your phone number">
            </div>

            <div class="form-group col-md-6">
              <label for="Address">Address <span style="color:red; font-weight: bold;">*</span></label>
              <input type="text" name="address" id="address" class="form-control"
              placeholder="write your address">
            </div>

            <div class="form-group col-md-12">
              <label for="Messsage">Messsage <span style="color:red; font-weight: bold;">*</span></label><br>
              <textarea name="message" id="message" placeholder="Write Your message" rows="5"></textarea>
            </div>
            <div style="padding-bottom: 5px;" class="form-group col-md-6">
             <button  type="submit" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </form>
       
        
      </div>
      <div class="col-md-5">

        <h3 style="padding-top: 15px;
        padding-bottom: 5px;
        border-bottom: 1px solid black;
        width: 45%;">Office Location</h3>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3626.4525207287356!2d89.64164107443807!3d24.642547553944436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdbc3fff403331%3A0x405964249d48fcfc!2sAlampur%20Bazar%20Chowrasta!5e0!3m2!1sen!2sbd!4v1692721314515!5m2!1sen!2sbd" width="100%" height="336" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
      </div>
    </div>
  </div>
</section>

@endsection