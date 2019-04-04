<header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 navbar navbar-fixed-top navbar-inverse navbar-static-top">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{!! url('/') !!}">Trang chủ</a></li>
              <li><a href="#">Thông tin</a></li>
              <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = new DateTime();
              ?>
              <li><a href="{!! url('contact') !!}">Liên hệ</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p>{!! $date -> format('Y-m-d H:i:s') !!}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>