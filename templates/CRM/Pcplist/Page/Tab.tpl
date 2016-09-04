<h3>{ts}Personal Campaign Page List{/ts}</h3>
{if $pcps|@count gt 0}
  <table>
    <thead>
      <tr>
        <th>{ts}Page Title{/ts}</th>
        <th>{ts}Status{/ts}</th>
        <th>{ts}Contribution Page / Event{/ts}</th>
        <th>{ts}Target Amount{/ts}</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$pcps item=pcp}
    <tr>
      <td>
        <a href="{crmURL p='civicrm/pcp/info' q="reset=1&id=`$pcp.id`" fe='true'}" title="{ts}View Personal Campaign Page{/ts}" target="_blank">{$pcp.title}</a>
      </td>
      <td>{$pcp.status}</td>
      <td>
        {if $pcp.type eq "Contribution"}
        <a href="{crmURL p='civicrm/admin/contribute/settings' q="reset=1&id=`$pcp.type_id`&action=update" fe='true'}" target="_blank">
          {$pcp.type} - {$pcp.type_title}
        </a>
        {elseif $pcp.type eq "Event"}
        <a href="{crmURL p='civicrm/event/manage/settings' q="reset=1&id=`$pcp.type_id`&action=update" fe='true'}" target="_blank">
          {$pcp.type} - {$pcp.type_title}
        </a>
        {/if}
      </td>
      <td>{$pcp.currency} {$pcp.target_amount}</td>
      <td>
        <span>
          <a href="{crmURL p='civicrm/pcp/info' q="reset=1&id=`$pcp.id`&action=update&component=contribute" fe='true'}" class="action-item crm-hover-button" title="{ts}Edit Personal Campaign Page{/ts}">Edit</a></span>
      </td>
    </tr>
    {/foreach}
    </tbody>
  </table>
{else}
  <p>This contact does not have any Personal Campaign Page.</p>
{/if}
