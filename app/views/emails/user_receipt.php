<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div id="header" style="width: 680px; padding 0; margin: 0 auto; text-align: left;">
  <h1 style="font-size: 30px; margin-bottom: 0;"><?php _e('Payment Receipt', 'memberpress'); ?></h1>
  <h2 style="margin-top: 0; color: #999; font-weight: normal;"><?php _e('for your payment to {$blog_name}', 'memberpress'); ?></h2>
</div>
<div id="body" style="width: 600px; background: white; padding: 40px; margin: 0 auto; text-align: left;">
  <table class="transaction">
    <tr><th style="text-align: left;"><?php _e('Amount:', 'memberpress'); ?></th><td>{$payment_amount}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Date:', 'memberpress'); ?></th><td>{$trans_date}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Invoice:', 'memberpress'); ?></th><td>{$invoice_num}</td></tr>
    <tr><th style="text-align: left;"><?php _e('Transaction:', 'memberpress'); ?></th><td>{$trans_num}</td></tr>
  </table>
  <table style="clear: both; width: 100%;" class="labels">
    <tr>
      <td style="vertical-align: top;">
        <fieldset style="border: none; border-top: 1px solid #dedede; margin: 20px 40px 20px 0;" class="billing">
          <legend><?php _e('Paid to', 'memberpress'); ?></legend>
          <address style="font-style: normal;"> <big>{$blog_name}</big></address>
        </fieldset>
      </td>
    </tr>
  </table>
  <table style="clear: both; width: 100%;" class="labels">
    <tr>
      <td style="vertical-align: top;">
        <fieldset style="border: none; border-top: 1px solid #dedede; margin: 20px 40px 20px 0;" class="billing">
          <legend><?php _e('Billed to', 'memberpress'); ?></legend>
          <address style="font-style: normal;">
            <div class="address_name" style="display: block; font-size: 115%;"><big>{$user_full_name}</big></div>
            <div class="address_email" style="display: block;">{$user_email} (<b>{$user_login}</b>)</div>
            <div class="address_address" style="display: block;">{$user_address}</div>
          </address>
        </fieldset>
      </td>
    </tr>
  </table>
</div>

