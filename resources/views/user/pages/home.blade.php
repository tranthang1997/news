@extends('user.master')
@section('content')
<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Tin mới</span>
          <ul id="ticker01" class="news_sticker">
          	<?php
				$cate = DB::table('cates') -> select('name', 'alias') -> where('id', $tin_moi[0] -> cate_id) -> first();
			?>
          	@foreach($tin_moi as $moi)
	            <li><a href="{!! URL('chi-tiet', [$cate -> alias, $moi -> id, $moi -> alias]) !!}"><img src="{!! asset('resources/upload/'.$moi -> image) !!}" alt="">{!! $moi -> name !!}</a></li>
            @endforeach
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        	@foreach($tin_moi as $moi)
	          	<div class="single_iteam"> <a href="{!! URL('chi-tiet', [$cate -> alias, $moi -> id, $moi -> alias]) !!}"> <img src="{!! asset('resources/upload/'.$moi -> image) !!}" alt=""></a>
	            	<div class="slider_article">
		              		<h2><a class="slider_tittle" href="{!! URL('chi-tiet', [$cate -> alias, $moi -> id, $moi -> alias]) !!}">{!! $moi -> name !!}</a></h2>
		              		<p>{!! $moi -> intro !!}...</p>
	            	</div>
	          	</div>
          	@endforeach
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>BÀI VIẾT MỚI</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            	@foreach($bai_viet_moi as $new_post)
	              	<li>
	                	<div class="media"> <a href="{!! URL('chi-tiet', [$cate -> alias, $new_post -> id, $new_post -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$new_post -> image) !!}"> </a>
	                  		<div class="media-body"> <a href="{!! URL('chi-tiet', [$cate -> alias, $new_post -> id, $new_post -> alias]) !!}" class="catg_title">{!! $new_post -> name !!}</a> </div>
	                	</div>
	              	</li>
	            @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Xã Hội</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="{!! URL('chi-tiet', [$cate -> alias, $xa_hoi[0] -> id, $xa_hoi[0] -> alias]) !!}" class="featured_img"> <img alt="" src="{!! asset('resources/upload/'.$xa_hoi[0] -> image) !!}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{!! URL('chi-tiet', [$cate -> alias, $xa_hoi[0] -> id, $xa_hoi[0] -> alias]) !!}">{!! $xa_hoi[0] -> name !!}</a> </figcaption>
                    <p>{!! $xa_hoi[0] -> intro !!}...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @for($i = 1; $i < count($xa_hoi); $i++)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$cate -> alias, $xa_hoi[$i] -> id, $xa_hoi[$i] -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$xa_hoi[$i] -> image) !!}"> </a>
                      <div class="media-body"> <a href="{!! URL('chi-tiet', [$cate -> alias, $xa_hoi[$i] -> id, $xa_hoi[$i] -> alias]) !!}" class="catg_title">{!! $xa_hoi[$i] -> name !!}</a> </div>
                    </div>
                  </li>
                @endfor
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Thế giới</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="{!! URL('chi-tiet', [$cate -> alias, $the_gioi[0] -> id, $the_gioi[0] -> alias]) !!}" class="featured_img"> <img alt="" src="{!! asset('resources/upload/'.$the_gioi[0] -> image) !!}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{!! URL('chi-tiet', [$cate -> alias, $the_gioi[0] -> id, $the_gioi[0] -> alias]) !!}">{!! $the_gioi[0] -> name !!}</a> </figcaption>
                      <p>{!! $the_gioi[0] -> intro !!}...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @for($i = 1; $i < count($the_gioi); $i++)
                    <li>
                      <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$cate -> alias, $the_gioi[$i] -> id, $the_gioi[$i] -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$the_gioi[$i] -> image) !!}"> </a>
                        <div class="media-body"> <a href="{!! URL('chi-tiet', [$cate -> alias, $the_gioi[$i] -> id, $the_gioi[$i] -> alias]) !!}" class="catg_title">{!! $the_gioi[$i] -> name !!}</a> </div>
                      </div>
                    </li>
                  @endfor
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Công nghệ</span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{!! URL('chi-tiet', [$cate -> alias, $cong_nghe[0] -> id, $cong_nghe[0] -> alias]) !!}" class="featured_img"> <img alt="" src="{!! asset('resources/upload/'.$cong_nghe[0] -> image) !!}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{!! URL('chi-tiet', [$cate -> alias, $cong_nghe[0] -> id, $cong_nghe[0] -> alias]) !!}">{!! $cong_nghe[0] -> name !!}</a> </figcaption>
                      <p>{!! $cong_nghe[0] -> intro !!}...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @for($i = 1; $i < count($cong_nghe); $i++)
                    <li>
                      <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$cate -> alias, $cong_nghe[$i] -> id, $cong_nghe[$i] -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$cong_nghe[$i] -> image) !!}"> </a>
                        <div class="media-body"> <a href="{!! URL('chi-tiet', [$cate -> alias, $cong_nghe[$i] -> id, $cong_nghe[$i] -> alias]) !!}" class="catg_title">{!! $cong_nghe[$i] -> name !!}</a> </div>
                      </div>
                    </li>
                  @endfor
                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="{!! URL('chi-tiet', [$cate -> alias, $game[0] -> id, $game[0] -> alias]) !!}"> <img src="{!! asset('resources/upload/'.$game[0] -> image) !!}" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="{!! URL('chi-tiet', [$cate -> alias, $cong_nghe[0] -> id, $game[0] -> alias]) !!}">{!! $game[0] -> name !!}</a> </figcaption>
                    <p>{!! $game[0] -> intro !!}...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @for($i = 1; $i < count($game); $i++)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$cate -> alias, $game[$i] -> id, $game[$i] -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$game[$i] -> image) !!}"> </a>
                      <div class="media-body"> <a href="{!! URL('chi-tiet', [$cate -> alias, $game[$i] -> id, $game[$i] -> alias]) !!}" class="catg_title">{!! $game[$i] -> name !!}</a> </div>
                    </div>
                  </li>
                @endfor
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Tin phổ biến</span></h2>
            <ul class="spost_nav">
            	@foreach($bai_viet_pho_bien as $popular_post)
	              	<li>
	                	<div class="media wow fadeInDown"> <a href="{!! URL('loaitin', [$product_feature -> id, $product_feature -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$popular_post -> image) !!}"> </a>
	                  		<div class="media-body"> <a href="pages/single_page.html" class="catg_title">{!! $popular_post -> name !!}</a> </div>
	                	</div>
	              	</li>
	             @endforeach
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Tin tức</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Bình luận</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <?php
                  $menu_level_1 = DB::table('cates') -> where('parent_id', 0) -> get();
                ?>
                <ul>
                  @foreach($menu_level_1 as $menu)
                    <li class="cat-item"><a href="{!! URL('tin-tuc', [$menu -> id, $menu -> alias]) !!}">{!! $menu -> name !!}</a></li>
                  @endforeach
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
</section>
@endsection