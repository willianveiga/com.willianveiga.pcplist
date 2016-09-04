<?php

require_once 'CRM/Core/Page.php';
require_once 'CRM/Pcplist/BAO/Tab.php';

class CRM_Pcplist_Page_Tab extends CRM_Core_Page {
  public function run() {
    $cid = CRM_Utils_Request::retrieve('cid', 'Positive');
    $pcpDao = CRM_PCPList_BAO_Tab::getPCPs($cid);
    $statuses = CRM_PCP_BAO_PCP::buildOptions('status_id', 'create');

    $pcps = array();
    while ($pcpDao->fetch()) {
      $pcps[] = array(
        'id' => $pcpDao->id,
        'title' => $pcpDao->title,
        'status' => $statuses[$pcpDao->status_id],
        'type_id' => $pcpDao->type_id,
        'type' => $pcpDao->type,
        'type_title' => $pcpDao->type_title,
        'currency' => $pcpDao->currency,
        'target_amount' => $pcpDao->target_amount,
      );
    }

    $this->assign('pcps', $pcps);

    parent::run();
  }
}
