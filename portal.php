
<style>
	header.masthead{
		background-image: url("https://img.freepik.com/free-photo/travel-planning-holiday-vacation_23-2147842491.jpg?w=740&t=st=1678683019~exp=1678683619~hmac=a5229ea3d6e7243c044f9d4e2a3e4c64e8c6aad5cbf327fe3ef56f01c8f49377('cover')) ?>") !important;
		
	}

</style>
<!-- Masthead-->
<header class="masthead">
	<div class="container">
		<div class="masthead-subheading">Welcome To Exotic Places</div>
		<div class="masthead-heading text-uppercase">Tevily is a World Leading Online Tour Booking Platform</div>
		<a class="btn btn-secondary btn-xl text-uppercase" href="#home">Travel & Packages</a>
	</div>
</header>

<!-- Services-->
<section class="page-section bg-white id="home">
	<div class="container">
		<h2 class="text-center">Travel & Packages</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-black" style="border:6px solid" width="40%">
	</div>
	<div class="row">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() limit 3");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){	
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));

				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate/$review_count,0,"");
		?>
			<div class="col-md-4 p-4 ">
				<div class="card w-100 rounded-0">
					<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="300rem" style="object-fit:cover">
					<div class="card-body">
					<h5 class="card-title truncate-1 w-100"><?php echo $row['title'] ?></h5><br>
					<div class=" w-100 d-flex justify-content-start">
						<div class="stars stars-large">
								<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
								<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
								<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
								<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
								<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
						</div>
                    </div>
    				<p class="card-text truncate"><?php echo $row['description'] ?></p>
					<div class="w-100 d-flex justify-content-end">
						<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-secondary">View Package</a>
					</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="d-flex w-100 justify-content-end">
		<a href="./?page=packages" class="btn btn-flat btn-secondary mr-4">View other Package <i class="fa fa-arrow-right"></i></a>
	</div>
	</div>
</section>
<!-- About-->
<section class="page-section" id="about">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">About Us</h2>
			<div class="d-flex w-100 justify-content-center">
			<hr class="border-black" style="border:6px solid" width="40%">
		</div>
		<div>
			<div class="card w-100">
				<div class="card-body">
					<div class= "subheading"> Tour and Travel are two words that appear alike but strictly speaking there is some difference between the two words. Tour is normally taken with an intention of enjoyment and relaxation. On the other hand travel is an uncountable noun. Hence it cannot be used with an indefinite article. </div>
				</div>
			</div>
			<div class="card w-100">
				<div class="card-body">
					<div class= "subheading">With its extensive coastline, the country offers the best of island beaches, white sand blue water teeming with marine life, corals and lush foliage. The Philippines is blessed with a moderate climate making it an ideal sun holiday destination.</div>
				</div>
			</div>
			<div class="card w-100">
				<div class="card-body">
					<div class= "subheading">The Philippines is a beautiful tropical country in Southeast Asia. Popular for its sunny beaches and beautiful bays in the Indian Ocean, the country has a compelling ethno-Catholic culture and an interesting cuisine. However, off the mainland, there are nearly 7100 Philippines islands that make up the Philippines archipelago. Therefore, island hopping is something that you must do on your Philippines holiday! </div>
				</div>
			</div>
		</div>
	</div>
				<div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123573.62870943174!2d120.88625506250003!3d14.560517399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c85160189c9f%3A0xaeb71056263ce223!2sLindela%20Travel%20and%20Tours!5e0!3m2!1sen!2sph!4v1678712686206!5m2!1sen!2sph" 
                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Detail Info</h2>
			<h3 class="section-subheading text-muted">Send your inquiries or message on social media.</h3>
		</div>
		<!-- * * * * * * * * * * * * * * *-->
		<!-- * * SB Forms Contact Form * *-->
		<!-- * * * * * * * * * * * * * * *-->
		<!-- This form is pre-integrated with SB Forms.-->
		<!-- To make this form functional, sign up at-->
		<!-- https://startbootstrap.com/solution/contact-forms-->
		<!-- to get an API token!-->
		<form id="contactForm" >
			<div class="row align-items-stretch mb-5">
				<div class="col-md-6">
					<div class="form-group">
						<!-- Name input-->
						<input class="form-control" id="name" name="name" type="text" placeholder="Enter Your Name *" required />
					</div>
					<div class="form-group">
						<!-- Email address input-->
						<input class="form-control" id="email" name="email" type="email" placeholder="Enter Your Email *" data-sb-validations="required,email" />
					</div>
					<div class="form-group mb-md-0">
						<input class="form-control" id="subject" name="subject" type="subject" placeholder="Contact Number *" required />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-textarea mb-md-12">
						<!-- Message input-->
						<textarea class="form-control" id="message" name="message" placeholder="Your Message Inquiries *" required></textarea>
					</div>
				</div>
			</div>
			<div class="text-center"><button class="btn btn-secondary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
		</form>
	</div>
</section>
<script>
$(function(){
	$('#contactForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_inquiry",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("an error occured",'error')
				end_loader()
			},
			success:function(resp){
				if(typeof resp == 'object' && resp.status == 'success'){
					alert_toast("Inquiry sent",'success')
					$('#contactForm').get(0).reset()
				}else{
					console.log(resp)
					alert_toast("an error occured",'error')
					end_loader()
				}
			}
		})
	})
})
</script>