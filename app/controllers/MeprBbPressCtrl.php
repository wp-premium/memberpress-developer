<?php
if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}
/*
Integration of bbPress into MemberPress
*/
class MeprBbPressCtrl extends MeprBaseCtrl
{
  public function load_hooks()
  {
    add_filter('bbp_get_reply_content', 'MeprBbPressCtrl::bbpress_rule_content', 999999, 2);
    add_filter('bbp_get_topic_content', 'MeprBbPressCtrl::bbpress_rule_content', 999999, 2);
    add_filter('mepr-rules-cpts', 'MeprBbPressCtrl::filter_rules_cpts');
  }

  public static function bbpress_rule_content($content, $id)
  {
    //We only allow restriction on a per-forum basis currently
    //So let's get the current forum's id and check if it's protected
    $forum_id = bbp_get_forum_id();

    if(!$forum_id)
      return $content;

    $post = get_post($forum_id);

    if(!isset($post) || !MeprRule::is_locked($post))
      return $content;

    return MeprHooks::apply_filters('mepr-bbpress-unauthorized-message', MeprRulesCtrl::unauthorized_message($post));
  }

  public static function filter_rules_cpts($cpts)
  {
    //Since we only allow per-forum restriction,
    //let's unset topics and replies from showing up
    //in the Rules drop-down list
    unset($cpts['reply']);
    unset($cpts['topic']);

    return $cpts;
  }
} //End class
