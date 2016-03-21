<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<div class="mp_wrapper">
  <h3><?php _e('Request a Password Reset', 'memberpress'); ?></h3>
  <form name="mepr_forgot_password_form" id="mepr_forgot_password_form" action="" method="post">
    <div>
      <label><?php _e('Enter Your Username or Email Address', 'memberpress'); ?></label>
      <input type="text" name="mepr_user_or_email" id="mepr_user_or_email" value="<?php echo isset($mepr_user_or_email)?$mepr_user_or_email:''; ?>" />
    </div>
    <div class="mp-spacer">&nbsp;</div>
    <div class="submit">
      <input type="submit" name="wp-submit" id="wp-submit" class="button-primary mepr-share-button" value="<?php _e('Request Password Reset', 'memberpress'); ?>" />
      <input type="hidden" name="mepr_process_forgot_password_form" value="true" />
    </div>
  </form>
</div>

