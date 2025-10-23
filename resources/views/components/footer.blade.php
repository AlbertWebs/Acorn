<footer class="tj-footer-section footer-2 h5-footer h10-footer section-gap-x">

        <div class="footer-main-area">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-5 col-lg-4 col-md-6">
                <div class="footer-widget footer-col-1">
                  <h2 class="h10-footer-title text-anim">
                    Rooted in Ubuntu
                    Growing Inclusive
                    Futures.
                  </h2>
                  <a class="text-btn wow fadeInUp" data-wow-delay=".3s" href="mailto:{{$Settings->email}}">
                    <span class="btn-text"><span>{{$Settings->email}}</span></span>
                  </a>
                  <div class="bg-shape-widget wow fadeInUpBig" data-wow-delay=".7s">
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer-widget footer-col-2 widget-nav-menu wow fadeInUp" data-wow-delay=".3s">
                  <h5 class="title">Services</h5>
                  <ul>
                    <?php
                       $Services = DB::table('services')->get();
                     ?>
                     @foreach ($Services as $service)
                         <li><a href="{{route('services-single', $service->slug)}}">{{$service->title}}</a></li>
                     @endforeach
                  </ul>
                </div>
              </div>

              <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="footer-widget widget-contact wow fadeInUp" data-wow-delay=".7s">
                  <h5 class="title">Our Office</h5>
                  <div class="footer-contact-info">
                    <div class="contact-item">
                      <span>{{$Settings->location}}</span>
                    </div>
                    <div class="contact-item">
                      <a href="tel:{{$Settings->mobile}}">P: {{$Settings->mobile}}</a>
                      <a href="mailto:{{$Settings->email}}">M: {{$Settings->email}}</a>
                    </div>
                    <div class="contact-item">
                      <span><i class="tji-clock"></i> Mon-Fri 9am-6pm</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="h10-footer-subscribe-wrapper wow fadeInUp" data-wow-delay=".5s">
          <div class="container">
            <div class="row align-items-end" style="margin:0 auto">
              <div class="col-12 col-lg-8 col-xl-7" style="margin:0 auto">
                <div class="footer-subscribe h5-footer-subscribe">
                  <h3 class="title text-anim">Subscribe to Our Newsletter.</h3>
                  <div class="subscribe-form">
                    <form id="subscribeFormse" method="post" action="{{route('subscribe')}}">
                        @csrf
                        <input type="email" name="email" placeholder="Enter email" required>
                        <label for="agree">
                            <input id="agree" type="checkbox" required>
                            Agree to our <a href="#">Terms & Condition?</a>
                        </label>
                        <button class="tj-primary-btn" type="submit">
                            <span class="btn-text"><span>Subscribe</span></span>
                            <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </button>
                    </form>
                        <div id="message" style="margin-top:10px;"></div>
                    <div id="message" style="margin-top:10px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tj-copyright-area-2 h5-footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="copyright-content-area">
                  <div class="copyright-text">
                    <p>&copy; {{date('Y')}} <a href="https://acorn.co.ke"
                        target="_blank">Acorn Special Tutorials</a>
                      All right reserved</p>
                  </div>
                  <div class="social-links style-3">
                    <ul>
                      <li><a href="{{$Settings->facebook}}" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a>
                      </li>
                      <li><a href="{{$Settings->instagram}}" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a>
                      </li>
                      <li><a href="{{$Settings->twitter}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                      <li><a href="{{$Settings->linkedin}}" target="_blank"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                      </li>
                    </ul>
                  </div>
                  <div class="copyright-menu">
                    <ul>
                      <li><a href="contact.html">Privacy Policy</a></li>
                      <li><a href="contact.html">Terms & Condition</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-shape-1">
          <img src="{{asset('acorn/assets/images/shape/pattern-2.svg')}}" alt="">
        </div>
        <div class="bg-shape-2">
          <img src="{{asset('acorn/assets/images/shape/pattern-3.svg')}}" alt="">
        </div>
        <div class="bg-shape-4 wow fadeInUpBig" data-wow-delay=".8s">
          <img src="{{asset('acorn/assets/images/shape/h10-footer-shape-blur-2.svg')}}" alt="">
        </div>
      </footer>


