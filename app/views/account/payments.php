<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

if(!empty($payments))
{
?>
<div class="mp_wrapper">
  <table id="mepr-account-payments-table">
    <tr>
      <th><?php _e('Date', 'memberpress'); ?></th>
      <th><?php _e('Total', 'memberpress'); ?></th>
      <th><?php _e('Membership', 'memberpress'); ?></th>
      <th><?php _e('Method', 'memberpress'); ?></th>
      <th><?php _e('Status', 'memberpress'); ?></th>
      <th><?php _e('Invoice', 'memberpress'); ?></th>
    </tr>
    <?php
    foreach($payments as $payment)
    {
      $alt = (isset($alt) && !$alt);
      $txn = new MeprTransaction($payment->id);
      $pm  = $txn->payment_method();
      $prd = $txn->product();
    ?>
      <tr class="mepr-payment-row <?php echo ($alt)?'mepr-alt-row':''; ?>">
        <td><?php echo MeprAppHelper::format_date($payment->created_at); ?></td>
        <td><?php echo MeprAppHelper::format_currency( $payment->total <= 0.00 ? $payment->amount : $payment->total ); ?></td>

        <!-- MEMBERSHIP ACCESS URL -->
        <?php if(isset($prd->access_url) && !empty($prd->access_url)): ?>
          <td><a href="<?php echo stripslashes($prd->access_url); ?>"><?php echo MeprHooks::apply_filters('mepr-account-payment-product-name', $prd->post_title, $txn); ?></a></td>
        <?php else: ?>
          <td><?php echo MeprHooks::apply_filters('mepr-account-payment-product-name', $prd->post_title, $txn); ?></td>
        <?php endif; ?>

        <td><?php echo (is_object($pm)?$pm->label:__('Unknown','memberpress')); ?></td>
        <td><?php echo MeprAppHelper::human_readable_status($payment->status); ?></td>
        <td><?php echo $payment->trans_num; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div id="mepr-payments-paging">
    <?php if($prev_page) { ?>
      <a href="<?php echo $account_url.$delim.'action=payments&currpage='.$prev_page; ?>">&lt;&lt; <?php _e('Previous Page', 'memberpress'); ?></a>
    <?php } if($next_page) { ?>
      <a href="<?php echo $account_url.$delim.'action=payments&currpage='.$next_page; ?>" style="float:right;"><?php _e('Next Page', 'memberpress'); ?> &gt;&gt;</a>
    <?php } ?>
  </div><div style="clear:both"></div>
</div>
<?php
}
else
  _e('You have no completed payments to display.', 'memberpress');

MeprHooks::do_action('mepr_account_payments', $mepr_current_user);
