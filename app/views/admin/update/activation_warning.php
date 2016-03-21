<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<?php if(defined('MEMBERPRESS_LICENSE_KEY') and isset($error)): ?>
  <div class="error" style="padding: 10px;"><?php printf(__('Error with MEMBERPRESS_LICENSE_KEY: %s', 'memberpress'), $error); ?></div>
<?php else: ?>
  <div class="error" style="padding: 10px;"><?php printf(__('<b>MemberPress hasn\'t been activated yet.</b> Go to the MemberPress %1$sactivation page%2$s to activate it.', 'memberpress'), '<a href="'.admin_url('admin.php?page=memberpress-updates').'">','</a>'); ?></div>
<?php endif; ?>
