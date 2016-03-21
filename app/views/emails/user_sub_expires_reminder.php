<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<div id="header" style="width: 680px; padding 0; margin: 0 auto; text-align: left;">
  <h1 style="font-size: 30px; margin-bottom:4px;">{$reminder_name}</h1>
</div>
<div id="body" style="width: 600px; background: white; padding: 40px; margin: 0 auto; text-align: left;">
  <div id="receipt">
    <div class="section" style="display: block; margin-bottom: 24px;"><?php printf(__('Hi %s,', 'memberpress'), '{$user_first_name}'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php printf(__('Just a friendly reminder that your %1$s on <strong>%2$s</strong>.', 'memberpress'), '{$reminder_description}', '{$subscr_expires_at}'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php printf(__('We wouldn\'t want you to miss out on any of the great content we\'re working on so <strong>make sure you %1$srenew it today%2$s</strong>.', 'memberpress'), '<a href="{$subscr_renew_url}">', '</a>'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('Cheers!', 'memberpress'); ?></div>
    <div class="section" style="display: block; margin-bottom: 24px;"><?php _e('The {$blog_name} Team', 'memberpress'); ?></div>
  </div>
</div>

