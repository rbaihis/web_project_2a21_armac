<?php
// add this to every page you create
// -------------------------------------
session_start();
 require "header.php";

 if( isset($_SESSION['account']) ) 
{
	require "navloggedin.php"; 
} else{
	require "nav.php"; 
}
// copy the last line as well " require "footer.php"; (e5er star )
// -------------------------------------
?>





<div class="container">
	<section class="background">
		<div class="content-wrapper">
			<div class="intro">
				<h1><span class="smaller wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5">104 nasr, Tunis, Tunisia</span>
				<span class="big wow pulse" data-wow-duration="1s" data-wow-delay="0s">Bioté</span><br/>
				<span class="small wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s">- Centre de beauté -</span>
			</h1>
		</div>
	</div>
</section>
<section class="background">
	<div class="content-wrapper">
		<div class="about">
			<div class="aboutbadge">
				<span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><br/>
				<span class="border">salon numéro 1</span><br/>
				dans toute la tunisie</span>
			</div>
			<div class="aboutbadge black">
				<span>Bioté, ici vous trouvez tout ce qui concerne votre beauté fatale. </span>
			</div>
		</div>
	</div>
</section>
<section class="background">
	<div class="content-wrapper">
		<div class="voucher">
			<div class="voucher-whitetransparent">
				<h2><i class="fa fa-gift"></i><br/>REDEEM YOUR VOUCHER<br/>20% OFF IN 2016<br/><a href="#slide6">Book Now</a></h2>
			</div>
		</div>
	</div>
</section>
<section class="background">
	<div class="content-wrapper">
		<div class="pricingbadge">
			<h4>High Quality, Low Prices</h4>
			<ul class="pricing_menu__list">
				<li class="pricing_menu__row">
					<div class="pricing_menu__meal">
						<span>Haircut & Blowdry</span>
					</div>
					<span class="pricing_menu__price">$32.00</span>
				</li>
				<li class="pricing_menu__row">
					<div class="pricing_menu__meal">
						<span>Express Cut</span>
					</div>
					<span class="pricing_menu__price">$22.00</span>
				</li>
				<li class="pricing_menu__row">
					<div class="pricing_menu__meal">
						<span>Shampoo & Set</span>
					</div>
				<span class="pricing_menu__price">$19.00</span>
			</li>
			<li class="pricing_menu__row">
				<div class="pricing_menu__meal">
					<span>Bleach & Tone</span>
				</div>
				<span class="pricing_menu__price">$90.00</span>
			</li>
			<li class="pricing_menu__row">
				<div class="pricing_menu__meal">
					<span>Foil with Haircut</span>
				</div>
				<span class="pricing_menu__price">$43.00</span>
			</li>
			<a class="fullpricelist" href="#"><i class="fa fa-file-pdf-o"></i> View our full pricing list</a>
		</ul>
	</div>
</div>
</section>
<section class="background">
	<div class="content-wrapper">
		<div class="testimonialarea">
			<div class="testimonialarea-bubble">
				<div class="testimonial-widget">
					<h3 class="uppercase">BEAUTTIO MADE ME BEAUTIFUL</h3>
					<div class="testimonial">
						<p>
							"They took care of my wedding, everyone asked me who was my stylist. Great prices, great staff!"
						</p>
						<p>
							<strong>Cindy, New York</strong>
						</p>
					</div>
					<div class="testimonial">
						<p>
							"I am a regular customer of their services, once I pay them a visit I am a different person."
						</p>
						<p>
							<strong>Layana, Munchen</strong>
						</p>
					</div>
					<div class="testimonial">
						<p>
							"Thank you so much, Beauttio, you have one of the best hairstylists aroung, I give it 5 <i class="fa fa-star"></i>."
						</p>
						<p>
							<strong>Jane, London</strong>
						</p>
					</div>
					<button class="prev-testimonial">Prev</button>
					<button class="next-testimonial">Next</button>
				</div>
			</div>
			<div class="contactform-bubble">
				<form autocomplete="off" class="contactform" method="post" action="contact.php" id="contactform">
					<input name="name" type="text" placeholder="Name">
					<input name="email" type="text" placeholder="E-mail">
					<textarea name="comment" placeholder="Message" rows="4"></textarea>
					<input value="SEND" type="submit" id="submit" class="btnsend">
					<div class="done">
						<div class="alert-box success">
							<i>Message sent! We'll answer shortly.</i>
						</div>
					</div>
				</form>
			</div>
			<div class="contactaddress-bubble">
				<div class="contactaddress">
					1044 Madison Avenue, New York, NY 10075, US<br/>
					<a class="map" href="#">Map</a>
				</div>
			</div>
		</div>
		
	</div>
	
	
</section>
</div>



<?php
// add this to every page you create
// -------------------------------------
 require "footer.php" 
 // -----------------------------------
 ?>