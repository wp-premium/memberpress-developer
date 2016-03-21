<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<div id="mepr-logged-in-template">
  <span class="mepr-link-span"><a href="<?php echo esc_url($account_url,null,''); ?>"><?php _e('Account', 'memberpress'); ?></a></span>
  &nbsp;&nbsp;
  <span class="mepr-link-span"><a href="<?php echo esc_url($logout_url,null,''); ?>"><?php _e('Logout', 'memberpress'); ?></a></span>
</div>
