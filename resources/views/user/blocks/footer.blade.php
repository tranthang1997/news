<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <?php
                  $menu_level_1 = DB::table('cates') -> where('parent_id', 0) -> get();
                ?>
                <ul class="tag_nav">
                  @foreach($menu_level_1 as $menu)
                    <li class=""><a href="{!! URL('tin-tuc', [$menu -> id, $menu -> alias]) !!}">{!! $menu -> name !!}</a></li>
                  @endforeach
                </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Liên hệ</h2>
            <p>Hãy đóng góp ý kiến cho chúng tôi</p>
            <address>
            Hai Duong, Viet Nam; Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2020 <a href="{!! url('/') !!}">TinViet</a></p>
      <p class="developer">TinViet</p>
    </div>
</footer>