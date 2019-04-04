@extends('user.master')
@section('content')
@include('user.blocks.ticker')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{!! url('/') !!}">Home</a></li>
              <li><a href="#">{!! $loai_tin -> alias !!}</a></li>
              <li class="active">{!! $tin_detail -> alias !!}</li>
            </ol>
            <?php
            	$user = DB::table('users') -> where('id', $tin_detail -> user_id) -> first();
            ?>
            <h2 class="text-center">{!! $tin_detail -> name !!}</h2>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{!! $user -> username !!}</a><span><i class="fa fa-calendar"></i>{!! $tin_detail -> created_at !!}</span> <a href="#"><i class="fa fa-tags"></i>{!! $loai_tin -> name !!}</a> </div>
            <div class="single_page_content"> <img class="img-center" src="{!! asset('resources/upload/'.$tin_detail -> image) !!}" alt="">
              	{!! $tin_detail -> content !!}
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
              	<div class="addthis_inline_share_toolbox"></div>
              </ul>
            </div>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#{!! $tin_detail -> alias !!}" data-numposts="10"></div>
            <div class="related_post">
              <h2>Tin liên quan<i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
              	@foreach($tin_lien_quan as $tin)
	              	<li>
	                  <div class="media"> <a class="media-left" href="{!! URL('chi-tiet', [$loai_tin -> alias, $tin -> id, $tin -> alias]) !!}"> <img src="{!! asset('resources/upload/'.$tin -> image) !!}" alt=""> </a>
	                    <div class="media-body"> <a class="catg_title" href="">{!! $tin -> name !!}</a> </div>
	                  </div>
	                </li>
	            @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Bài viêt phổ biến</span></h2>
            <ul class="spost_nav">
            	@foreach($bai_viet_pho_bien as $popular_post)
	              <li>
	                <div class="media wow fadeInDown"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $popular_post -> id, $popular_post -> alias]) !!}" class="media-left"> <img alt="" src="{!! asset('resources/upload/'.$popular_post -> image) !!}"> </a>
	                  <div class="media-body"> <a href="{!! URL('chi-tiet', [$loai_tin -> alias, $popular_post -> id, $popular_post -> alias]) !!}" class="catg_title">{!! $popular_post -> name !!}</a> </div>
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