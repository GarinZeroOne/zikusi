</div><!-- #page -->
	
	<a href="<?php echo site_url(); ?>index.html#" id="toTop" class="theme_button icon-up-open-big"></a>
		<!-- Login Register Form -->
	<div id="popup_login" class="popup_form">
	    <div class="popup_body theme_article">
			<h4 class="popup_title">Login</h4>
	        <form action="index.html#" method="post" name="login_form">
				<div class="popup_field"><input type="text" name="log" id="log" placeholder="Login*" /></div>
				<div class="popup_field"><input type="password" name="pwd" id="pwd" placeholder="Password*" /></div>
				<div class="popup_field popup_button"><a href="<?php echo site_url(); ?>index.html#" class="theme_button">Login</a></div>
				<div class="popup_field forgot_password">
					<a href="<?php echo site_url(); ?>index.html#">Forgot password?</a>
	            </div>
				<div class="popup_field register">
					<a href="<?php echo site_url(); ?>index.html#">Register</a>
	            </div>
	            <div class="result sc_infobox"></div>
			</form>
	    </div>
	</div>

	<div id="popup_register" class="popup_form">
	    <div class="popup_body theme_article">
			<h4 class="popup_title">Registration</h4>
	        <form action="index.html#" method="post" name="register_form">
				<div class="popup_field"><input type="text" name="registration_username" id="registration_username" placeholder="Your name (login)*" /></div>
				<div class="popup_field"><input type="text" name="registration_email" id="registration_email" placeholder="Your email*" /></div>
				<div class="popup_field"><input type="password" name="registration_pwd" id="registration_pwd" placeholder="Your Password*" /></div>
				<div class="popup_field"><input type="password" name="registration_pwd2" id="registration_pwd2" placeholder="Confirm Password*" /></div>
				<div class="popup_field theme_info registration_role"><p>Desired role:</p>
				<input type="radio" name="registration_role" id="registration_role1" value="1" checked="checked" /><label for="registration_role1">Subscriber</label>
				<input type="radio" name="registration_role" id="registration_role2" value="2" /><label for="registration_role2">Author</label>
				</div>
				<div class="popup_field registration_msg_area"><textarea name="registration_msg" id="registration_msg" placeholder="Your message"></textarea></div>
				<div class="popup_field popup_button"><a href="<?php echo site_url(); ?>index.html#" class="theme_button">Register</a></div>
	            <div class="result sc_infobox"></div>
			</form>
	    </div>
	</div>
    <!-- #Login Register Form -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/ui/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mobilemenu.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slidemenu.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/skip-link-focus-fix.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/_utils.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/_googlemap_init.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/_front.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/_reviews.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/prettyphoto/jquery.prettyPhoto.min.js?ver=no-compose"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mediaplayer/mediaelement-and-player.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/_contact_form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.mouse.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/ui/jquery.ui.draggable.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/plmtks.js"></script>

</body>
</html>