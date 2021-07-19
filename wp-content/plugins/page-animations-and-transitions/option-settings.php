<?php

defined('ABSPATH') || die();

if(isset($_POST['weblizar_page_anim_submit']) && isset($_POST['security'])) {
	if ( ! wp_verify_nonce( $_POST['security'], 'weblizar_saves_settings' ) ) {
        die();}
	$weblizar_page_in_trans		=	sanitize_option('weblizar_page_in_trans', $_POST['weblizar_page_in_trans']);

	$weblizar_bg_clr			=	sanitize_text_field( $_POST['weblizar_bg_clr']);
	$weblizar_preload_txt_clr	=	sanitize_text_field( $_POST['weblizar_preload_txt_clr']);
	$weblizar_pre_load_delay	=	sanitize_text_field( $_POST['weblizar_pre_load_delay']);
	$weblizar_icon_pre_load		=	sanitize_text_field( $_POST['weblizar_icon_pre_load']);
	$weblizar_pre_load_switch	=	sanitize_text_field( $_POST['weblizar_pre_load_switch']);
	$weblizar_pg_anim_txt_append =	sanitize_text_field( $_POST['weblizar_pg_anim_txt_append']);

	$wl_page_trans_options['weblizar_page_in_trans']      = $weblizar_page_in_trans;
	$wl_page_trans_options['weblizar_bg_clr']             = $weblizar_bg_clr;
	$wl_page_trans_options['weblizar_preload_txt_clr']    = $weblizar_preload_txt_clr;
	$wl_page_trans_options['weblizar_pre_load_delay']     = $weblizar_pre_load_delay;
	$wl_page_trans_options['weblizar_icon_pre_load']      = $weblizar_icon_pre_load;
	$wl_page_trans_options['weblizar_pre_load_switch']    = $weblizar_pre_load_switch;
	$wl_page_trans_options['weblizar_pg_anim_txt_append'] = $weblizar_pg_anim_txt_append;

	update_option('wl_page_trans_options', $wl_page_trans_options );
}
$wl_page_trans_options = get_option('wl_page_trans_options');
?>

