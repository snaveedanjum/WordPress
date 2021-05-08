<?php

// Short Code for Medical Credentialing & Enrollment Services

function wpe_service_steps() { 
 
// Things that you want to do. 
$message = '<div class="row">
	<div class="col-md-10">
				<!-- <div class="rcm m-b-20">
				<img src="assets/images/credentialing.png" class="w-100">
			</div> -->
			<div class="tips-outer">
				<div class="row">
					<div class="col-md-2">
						<div class="tips-inner">
							<span>
								<h6 class="tips-heading tip1-bg">Start Early</h6>
							</span>
							<p>Start Credentialing atleast 120 days before you start seeing patients</p>
							<div class="tips-img"><img src="'.get_template_directory_uri().'/assets/images/tip1.svg"></div>
						</div>
						<span class="tip-no">01</span>
					</div>
					<div class="col-md-2">
						<div class="tips-inner">
							<span>
								<h6 class="tips-heading tip2-bg">Be Elaborate</h6>
							</span>
							<p>Take enough time to complete paper work. Only tiny errors can cost weeks</p>
							<div class="tips-img"><img src="'.get_template_directory_uri().'/assets/images/tip2.svg"></div>
						</div>
						<span class="tip-no">02</span>
					</div>
					<div class="col-md-2">
						<div class="tips-inner">
							<span>
								<h6 class="tips-heading tip3-bg">Consistency</h6>
							</span>
							<p>Regularly check the status of your applications by following up with prayers</p>
							<div class="tips-img"><img src="'.get_template_directory_uri().'/assets/images/tip3.svg"></div>
						</div>
						<span class="tip-no">03</span>
					</div>
					<div class="col-md-2">
						<div class="tips-inner">
							<span>
								<h6 class="tips-heading tip4-bg">Escalate</h6>
							</span>
							<p>If your payer contact is not responding well. talk to a supervisor</p>
							<div class="tips-img"><img src="'.get_template_directory_uri().'/assets/images/tip4.svg"></div>
						</div>
						<span class="tip-no">04</span>
					</div>
					<div class="col-md-2">
						<div class="tips-inner">
							<span>
								<h6 class="tips-heading tip5-bg">Delegate</h6>
							</span>
							<p>Let credentialing Stars PMB experts do what they do best, i.e get you paid</p>
							<div class="tips-img"><img src="'.get_template_directory_uri().'/assets/images/tip5.svg"></div>
						</div>
						<span class="tip-no">05</span>
					</div>
				</div>
			</div>
		</div>
	</div>'; 
 
// Output needs to be return
return $message;
} 
// register shortcode
add_shortcode('service-steps', 'wpe_service_steps'); 