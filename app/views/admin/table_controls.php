<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
$search = (isset($_REQUEST['search']) && !empty($_REQUEST['search']))?$_REQUEST['search']:'';
$perpage = (isset($_REQUEST['perpage']) && !empty($_REQUEST['perpage']))?$_REQUEST['perpage']:10;
?>

<p class="search-box">
  <input id="cspf-table-search" value="<?php echo $search; ?>" data-value="<?php _e('Search ...', 'memberpress'); ?>" />
</p>
<div class="cspf-tablenav-spacer">&nbsp;</div>
<?php /*
<div id="table-actions">
  <?php _e('Display', 'memberpress'); ?>&nbsp;
  <select id="cspf-table-perpage">
    <option value="10"<?php selected(10, $perpage); ?>>10</option>
    <option value="25"<?php selected(25, $perpage); ?>>25</option>
    <option value="50"<?php selected(50, $perpage); ?>>50</option>
    <option value="100"<?php selected(100, $perpage); ?>>100&nbsp;</option>
  </select>&nbsp;
  <?php _e('entries', 'memberpress'); ?>
</div>
*/ ?>

