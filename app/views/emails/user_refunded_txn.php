<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div id="header" style="width: 680px; padding 0; margin: 0 auto; text-align: left;">
  <h1 style="font-size: 30px; margin-bottom: 0;"><?php _e('Your Transaction Was Refunded', 'memberpress'); ?></h1>
  <h2 style="margin-top: 0; color: #999; font-weight: normal;"><?php _e('{$trans_num} &ndash; {$blog_name}', 'memberpress'); ?></h2>
</div>
<div id="body" style="width: 600px; background: white; padding: 40px; margin: 0 auto; text-align: left;">
  <div id="receipt">
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('Your transaction on {$blog_name} was refunded:', 'memberpress'); ?></div>
    <table style="clear: both;" class="transaction">
      <tr><th style="text-align: left;"><?php _e('Website:', 'memberpress'); ?></th><td>{$blog_name}</td></tr>
      <tr><th style="text-align: left;"><?php _e('Amount:', 'memberpress'); ?></th><td>{$payment_amount}</td></tr>
      <tr><th style="text-align: left;"><?php _e('Transaction:', 'memberpress'); ?></th><td>{$trans_num}</td></tr>
      <tr><th style="text-align: left;"><?php _e('Date:', 'memberpress'); ?></th><td>{$trans_date}</td></tr>
      <tr><th style="text-align: left;"><?php _e('Status:', 'memberpress'); ?></th><td><?php _e('Refunded', 'memberpress'); ?></td></tr>
      <tr><th style="text-align: left;"><?php _e('Email:', 'memberpress'); ?></th><td>{$user_email}</td></tr>
      <tr><th style="text-align: left;"><?php _e('Login:', 'memberpress'); ?></th><td>{$user_login}</td></tr>
    </table>
  </div>
</div>

