<!-- BEGIN FOOTER -->
    <div class="col-lg-12 text-center">
    	<br /><br />
        <a href="javascript:;" data-toggle="modal" data-target="#tos">Terms & Condition</a> | 
        <a href="javascript:;" data-toggle="modal" data-target="#re_policy">Return Policy</a>
        <hr />
        
        <!-- Modal -->
        <div id="tos" class="modal fade" role="dialog">
            <div class="modal-dialog"> 
                <!-- Modal content-->
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Terms & Condition</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Please Note:</b> Terms subject to changes.</p>
                        <p>
                        	<ul>
                            	<li>* All downloadable software are not eligible for refund after payment, please check the demo well before making payment</li>
                                <li>* All other products (except downloads) are eligible for 100% money back guarantee within 14 days.</li>
                                <li>* All downloadable software are self install only (You may contact us for offline installation @ $25/hr).</li>
                                <li>* All downloadable software products are single user only and not transferrable.</li>
                                <li>* Downloads will be send to only the email address used in payment process</li>
                                <li>* For downloadable software, download link will be sent within 24hrs to the payment email address on successful payment.</li>
                                <li>* If no downlink within 24 hours, kindly contact our support to receive manual download link</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div id="re_policy" class="modal fade" role="dialog">
            <div class="modal-dialog"> 
                <!-- Modal content-->
                <div class="modal-content text-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Return Policy</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Please Note:</b> Return policy subject to changes.</p>
                        <p>
                        	<ul>
                            	<li>* All downloadable software are not eligible for refund after payment, please check the demo well before making payment</li>
                                <li>* All other products (except downloads) are eligible for 100% money back guarantee within 14 days.</li>
                                <li>* All downloadable software are self install only (You may contact us for offline installation @ $25/hr).</li>
                                <li>* All downloadable software products are single user only and not transferrable.</li>
                                <li>* Downloads will be send to only the email address used in payment process</li>
                                <li>* For downloadable software, download link will be sent within 24hrs to the payment email address on successful payment.</li>
                                <li>* If no downlink within 24 hours, kindly contact our support to receive manual download link</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <footer>
    	<div class="container">
            <!-- BEGIN COPYRIGHT -->
            <p class="copyright">
            	<!-- Begin OKPAY Seal Logo --><a href="https://secure.okpay.com/account/user/985558373" target="_blank"><img src="https://download.okpay.com/images_seal/seal04.png" alt="Verify OKPAY user information." width="120" height="120" border="0"></a><!-- End OKPAY Seal Logo -->
            	<br>
                Copyright © <?php echo date('Y'); ?> | <b>Tehilah Base Digital</b> - An ICT Solution Company<br /><b>Internet, Networking, Software & Hardware Solutions</b><br />Lagos, Nigeria<br />
                <a href="mailto:digital@tehilahbase.com">digital@tehilahbase.com</a> | <a href="http://tehilahbase.com/webmail" target="_blank">WebMail</a><br/>
                <b>Local:</b> +234 (809) 571 2870 | <b>International:</b> +1 (772) 242 7985<br /><br />
				<div class="col-lg-4">
                	<b style="text-transform:uppercase;">BaseSPOT Connect Centre</b><br />
                    <b style="text-transform:uppercase;">Front Office 1</b><br />
                    82, Isawo Road, Agric Ikorodu, Lagos, Nigeria
                </div>
                <div class="col-lg-4">
                	<b style="text-transform:uppercase;">Corporate Headquarters</b><br >
                    15, Oladipo Bateye Street, Beside NEMA South West Zonal Office, GRA, Ikeja, Lagos, Nigeria
                </div>
                <div class="col-lg-4">
                	<b style="text-transform:uppercase;">Data Centre</b><br />
                    58, Solarin Avenue, Ojokoro Village, Agric Ikorodu, Lagos, Nigeria
                </div>
            </p>
            <!-- END COPYRIGHT -->
        </div>
    </footer>        
    <!-- END FOOTER -->
    
    <!-- BEGIN GO TO TOP --><a href="#." class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a><!-- END GO TO TOP -->
    
    </div><!-- end #wrapper -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>landing/js/jquery.min.js"></script>
    <!-- parallax -->
    <script src="<?php echo base_url(); ?>landing/js/jquery.stellar.js"></script>
    <script src="<?php echo base_url(); ?>landing/js/custom.js"></script>
    <!-- jcarousel -->
    <script src="<?php echo base_url(); ?>landing/js/jquery.jcarousel.min.js"></script>
    <!-- way point -->
    <script src="<?php echo base_url(); ?>landing/js/waypoints.js"></script>
    <!-- Add piecharts -->
	<script src="<?php echo base_url(); ?>landing/js/jquery.easypiechart.min.js"></script>
    <!-- navigation classes change on scroll -->
	<script src="<?php echo base_url(); ?>landing/js/nimble.js"></script>
    <script src="<?php echo base_url(); ?>landing/js/scrollspy.js"></script>
    <!-- fancybox -->
    <script src="<?php echo base_url(); ?>landing/js/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php echo base_url(); ?>landing/js/jquery.fancybox-media.js?v=2.1.5"></script>
    <!-- appear -->
    <script src="<?php echo base_url(); ?>landing/js/jquery.appear.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>landing/js/bootstrap.min.js"></script>
    <!-- nimble effect -->
    

    <script>
		//slider
		jQuery(function() {

			//parallaax
			jQuery.stellar({
				horizontalScrolling: false,
				verticalOffset: 0
			});
			//fancybox
			jQuery(".fancybox").fancybox();
			jQuery(".various").fancybox({
				maxWidth	: 1100,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			jQuery('.fancybox-media').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				helpers : {
					media : {}
				}
			});
			
			jQuery('#mycarousel').jcarousel({
				vertical: true
			});
			
			 //toggle map
			 jQuery(".map-title h4 span").click(function(e) {
              	jQuery(".map iframe").slideToggle();  
				jQuery(".map-title h4 span i").toggleClass("fa-angle-up fa-angle-down");
             });
			 
			jQuery(window).scroll(function(){
				if(jQuery(window).scrollTop() > 200){
					jQuery("#back-to-top").fadeIn(200);
				} else{
					jQuery("#back-to-top").fadeOut(200);
				}
			});
			
			jQuery('#back-to-top, .back-to-top').click(function() {
				  jQuery('html, body').animate({ scrollTop:0 }, '800');
				  return false;
			});
			 
			 
			//pie charts	
			jQuery('#pie-charts').waypoint(function(direction) {			
				jQuery('.chart').easyPieChart({
					 barColor: "#5ecae6",
					onStep: function(from, to, percent) {
						jQuery(this.el).find('.percent').text(Math.round(percent));
					}
				});
				}, {
				offset: function() {
					return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
				}
			});
			
			jQuery('#pie-charts').waypoint(function(direction) {			
				jQuery('.green-circle').easyPieChart({
					 barColor: "#bed431",
					onStep: function(from, to, percent) {
						jQuery(this.el).find('.percent').text(Math.round(percent));
					}
				});
				}, {
				offset: function() {
					return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
				}
				
			});
			
			jQuery('#pie-charts').waypoint(function(direction) {			
				jQuery('.red-circle').easyPieChart({
					 barColor: "#e11e24",
					onStep: function(from, to, percent) {
						jQuery(this.el).find('.percent').text(Math.round(percent));
					}
				});
				}, {
				offset: function() {
					return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
				}
				
			});
			
			jQuery('#pie-charts').waypoint(function(direction) {			
				jQuery('.yellow-circle').easyPieChart({
					 barColor: "#f6c715",
					onStep: function(from, to, percent) {
						jQuery(this.el).find('.percent').text(Math.round(percent));
					}
				});
				}, {
				offset: function() {
					return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
				}
				
			});
			
			jQuery('#pie-charts').waypoint(function(direction) {			
				jQuery('.purple-circle').easyPieChart({
					 barColor: "#7251a2",
					onStep: function(from, to, percent) {
						jQuery(this.el).find('.percent').text(Math.round(percent));
					}
				});
				}, {
				offset: function() {
					return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
				}
				
			});
			
			});
			//form submit
			function checkmail(input)
			 {
				var pattern1=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				if(pattern1.test(input)){ return true; }else{ return false; }
			 }     
			  function proceed(){
				 var name = document.getElementById("name");
				 var email = document.getElementById("email");
				 var company = document.getElementById("company");
				 var web = document.getElementById("website");
				 var msg = document.getElementById("message");
				 var errors = "";
				 
				 if(name.value == "")
				  { 
				  name.className = 'error';
					return false;
				  }
					
				  else if(email.value == "")
				  {
					email.className = 'error';
					return false;
				  }
				  else if(checkmail(email.value)==false)
				  {
					alert('Please provide a valid email address.');
					return false;
			
				  }
				  else if(company.value == "")
				  {
					company.className = 'error';
					return false;
				  }
					else if(web.value == "")
				  {
					web.className = 'error';
					return false;
				  }
				  else if(msg.value == "")
				  {
					msg.className = 'error';
					return false;
				  }
				  else 
					{
							$.ajax({
								type: "POST",
								url: "contact.php",
								data: $("#contact_form").serialize(),
								success: function(msg)
								{
									//alert(msg);
									if(msg == 'success'){
									$('#contact_form').fadeOut(5000);
									$('#contact_message').fadeIn(2000);
									document.getElementById("contact_message").innerHTML = "Your email has been sent.";
									return true;
									}else{
									
									$('#contact_form').fadeOut(500);
									$('#contact_message').fadeIn(2000);
									document.getElementById("contact_message").innerHTML = "Your email has not been sent.";
									return true;
									}
								}
							});
					} 
			  }

		
	</script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57e4f7c94a427d157421f258/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
  </body>
</html>