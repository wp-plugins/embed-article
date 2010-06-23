<div class="wrap">
	<?php    echo "<h2>" . __( 'Embed Article Integration Options', '' ) . "</h2>"; ?>
	<?php if($updated==true) { echo "Your settings have been updated!"; }?>
	<p>For instructions, please visit the following link:</p>
	<p><a href="http://www.embedarticle.com/admin/wordpress">http://www.embedarticle.com/admin/wordpress</a></p>
	<p>*Please note: An Embed Article account is required to view this page</p>
	<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="emba_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
		<p><?php _e("Publisher ID" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
		<p><input type="checkbox" name="cp" value="true" <?php if($cp=='true'){echo 'checked';}?>> Enable Copy and Paste Activation <a href="http://www.embedarticle.com/features" target="_blank">What's this?</a></p>
		<?php    echo "<h4>" . __( 'Widget Style', '' ) . "</h4>"; ?>
		<p><input type="radio" name="style" value="counter" <?php if($style=='counter'){echo 'checked';}?>>&nbsp;<img src="http://widget.embedarticle.com/images/emba_counter_sample.gif"></p>
		<p><input type="radio" name="style" value="" <?php if($style==''){echo 'checked';}?>> <img src="http://widget.embedarticle.com/images/embed_article_button.gif"></p>
		<p><input type="radio" name="style" value="invisible" <?php if($style=='invisible'){echo 'checked';}?>> Invisible - Copy and Paste Activated</p>
		<?php    echo "<h4>" . __( 'Display Options', '' ) . "</h4>"; ?>
		<hr />
		<p><input type="radio" name="display" value="show" <?php if($display=='show'){echo 'checked';}?>> Show widget at top of post</p>
		<p><input type="radio" name="display" value="showboth" <?php if($display=='showboth'){echo 'checked';}?>> Show widget at top of post and in excerpt (Note: Your template must display excerpts for this to work)</p>
		<p><input type="radio" name="display" value="none" <?php if($display=='none'){echo 'checked';}?>> I want to place the widget in a specific place (see Advanced)</p>
		<p><b>Advanced</b>: Changing the location of where the widget appears: If you would like to change the location of where the Embed Article Widget appears, place the following code inside your template exactly where you'd like it to appear.</p>
		<p>&lt;?php display_embedarticle_widget() ?&gt;</p>
		<p>Note: If Copy and paste activation is enabled it will still work even if the widget is not displayed on the page</p>
		<hr/>
		<?php    echo "<h4>" . __( 'More Settings', '' ) . "</h4>"; ?>
		<p>Customize your embedded article word length and ad tags by logging in here:</p>
		<p><a href="http://www.embedarticle.com/admin/options">http://www.embedarticle.com/admin/options</a></p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
		</p>
	</form>
</div>
