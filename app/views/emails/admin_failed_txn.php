<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div id="header" style="width: 680px; padding 0; margin: 0 auto; text-align: left;">
  <h1 style="font-size: 30px; margin-bottom: 0;"><?php _e('Transaction Failed', 'memberpress'); ?></h1>
  <h2 style="margin-top: 0; color: #999; font-weight: normal;"><?php _e('{$trans_num} &ndash; {$user_full_name}', 'memberpress'); ?></h2>
</div>
<div id="body" style="width: 600px; background: white; padding: 40px; margin: 0 auto; text-align: left;">
  <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('A transaction just failed on {$blog_name}:', 'memberpress'); ?></div>
  <table style="clear: both;" class="transaction">
    <tr><th style="text-align: left;"><?php _e('Amount:', 'memberpress'); ?></th><td>{$payment_amount}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Transaction:', 'memberpress'); ?></th><td>{$trans_num}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Date:', 'memberpress'); ?></th><td>{$trans_date}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Status:', 'memberpress'); ?></th><td><?php _e('Failed', 'memberpress'); ?></td></tr>
    <tr><th style="text-align: left;"><?php _e('Payment System:', 'memberpress'); ?></th><td>{$trans_gateway}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Name:', 'memberpress'); ?></th><td>{$user_full_name}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Email:', 'memberpress'); ?></th><td>{$user_email}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Login:', 'memberpress'); ?></th><td>{$user_login}</td></tr>
  </table>
</div>