<div class="block ui-tabs-panel active" id="option-general">

			<div id="heading">
				<table><tr><td cols=2 ><h2>	<?php include('responsive-portfolio-banner.php'); ?><?php esc_html_e('Page Animations Settings',WL_PAT_DOMAIN);?></h2></td></tr></table>
			</div>
			<form class="form-horizontal" role="form" action="#" method="POST" name="google_plus_form" >
				<?php $nonce = wp_create_nonce( 'weblizar_saves_settings' ); ?>
                        <input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">
		<div class="form-group">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
					<label  ><?php esc_html_e('Page In Animations',WL_PAT_DOMAIN); ?></label>
					</div>
					<div class="col-md-8 pt-2">
					<?php  $weblizar_page_in_trans= $wl_page_trans_options['weblizar_page_in_trans']; ?>
					<select id="weblizar_page_in_trans" name="weblizar_page_in_trans" style="width:80%;" >
						<option value="none" 						<?php if ('none' 						== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('None',WL_PAT_DOMAIN); ?></option>
						<option value="animate__backInDown" 		<?php if ('animate__backInDown' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('backInDown',WL_PAT_DOMAIN); ?></option>
						<option value="animate__backInLeft" 		<?php if ('animate__backInLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('backInLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__backInRight" 		<?php if ('animate__backInRight' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('backInRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__backInUp" 			<?php if ('animate__backInUp' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('backInUp',WL_PAT_DOMAIN); ?></option>
						<option value="animate__bounceInDown" 		<?php if ('animate__bounceInDown' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('bounceInDown',WL_PAT_DOMAIN); ?></option>
						<option value="animate__bounceInLeft" 		<?php if ('animate__bounceInLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('bounceInLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__bounceInRight" 		<?php if ('animate__bounceInRight' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('bounceInRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__bounceOutUp" 		<?php if ('animate__bounceOutUp' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('bounceOutUp',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeIn" 			<?php if ('animate__fadeIn' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeIn',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInDown" 		<?php if ('animate__fadeInDown' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInDown',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInDownBig" 		<?php if ('animate__fadeInDownBig' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInDownBig',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInLeft" 		<?php if ('animate__fadeInLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInLeftBig" 		<?php if ('animate__fadeInLeftBig' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInLeftBig',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInRight" 		<?php if ('animate__fadeInRight' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInUp" 			<?php if ('animate__fadeInUp' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInUp',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInUpBig" 		<?php if ('animate__fadeInUpBig' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInUpBig',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInTopLeft" 		<?php if ('animate__fadeInTopLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInTopLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInTopRight" 	<?php if ('animate__fadeInTopRight' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInTopRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInBottomLeft" 	<?php if ('animate__fadeInBottomLeft' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInBottomLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__fadeInBottomRight" 	<?php if ('animate__fadeInBottomRight' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('fadeInBottomRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__flip" 				<?php if ('animate__flip' 				== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('flip',WL_PAT_DOMAIN); ?></option>
						<option value="animate__flipInX" 			<?php if ('animate__flipInX' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('flipInX',WL_PAT_DOMAIN); ?></option>
						<option value="animate__flipInY" 			<?php if ('animate__flipInY' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('flipInY',WL_PAT_DOMAIN); ?></option>
						<option value="animate__rotateIn" 			<?php if ('animate__rotateIn' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('rotateIn',WL_PAT_DOMAIN); ?></option>
						<option value="animate__jackInTheBox" 		<?php if ('animate__jackInTheBox' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('jackInTheBox',WL_PAT_DOMAIN); ?></option>
						<option value="animate__rollIn" 			<?php if ('animate__rollIn' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('rollIn',WL_PAT_DOMAIN); ?></option>
						<option value="animate__rotateInDownLeft" 	<?php if ('animate__rotateInDownLeft' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('rotateInDownLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__rotateInDownRight" 	<?php if ('animate__rotateInDownRight' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('rotateInDownRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__rotateInUpRight" 	<?php if ('animate__rotateInUpRight' 	== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('rotateInUpRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__slideInDown" 		<?php if ('animate__slideInDown' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('slideInDown',WL_PAT_DOMAIN); ?></option>
						<option value="animate__slideInLeft" 		<?php if ('animate__slideInLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('slideInLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__slideInRight" 		<?php if ('animate__slideInRight' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('slideInRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__slideInUp" 			<?php if ('animate__slideInUp' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('slideInUp',WL_PAT_DOMAIN); ?></option>
						<option value="animate__zoomIn" 			<?php if ('animate__zoomIn' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('zoomIn',WL_PAT_DOMAIN); ?></option>
						<option value="animate__zoomInDown" 		<?php if ('animate__zoomInDown' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('zoomInDown',WL_PAT_DOMAIN); ?></option>
						<option value="animate__zoomInLeft" 		<?php if ('animate__zoomInLeft' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('zoomInLeft',WL_PAT_DOMAIN); ?></option>
						<option value="animate__zoomInRight" 		<?php if ('animate__zoomInRight' 		== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('zoomInRight',WL_PAT_DOMAIN); ?></option>
						<option value="animate__zoomInUp" 			<?php if ('animate__zoomInUp' 			== $weblizar_page_in_trans) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('zoomInUp',WL_PAT_DOMAIN); ?></option>
					</select>
					<p class="help-block"><?php esc_html_e('Select Your Website Page In Animation',WL_PAT_DOMAIN); ?></p>
					</div>

				</div>




				<tr><td cols=2 ><h3 id='heading'><?php esc_html_e('Preloader Settings',WL_PAT_DOMAIN);?></h3></td></tr>
				<div class="form-group">
				<div class="row">
				<div class="col-md-4">
					<label><?php esc_html_e('Preloader On/Off',WL_PAT_DOMAIN); ?></label>
				</div>
					<div class="col-sm-8">
						<?php
						if(isset($wl_page_trans_options['weblizar_pre_load_switch'])) {
							$weblizar_pre_load_switch= $wl_page_trans_options['weblizar_pre_load_switch'];
						} else {
							$weblizar_pre_load_switch = "1";
						}
						?>
						<select name="weblizar_pre_load_switch" id="weblizar_pre_load_switch" style="width:40%;">
							<option value="1" <?php if ('1' == $weblizar_pre_load_switch) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Off',WL_PAT_DOMAIN); ?></option>
							<option value="2" <?php if ('2' == $weblizar_pre_load_switch) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('On',WL_PAT_DOMAIN); ?></option>
						</select>
						<p class="help-block"><?php esc_html_e(' ',WL_PAT_DOMAIN); ?></p>
					</div>
				</div>
				</div>

				<div class="form-group">
				<div class="row">
				<div class="col-md-4">
					<label ><?php esc_html_e('Preloader Text',WL_PAT_DOMAIN); ?></label>
				</div>

					<div class="col-sm-8">
						<?php
						if(isset($wl_page_trans_options['weblizar_pg_anim_txt_append'])) {
							$weblizar_pg_anim_txt_append= $wl_page_trans_options['weblizar_pg_anim_txt_append'];
						} else {
							$weblizar_pg_anim_txt_append = "Welcome in Weblizar Preloader";
						}
						?>
						<input type="text" name="weblizar_pg_anim_txt_append" id="weblizar_pg_anim_txt_append" style="width:80%;" value="<?php echo esc_attr($weblizar_pg_anim_txt_append); ?>">
					</div>
				</div>
				</div>

				<div class="form-group">
				<div class="row">
				<div class="col-md-4">
					<label><?php esc_html_e('Preloader Text Color',WL_PAT_DOMAIN); ?></label>
				</div>
					<div class="col-sm-8">
						<?php
							if(isset($wl_page_trans_options['weblizar_preload_txt_clr'])){
								$weblizar_preload_txt_clr= $wl_page_trans_options['weblizar_preload_txt_clr'];
							} else {
								$weblizar_preload_txt_clr = "#fff";
							}
						?>
						<input id="weblizar_preload_txt_clr" name="weblizar_preload_txt_clr" type="text" value="<?php echo esc_attr($weblizar_preload_txt_clr); ?>" class="my-color-field" data-default-color="#000000" />
						<p class="help-block"><?php esc_html_e('Font Color of Preloader Text',WL_PAT_DOMAIN); ?></p>
					</div>
				</div>
				</div>

				<div class="form-group">
				<div class="row">
				<div class="col-md-4">
					<label  ><?php esc_html_e('Preloader Background Color',WL_PAT_DOMAIN); ?></label>
				</div>
					<div class="col-sm-8">
						<?php
							if(isset($wl_page_trans_options['weblizar_bg_clr'])){
								$weblizar_bg_clr= $wl_page_trans_options['weblizar_bg_clr'];
							} else {
								$weblizar_bg_clr = "#000000";
							}
						?>
						<input id="weblizar_bg_clr" name="weblizar_bg_clr" type="text" value="<?php echo esc_attr($weblizar_bg_clr); ?>" class="my-color-field" data-default-color="#000000" />
						<p class="help-block"><?php esc_html_e('Background Color of Preloader',WL_PAT_DOMAIN); ?></p>
					</div>
				</div>
				</div>



				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label  ><?php esc_html_e('Delay Time of Preloader',WL_PAT_DOMAIN); ?></label>
						</div>
						<div class="col-sm-8">
							<?php
								if(isset($wl_page_trans_options['weblizar_pre_load_delay'])){
									$weblizar_pre_load_delay = $wl_page_trans_options['weblizar_pre_load_delay'];
								} else {
									$weblizar_pre_load_delay = 5000;
								}
							?>
							<input  class="pganim-slider" type="range" min="1000" max="60000" step="1000" name="weblizar_pre_load_delay" id="weblizar_pre_load_delay" value="<?php echo esc_attr($weblizar_pre_load_delay); ?>" data-rangeSlider>
							<p class="pg-range-span">Second: <span id="pg-range-val"></span></p>
						</div>
					</div>
				</div>



				<script>
					var slider = document.getElementById("weblizar_pre_load_delay");
					var output = document.getElementById("pg-range-val");

					var x = slider.value;
					var y = x/1000;
					output.innerHTML = y;

					slider.oninput = function() {
						var x = slider.value;
						var y = x/1000;
						output.innerHTML = y;
					}
				</script>

				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label  ><?php esc_html_e('Preloader Icon', WL_PAT_DOMAIN); ?></label>
						</div>
					<div class="col-sm-8">
						<?php
							if(isset($wl_page_trans_options['weblizar_icon_pre_load'])){
								$weblizar_icon_pre_load = $wl_page_trans_options['weblizar_icon_pre_load'];
							} else {
								$weblizar_icon_pre_load = 1;
							}
						?>
						<select name="weblizar_icon_pre_load" id="weblizar_icon_pre_load" style="width:40%;">
							<option value="1" <?php if ('1' == $weblizar_icon_pre_load) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Icon 1',WL_PAT_DOMAIN); ?></option>
							<option value="2" <?php if ('2' == $weblizar_icon_pre_load) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Icon 2',WL_PAT_DOMAIN); ?></option>
							<option value="3" <?php if ('3' == $weblizar_icon_pre_load) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Icon 3',WL_PAT_DOMAIN); ?></option>
							<option value="4" <?php if ('4' == $weblizar_icon_pre_load) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Icon 4',WL_PAT_DOMAIN); ?></option>
							<option value="5" <?php if ('5' == $weblizar_icon_pre_load) echo esc_attr('selected="selected"'); ?>><?php esc_html_e('Icon 5',WL_PAT_DOMAIN); ?></option>
						</select>
					</div>
				</div>
			</div>

				<div class="form-group">
				<h1>
					<label  ><?php esc_html_e('Preloader Element',WL_PAT_DOMAIN); ?></label>
					</h1>
					<div class="col-sm-8">
						<p class="wlpat_options text-danger"><?php
							if( is_ssl() ){
								$header_file_url = admin_url("theme-editor.php?file=header.php", "https");
							} else {
								$header_file_url = admin_url("theme-editor.php?file=header.php", "http");
							}
							$preloader_element = esc_html('now after <body> insert Preloader HTML element: ');
							$tag = esc_html('<div id="page-anim-preloader"></div>');
						?> <?php esc_html_e(' Open ',WL_PAT_DOMAIN); ?><a target="_blank" href="<?php echo esc_attr($header_file_url); ?>"><?php esc_html_e('header.php',WL_PAT_DOMAIN); ?></a> <?php esc_html_e('file for your theme',WL_PAT_DOMAIN); ?>, 
						<?php echo esc_html($preloader_element); ?><br>
						<code>
						<?php echo esc_html($tag ); ?>
						</code>
						</p>
					</div>
				</div>
				<div class="form-group col-md-offset-4">
					<div class="">
					  <button type="submit" class="btn btn-primary" name="weblizar_page_anim_submit" id="weblizar_page_anim_submit" value="submit"><?php esc_html_e('Save Changes',WL_PAT_DOMAIN); ?></button>
					</div>
				</div>
			</form>
			</div>
	</div>
</div>
