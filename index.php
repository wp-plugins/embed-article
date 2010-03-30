<?php 
	/*
	Plugin Name: Embed Article
	Plugin URI: http://www.embedarticle.com
	Description: Plugin for syndicating ad supported articles
	Author: Embed Article
	Version: 1.0
	Author URI: http://www.embedarticle.com
	*/
	
	function embed_host() {
		return 'widget.embedarticle.com';
	}
	function embed_file(){
		return 'embed.js';
	}
	function embed_copy_file() {
		return 'embed_cp.js';
	}
	function embed_admin_actions() {
		add_options_page("Embed Article", "Embed Article Options", 1, "Embed Article Options", "embed_admin");
	}

	add_action('admin_menu', 'embed_admin_actions');
	add_filter('the_content', 'add_widget', 9);
	add_filter('the_content', 'add_container_tags');
	
	function embed_admin() {
		if($_POST['emba_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$display = $_POST['display'];
			update_option('emba_pub_value', $pub_value);
			update_option('emba_style', $style);
			update_option('emba_cp', $cp);
			update_option('emba_display', $display);
			$updated = true;
		} else {
			$pub_value = get_option('emba_pub_value');
			$style = get_option('emba_style');
			$cp = get_option('emba_cp');
			$display = get_option('emba_display');
		}
		include("embed_admin.php");
	}
	
	function add_container_tags($content) {
		return "<div class='embaArticle' style='display:inline'>".$content."</div>";
	}
	
	function add_widget($content) {
		if(get_option('emba_display')=="show") {
			return display_embedarticle_widget().$content;
		} else {
			return display_embedarticle_cp().$content;
		}
	}
	
	function display_embedarticle_widget() {
		if(get_option('emba_pub_value')!="" && get_option('emba_pub_value')!=NULL && is_single()) {
			if(get_option('emba_cp')=="true" || get_option('emba_style')=="invisible") {
				echo 	'<script type="text/javascript">embaPub="'.get_option('emba_pub_value').'";</script>';
				echo	'<script type="text/javascript" src="http://'.embed_host().'/javascripts/'.embed_copy_file().'"></script>';
			}
			if(get_option('emba_style')!="invisible") {
				echo 	'<script type="text/javascript">';
				echo  	'embaStyle="'.get_option('emba_style').'";';
				echo	'embaPub="'.get_option('emba_pub_value').'";';
				echo	'embaURL="'.get_permalink().'";</script>';
				echo	'<script type="text/javascript" src="http://'.embed_host().'/javascripts/'.embed_file().'"></script>';
			}
		}
	}
	
	function display_embedarticle_cp() {
		if(get_option('emba_cp')=="true") {
			echo 	'<script type="text/javascript">embaPub="'.get_option('emba_pub_value').'";</script>';
			echo	'<script type="text/javascript" src="http://'.embed_host().'/javascripts/'.embed_copy_file().'"></script>';
		}
	}
	
?>