<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div id="header" style="width: 680px; padding 0; margin: 0 auto; text-align: left;">
  <h1 style="font-size: 30px; margin-bottom: 4px;"><?php _e('Thanks for Purchasing {$product_name}', 'memberpress'); ?></h1>
</div>
<div id="body" style="width: 600px; background: white; padding: 40px; margin: 0 auto; text-align: left;">
  <div id="receipt">
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('You can login here: {$login_page}', 'memberpress'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('Using this username and password:', 'memberpress'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;">
      <table style="clear: both;" class="transaction">
        <tr><th style="text-align: left;"><?php _e('Username:', 'memberpress'); ?></th><td>{$username}</td></tr>
        <tr><th style="text-align: left;"><?php _e('Password:', 'memberpress'); ?></th><td><?php _e('*** Password you set during signup ***', 'memberpress'); ?></td></tr>
      </table>
    </div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('Cheers!', 'memberpress'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('The {$blog_name} Team', 'memberpress'); ?></div>
  </div>
</div>

