@extends('user.master')
@section('content')
	<section class="main-content" id="contentSection">	
		<h4><span class="text-center">Contact Us</span></h4>			
		<div class="row">				
			<div class="span5">
				<div>
					<h5>ADDITIONAL INFORMATION</h5>
					<p><strong>Phone:</strong>&nbsp;(123) 456-7890<br>
					<strong>Fax:</strong>&nbsp;+04 (123) 456-7890<br>
					<strong>Email:</strong>&nbsp;<a href="#">thangtr97@gamil.com</a>								
					</p>
					<br/>
					<h5>SECONDARY OFFICE IN VIETNAM</h5>
					<p><strong>Phone:</strong>&nbsp;(113) 023-1125<br>
					<strong>Fax:</strong>&nbsp;+04 (113) 023-1145<br>
					<strong>Email:</strong>&nbsp;<a href="#">thangtr97@gamil.com</a>					
					</p>
				</div>
			</div>
			<div class="span7">
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				<form method="post" action="{!! url('contact') !!}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<fieldset class="contact_area">
						<div class="clearfix">
							<label for="name"><span>Name:</span></label>
							<div class="input">
								<input tabindex="1" size="18" id="name" name="name" type="text" value="{!! old('name') !!}" class="input-xlarge form-control" placeholder="Name">
								@if($errors -> first('name') != null)
			                        <div class="alert alert-danger">
			                            {!! $errors -> first('name') !!}
			                        </div>
                                @endif
							</div>
						</div>
						
						<div class="clearfix">
							<label for="email"><span>Email:</span></label>
							<div class="input">
								<input tabindex="2" size="25" id="email" name="email" type="text" value="{!! old('email') !!}" class="input-xlarge form-control" placeholder="Email Address">
								@if($errors -> first('email') != null)
			                        <div class="alert alert-danger">
			                            {!! $errors -> first('email') !!}
			                        </div>
                                @endif
							</div>
						</div>
						
						<div class="clearfix">
							<label for="message"><span>Message:</span></label>
							<div class="input">
								<textarea tabindex="3" class="input-xlarge form-control" id="message" name="message" rows="7" placeholder="Message" >{!! old('message') !!} </textarea>
							</div>
							@if($errors -> first('message') != null)
		                        <div class="alert alert-danger">
		                            {!! $errors -> first('message') !!}
		                        </div>
                             @endif
						</div>
						
						<div class="actions">
							<button tabindex="3" type="submit" class="btn btn-inverse">Send message</button>
							<button class="btn" type="reset" value="">Reset</button>
						</div>
					</fieldset>
				</form>
			</div>				
		</div>
</section>
@endsection