<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

MeprHooks::do_action('mepr_before_account_subscriptions', $mepr_current_user);

if(!empty($subscriptions)) {
  $alt = false;
?>
<div class="mp_wrapper">
  <table id="mepr-account-subscriptions-table">
    <thead>
    <tr>
      <th><?php _e('Membership', 'memberpress'); ?></th>
      <th><?php _e('Subscription', 'memberpress'); ?></th>
      <th><?php _e('Active', 'memberpress'); ?></th>
      <th><?php _e('Created', 'memberpress'); ?></th>
      <th><?php _e('Expires', 'memberpress'); ?></th>
      <th><?php _e('Card Exp', 'memberpress'); ?></th>
      <th> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($subscriptions as $s) {
      if(trim($s->sub_type) == 'transaction') {
        $is_sub = false;
        $txn = $sub = new MeprTransaction($s->ID);
        $pm  = $txn->payment_method();
        $prd = $txn->product();
        $default = __('Never','memberpress');
      }
      else {
        $is_sub = true;
        $sub = new MeprSubscription($s->ID);
        $txn = $sub->latest_txn();
        $pm  = $sub->payment_method();
        $prd = $sub->product();
        if(trim($txn->expires_at) == MeprUtils::mysql_lifetime() or empty($txn->expires_at))
          $default = __('Never','memberpress');
        else
          $default = __('Unknown','memberpress');
      }

      $mepr_options = MeprOptions::fetch();
      $alt = !$alt; // Facilitiates the alternating lines

      ?>
      <tr id="mepr-subscription-row-<?php echo $s->ID; ?>" class="mepr-subscription-row <?php echo (isset($alt) && !$alt)?'mepr-alt-row':''; ?>">
        <td>
          <!-- MEMBERSHIP ACCESS URL -->
          <?php if(isset($prd->access_url) && !empty($prd->access_url)): ?>
            <div class="mepr-account-product"><a href="<?php echo stripslashes($prd->access_url); ?>"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></a></div>
          <?php else: ?>
            <div class="mepr-account-product"><?php echo MeprHooks::apply_filters('mepr-account-subscr-product-name', $prd->post_title, $txn); ?></div>
          <?php endif; ?>

          <div class="mepr-account-subscr-id"><?php echo $s->subscr_id; ?></div>
        </td>
        <td>
          <div class="mepr-account-auto-rebill">
            <?php
              if($is_sub):
                echo ($s->status == MeprSubscription::$active_str)?__('Enabled', 'memberpress'):MeprAppHelper::human_readable_status($s->status, 'subscription');
              elseif(is_null($s->expires_at) or $s->expires_at == MeprUtils::mysql_lifetime()):
                _e('Lifetime', 'memberpress');
              else:
                _e('None', 'memberpress');
              endif;
            ?>
          </div>
          <?php if($prd->register_price_action != 'hidden'): ?>
            <div class="mepr-account-terms">
              <?php
                if($prd->register_price_action == 'custom' && !empty($prd->register_price))
                  echo stripslashes($prd->register_price);
                else
                  echo MeprTransactionsHelper::format_currency($txn);
              ?>
            </div>
          <?php endif; ?>
          <?php if($is_sub and ($nba = $sub->next_billing_at)): ?>
            <div class="mepr-account-rebill"><?php printf(__('Next Billing: %s','memberpress'), MeprAppHelper::format_date($nba)); ?></div>
          <?php endif; ?>
        </td>
        <td><div class="mepr-account-active"><?php echo $s->active; ?></div></td>
        <td><div class="mepr-account-created-at"><?php echo MeprAppHelper::format_date($s->created_at); ?></div></td>
        <td><div class="mepr-account-expires-at"><?php if($txn->txn_type == MeprTransaction::$payment_str || ($is_sub && !$sub->in_grace_period())) { echo MeprAppHelper::format_date($s->expires_at, $default); } else { _e('processing', 'memberpress'); } ?></div></td>
        <td>
          <?php if( $exp_mo = $sub->cc_exp_month and $exp_yr = $sub->cc_exp_year ): ?>
            <?php $cc_class = (($sub->cc_expiring_before_next_payment())?' mepr-inactive':''); ?>
            <div class="mepr-account-cc-exp<?php echo $cc_class; ?>"><?php printf(__('%1$02d-%2$d','memberpress'), $exp_mo, $exp_yr); ?></div>
          <?php endif; ?>
        </td>
        <td>
          <div class="mepr-account-actions">
            <?php
              if($is_sub && $pm instanceof MeprBaseRealGateway && ($s->status == MeprSubscription::$active_str || strpos($s->active, 'mepr-active') !== false)) {
                $pm->print_user_account_subscription_row_actions($s->ID);
              }
              elseif(!$is_sub && !empty($prd->ID)) {
                if($prd->is_renewal()) {
                  ?>
                    <a href="<?php echo $prd->url(); ?>" class="mepr-account-row-action mepr-account-renew"><?php _e('Renew', 'memberpress'); ?></a>
                  <?php
                }

                if($prd->group() !== false) {
                  MeprAccountHelper::group_link($prd);
                }
                elseif(strpos($s->active, 'mepr-inactive') !== false) {
                  if($prd->can_you_buy_me())
                    MeprAccountHelper::purchase_link($prd);
                }
              }
              else {
                if($prd->can_you_buy_me())
                  MeprAccountHelper::purchase_link($prd);
              }
            ?>
          </div>
        </td>
      </tr>
    <?php
    }
    MeprHooks::do_action('mepr-account-subscriptions-table', $mepr_current_user, $subscriptions);
    ?>
    </tbody>
  </table>
  <div id="mepr-subscriptions-paging">
    <?php if($prev_page) { ?>
      <a href="<?php echo "{$account_url}{$delim}action=subscriptions&currpage={$prev_page}"; ?>">&lt;&lt; <?php _e('Previous Page', 'memberpress'); ?></a>
    <?php } if($next_page) { ?>
      <a href="<?php echo "{$account_url}{$delim}action=subscriptions&currpage={$next_page}"; ?>" style="float:right;"><?php _e('Next Page', 'memberpress'); ?> &gt;&gt;</a>
    <?php } ?>
  </div><div style="clear:both"></div>
</div>
<?php
}
else {
  _e('You have no active subscriptions to display.', 'memberpress');
}

MeprHooks::do_action('mepr_account_subscriptions', $mepr_current_user);
