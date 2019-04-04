<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          	<li class="active"><a href="{!! url('home') !!}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
	  		<?php
				$menu_level_1 = DB::table('cates') -> where('parent_id', 0) -> get();
			?>
			@foreach($menu_level_1 as $menu)
				<li><a href="{!! URL('tin-tuc', [$menu -> id, $menu -> alias]) !!}">{!! $menu -> name !!}</a></li>
			@endforeach	
        </ul>
      </div>
    </nav>
 </section>