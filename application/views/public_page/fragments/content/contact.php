	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li class="active">Contact</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
		<section id="content">
		<div class="map">
			<iframe style="height:500px;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=CYA+Building,+Kennon+Road,+Baguio,+Cordillera+Administrative+Region,+Philippines&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4>Get in touch with us by filling <strong>contact form below</strong></h4>
					<form id="contactform" action="contact/contact.php" method="post" class="validateform" name="send-contact">
						<div id="sendmessage">
							 Your message has been sent. Thank you!
						</div>
						<div class="row">
							<div class="col-lg-4 field">
								<input type="text" name="name" placeholder="* Enter your full name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation">
								</div>
							</div>
							<div class="col-lg-4 field">
								<input type="text" name="email" placeholder="* Enter your email address" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation">
								</div>
							</div>
							<div class="col-lg-4 field">
								<input type="text" name="subject" placeholder="Enter your subject" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation">
								</div>
							</div>
							<div class="col-lg-12 margintop10 field">
								<textarea rows="12" name="message" class="input-block-level" placeholder="* Your message here..." data-rule="required" data-msg="Please write something"></textarea>
								<div class="validation">
								</div>
								<p>
									<button class="btn btn-theme margintop10 pull-left" type="submit" disabled>Submit message</button>
									<span class="pull-right margintop20" style="color:red;">* Please fill all required form field, thanks!</span>
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>