@extends('user.master')
@section('content')
@include('user.blocks.ticker')
<section id="contentSection">
	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 ">
			<div class="left_content">
          		<div class="single_post_content">
          			<h2><span>{!! $loai_tin -> name !!}</span></h2>
	          		@foreach($tin as $tin)
	            		<div class="col-md-6 left">
		        			<ul class="business_catgnav wow fadeInDown">
			                  <li>
			                    <figure class="bsbig_fig"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $tin -> id, $tin -> alias]) !!}" class="featured_img"> <img alt="" src="{!! asset('resources/upload/'.$tin -> image) !!}" height="200px"> <span class="overlay"></span> </a>
			                      <figcaption class="text-center"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $tin -> id, $tin -> alias]) !!}">{!! $tin -> name !!}</a> </figcaption>
			                      <p>{!! $tin -> intro !!}...</p>
			                    </figure>
			                  </li>
			                </ul>
			                <hr>
	        			</div>
	        		@endforeach
          		</div>
			</div>
		</div>
		<div class = "col-lg-4 col-md-4 col-sm-4">
			<aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Bài viêt phổ biến</span></h2>
            <ul class="spost_nav">
            	@foreach($tin_pho_bien as $tin)
	              <li>
	                <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $tin -> id, $tin -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$tin -> image) !!}"> </a>
	                  <div class="media-body"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $tin -> id, $tin -> alias]) !!}" class="catg_title"> {!! $tin -> name !!}</a> </div>
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