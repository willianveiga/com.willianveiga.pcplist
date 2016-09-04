<?php
class CRM_PCPList_BAO_Tab {
  static function getPCPs($cid) {
    $query = <<<SQL
    SELECT
      civicrm_pcp.id,
      civicrm_pcp.title,
      civicrm_pcp.status_id,
      civicrm_pcp.page_id AS type_id,
      (CASE
        WHEN civicrm_contribution_page.id THEN 'Contribution'
        ELSE 'Event'
      END) AS type,
      COALESCE(civicrm_contribution_page.title, civicrm_event.title) AS type_title,
      civicrm_pcp.currency,
      civicrm_pcp.goal_amount AS target_amount
    FROM civicrm_pcp
    LEFT JOIN civicrm_contribution_page ON civicrm_pcp.page_type LIKE 'contribute'
      AND civicrm_contribution_page.id = civicrm_pcp.page_id
    LEFT JOIN civicrm_event ON civicrm_pcp.page_type LIKE 'event'
      AND civicrm_event.id = civicrm_pcp.page_id
    WHERE civicrm_pcp.contact_id = $cid
    ORDER BY civicrm_pcp.id
SQL;
    return CRM_Core_DAO::executeQuery($query);
  }
}
