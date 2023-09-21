

@extends('frontend.layouts.master')

@section('content')

@include('frontend.layouts.slider')
<!-- Mission and vision section++++++++++++++++ 0-->

<section class="mission_vision">
  <div class="container">
    <div class="row direction">
      <div class="col-md-6">
        <h3 class="h3style">Mission and Vision</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <img class="imgstyle" src="{{asset('frontend/image/images (3).jpg')}}"  alt="" style="
        height: 270px; width:270px
    ">
        <p><strong>Mission</strong>Seufzer wo nun dahinten nicht muß stürmten wort deinen ich mit. Ort an du bist perlet warum, gartens die du komm sonder der im heut mit und. Gehofft geliebet bäume da ich du gut geträumt fort schnelle, träume du der wo du gut. Und es liebe ist der der laue darfst, blieb du doch schaust schönen geschaut schaust mit hab. Schaust brust mir's ja still ort gartens oft wiedersehn, perlet wilde wärest doch denkst grambefangen nicht du, nun und es du schaust hab beiden hab verschwiegen gut. O niedlich gut ja warum. Mit mit nicht ich treibt zuletzt denkst mit ankleiden, gestehe mit von der du schon o ihr. Weiter rast die geschaut fort, hast klingt in jedoch komm dann o, schwester stillestehn an gerne stund', der dich und schnee lieb im die freunde gefärbt sonder, nicht ein wie muß es ort weiter schmilzt ward wo. Du du ein gehofft sehr ihr, gesellschaft im grambefangen von in ward die, großer du ort zurück gesellschaft ruft, verschwand schnelle im darfst immer feuchten schnee winde, du du wort kleinem du sollst du hab. So jedoch ferne so deine die großer im ort deine, dich geträumt fort verwundert bist niedlich. Ein du niedlich.</p>
      </div>
      <div class="col-md-6">
        <img class="imgstyle" src="{{asset('frontend/image/images.jpg')}}" alt="" style="
        height: 270px; width:270px
    ">
        <p><strong>Vision</strong>Nor say land it he in in degree. Knew he aught eros near apart revel nor shrine. Ancient had name where scene. Harold deemed despair not fabled the. This with a in harolds her ive power superstition deemed, yea her or neer a by he, since not joyless any by vaunted saw say. Once with drop where heal yes, on beyond a save mirthful, of native his condole childe though one. Uncouth of felt the from glorious or gathered wrong, prose a seek lay coffined they of did power. Present and day for and. Whence cell scorching mammon thou had rill in prose deemed. Despair mote in sighed high, dear relief a longdeserted bacchanals had was since done florid, bidding despair the sighed revellers to. Labyrinth and virtues beyond so the lineage. What loved rhyme on him, were shun where childe plain earth cell long sad peace, ever childe these their he upon sooth land did his, but hellas the and mood low mote gathered soul. His to he parting the. Was though he heart beyond. Wassailers albions are me ever heralds, him dear was of not he me ever. And did seemed where to soils or bidding. Breast consecrate.</p>
      </div>
    </div>
  </div>
</section>


<!-- New and Events================- -->
<section class="news_events" style="
background: #ddd;
">
  <div class="container">
    <div class="row">
      <div class="col-md-3" style="padding-top: 6px;">
        <h3 style="border-bottom: 1px solid #000; width: 83%;" >News and Events</h3>
      </div>
      <div class="col-md-9" style="padding-top: 6px;">

        <table class="table table-striped table-responsive table-bordered table-hover table-success" style="padding-top: 6px;">

          <thead class="thead-dark">
            <tr>
              <th>SL</th>
              <th>Date</th>
              <th>Image</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>1</td>
              <td>1/2/23</td>

              <td><img src="{{asset('frontend/image/images (5).jpg')}}" alt=""></td>
              <td>This is an Important class the thjasdf afdadfa asdadfa adfa dfa 
                adfare asdfadf fadjahoidsfh daihyhaiserhgf  dashfaiuerahg asdfhaf
              </td>
              <td><a href="" class="btn btn-info">Detail</a></td>

            </tr>

            <tr>
              <td>2</td>
              <td>1/2/23</td>

              <td><img src="{{asset('frontend/image/news2.jpg')}}" alt=""></td>
              <td>This is an Important class the thjasdf afdadfa asdadfa adfa dfa 
                adfare asdfadf fadjahoidsfh daihyhaiserhgf  dashfaiuerahg asdfhaf
              </td>
              <td><a href="" class="btn btn-info">Detail</a></td>

            </tr>

            <tr>
              <td>2</td>
              <td>1/2/23</td>

              <td><img src="{{asset('frontend/image/news3.jpg')}}" alt=""></td>
              <td>This is an Important class the thjasdf afdadfa asdadfa adfa dfa 
                adfare asdfadf fadjahoidsfh daihyhaiserhgf  dashfaiuerahg asdfhaf
              </td>
              <td><a href="" class="btn btn-info">Detail</a></td>

            </tr>
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Nav Tab================== -->
<section class="our_services">

  <div class="container " style="padding-top:15px;">

    

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#services" data-bs-toggle="tab">Oure Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#expertise" data-bs-toggle="tab">Our Expertise</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#product" data-bs-toggle="tab">Our Products</a>
      </li>
      
    </ul>
    <!-- Tab content -->
    <div class="tab-content">

      <div id="services" class="container tab-pane active">
        <h3>Our Services</h3>
        <p>Et aliquyam voluptua elitr aliquyam labore amet at. Kasd sadipscing no ipsum consetetur amet. Et diam labore accusam aliquyam eirmod ipsum consetetur amet, ea ut nonumy elitr duo ea elitr lorem. Lorem lorem sadipscing kasd.</p>
      </div>

      <div id="expertise" class="container tab-pane fade">
        <h3>Our Expertise</h3>
        <p>Ab aliquyam voluptua elitr aliquyam labore amet at. Kasd sadipscing no ipsum consetetur amet. Et diam labore accusam aliquyam eirmod ipsum consetetur amet, ea ut nonumy elitr duo ea elitr lorem. Lorem lorem sadipscing kasd.</p>
      </div>

      <div id="product" class="container tab-pane fade">
        <h3>Our Products</h3>
        <p>Gh aliquyam voluptua elitr aliquyam labore amet at. Kasd sadipscing no ipsum consetetur amet. Et diam labore accusam aliquyam eirmod ipsum consetetur amet, ea ut nonumy elitr duo ea elitr lorem. Lorem lorem sadipscing kasd.</p>
      </div>
    </div>
  </div>
</section>

@endsection
