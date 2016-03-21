<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<div class="mp_wrapper">
  <?php if(MeprUtils::is_user_logged_in()): ?>

    <?php if(!isset($_GET['action']) || $_GET['action'] != 'mepr_unauthorized'): ?>
      <?php if(is_page($login_page_id) && isset($redirect_to) && !empty($redirect_to)): ?>
        <script type="text/javascript">
          window.location.href="<?php echo $redirect_to; ?>";
        </script>
        <div class="mepr-already-logged-in">
          <?php printf(__('You\'re already logged in. %1$sLogout.%2$s', 'memberpress'), '<a href="'. wp_logout_url($redirect_to) . '">', '</a>'); ?>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <?php echo $message; ?>
    <?php endif; ?>

  <?php else: ?>
    <?php echo $message; ?>
    <!-- mp-login-form-start --> <?php //DON'T GET RID OF THIS HTML COMMENT PLEASE IT'S USEFUL FOR SOME REGEX WE'RE DOING ?>
    <form name="mepr_loginform" id="mepr_loginform" class="mepr-form" action="<?php echo $login_url; ?>" method="post">
      <div class="mp-form-row mepr_username">
        <div class="mp-form-label">
          <label for="log"><?php echo ($mepr_options->username_is_email)?__('Username or E-mail', 'memberpress'):__('Username', 'memberpress'); ?></label>
          <?php /* <span class="cc-error"><?php _e('Username Required', 'memberpress'); ?></span> */ ?>
        </div>
        <input type="text" name="log" id="user_login" value="<?php echo (isset($_POST['log'])?$_POST['log']:''); ?>" />
      </div>
      <div class="mp-form-row mepr_password">
        <div class="mp-form-label">
          <label for="pwd"><?php _e('Password', 'memberpress'); ?></label>
          <?php /* <span class="cc-error"><?php _e('Password Required', 'memberpress'); ?></span> */ ?>
        </div>
        <input type="password" name="pwd" id="user_pass" value="<?php echo (isset($_POST['pwd'])?$_POST['pwd']:''); ?>" />
      </div>
      <div>
        <label><input name="rememberme" type="checkbox" id="rememberme" value="forever"<?php checked(isset($_POST['rememberme'])); ?> /> <?php _e('Remember Me', 'memberpress'); ?></label>
      </div>
      <div class="mp-spacer">&nbsp;</div>
      <div class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button-primary mepr-share-button " value="<?php _e('Log In', 'memberpress'); ?>" />
        <input type="hidden" name="redirect_to" value="<?php echo esc_html($redirect_to); ?>" />
        <input type="hidden" name="mepr_process_login_form" value="true" />
        <input type="hidden" name="mepr_is_login_page" value="<?php echo ($is_login_page)?'true':'false'; ?>" />
      </div>
    </form>
    <div class="mp-spacer">&nbsp;</div>
    <div class="mepr-login-actions">
      <a href="<?php echo $forgot_password_url; ?>"><?php _e('Reset Password', 'memberpress'); ?></a>
    </div>
    <!-- mp-login-form-end --> <?php //DON'T GET RID OF THIS HTML COMMENT PLEASE IT'S USEFUL FOR SOME REGEX WE'RE DOING ?>

  <?php endif; ?>
</div>

