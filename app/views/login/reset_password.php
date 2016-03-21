<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<div class="mp_wrapper">
<h3><?php _e('Enter your new password', 'memberpress'); ?></h3>
<form name="mepr_reset_password_form" id="mepr_reset_password_form" action="" method="post">
  <div>
    <label><?php _e('Password', 'memberpress'); ?>:<br/>
    <input type="password" name="mepr_user_password" id="mepr_user_password" class="input mepr_signup_input" tabindex="700"/></label>
  </div>
  <div>
    <label><?php _e('Password Confirmation', 'memberpress'); ?>:<br />
    <input type="password" name="mepr_user_password_confirm" id="mepr_user_password_confirm" class="input mepr_signup_input" tabindex="710"/></label>
  </div>
  <div class="mepr_spacer">&nbsp;</div>
  <div class="submit">
    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary mepr-share-button " value="<?php _e('Reset Password', 'memberpress'); ?>" tabindex="720" />
    <input type="hidden" name="action" value="mepr_process_reset_password_form" />
    <input type="hidden" name="mepr_screenname" value="<?php echo $mepr_screenname; ?>" />
    <input type="hidden" name="mepr_key" value="<?php echo $mepr_key; ?>" />
  </div>
</form>
</div>

