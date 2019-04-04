<section id="newsSection">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="latest_newsarea"> <span>Tin mới</span>
        <ul id="ticker01" class="news_sticker">
        	<?php
            $tin_moi = DB::table('products') -> select('id', 'name', 'alias', 'cate_id', 'image') -> where('price', 1) -> orderBy('id', 'DESC') -> get();
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