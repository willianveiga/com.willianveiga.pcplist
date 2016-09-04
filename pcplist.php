<?php

require_once 'pcplist.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function pcplist_civicrm_config(&$config) {
  _pcplist_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function pcplist_civicrm_xmlMenu(&$files) {
  _pcplist_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function pcplist_civicrm_install() {
  _pcplist_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function pcplist_civicrm_uninstall() {
  _pcplist_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function pcplist_civicrm_enable() {
  _pcplist_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function pcplist_civicrm_disable() {
  _pcplist_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function pcplist_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pcplist_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function pcplist_civicrm_managed(&$entities) {
  _pcplist_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function pcplist_civicrm_caseTypes(&$caseTypes) {
  _pcplist_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function pcplist_civicrm_angularModules(&$angularModules) {
_pcplist_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function pcplist_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _pcplist_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function pcplist_civicrm_tabset($tabsetName, &$tabs, $context) {
  if ($tabsetName === 'civicrm/contact/view' && isset($context['contact_id'])) {
    _pcplist_civicrm_add_tab($tabs, $context['contact_id']);
  }
}

/**
 * Conditional function definition is a code smell but it's better than
 * checking version inside the function.
 *
 * CRM_Utils_System::majorVersion is only available in CiviCRM 4.7.
 */
if (preg_match('#^4.6#', CRM_Utils_System::version())) {
  function pcplist_civicrm_tabs(&$tabs, $contactID) {
    _pcplist_civicrm_add_tab($tabs, $contactID);
  }
}

function _pcplist_civicrm_add_tab(&$tabs, $contactID) {
  $url = CRM_Utils_System::url('civicrm/pcplist/tab', array(
    'cid' => $contactID,
    'reset' => 1,
    'force' => 1,
  ));

  $tabs[] = array(
    'id' => 'pcplist_tab',
    'url' => $url,
    'title' => ts('Personal Campaign Pages List'),
    'weight' => 300,
  );
}
