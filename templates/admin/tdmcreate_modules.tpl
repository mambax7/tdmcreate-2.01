<{include file="admin:system/admin_navigation.tpl"}>
<{include file="admin:system/admin_tips.tpl"}>
<{include file="admin:system/admin_buttons.tpl"}>
<{if $modules_count|default:false}>
	<table width='100%' cellspacing='1' class='outer'>
		<thead>
			<tr>
				<th class='txtcenter'><{translate key="CH_NUMBER_ID"}></th>
				<th class='txtcenter'><{translate key="NAME"}></th>
				<th class='txtcenter'><{translate key="VERSION"}></th>
				<th class='txtcenter'><{translate key="IMAGE"}></th>
				<th class='txtcenter'><{translate key="RELEASE"}></th>
				<th class='txtcenter'><{translate key="STATUS"}></th>
				<th class='txtcenter'><{translate key="ADMIN"}></th>
				<th class='txtcenter'><{translate key="USER"}></th>
				<th class='txtcenter'><{translate key="SUBMENU"}></th>
				<th class='txtcenter'><{translate key="SEARCH"}></th>
				<th class='txtcenter'><{translate key="COMMENTS"}></th>
				<th class='txtcenter'><{translate key="NOTIFICATIONS"}></th>
				<th class='txtcenter'><{translate key="ACTION"}></th>
			</tr>
		</thead>
		<tbody>
			<{foreach item=mod from=$modules}>
				<tr class="<{cycle values='even,odd'}>">
					<td class='txtcenter'><{$mod.id}></td>
					<td class='txtcenter'><{$mod.name}></td>
					<td class='txtcenter'><{$mod.version}></td>
					<td class='txtcenter'><img src="<{xoAppUrl uploads/tdmcreate/images/modules}>/<{$mod.image}>" height='15px' title='<{$mod.name}>' alt='<{$mod.name}>' /></td>
					<td class='txtcenter'><{$mod.release}></td>
					<td class='txtcenter'><{$mod.status}></td>
					<td class='txtcenter'><img src="<{if $mod.admin}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='txtcenter'><img src="<{if $mod.user}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='txtcenter'><img src="<{if $mod.submenu}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='txtcenter'><img src="<{if $mod.search}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='txtcenter'><img src="<{if $mod.comments}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='txtcenter'><img src="<{if $mod.notifications}><{xoAppUrl 'modules/tdmcreate/icons/16/green.png'}>
								          <{else}><{xoAppUrl 'modules/tdmcreate/icons/16/red.png'}><{/if}>" /></td>
					<td class='xo-actions txtcenter width6'>
						<a href='modules.php?op=edit&amp;mod_id=<{$mod.id}>' title='<{translate key="A_EDIT"}>'>
							<img src="<{xoAdminIcons 'edit.png'}>" alt="<{translate key='A_EDIT'}>" /></a>
						<a href='modules.php?op=delete&amp;mod_id=<{$mod.id}>' title='<{translate key="A_DELETE"}>'>
							<img src="<{xoAdminIcons 'delete.png'}>" alt="<{translate key='A_DELETE'}>" /></a>
					</td>
				</tr>
			<{/foreach}>
		</tbody>
	</table><br />
    <{if $pagenav|default:false}>
		<{$pagenav}>	   
	<{/if}>	
<{/if}>
<!-- Display form (add,edit) -->
<{if $error_message|default:false}>
<div class="alert alert-error">
    <strong><{$error_message}></strong>
</div>
<{/if}>
<{$form|default:''}>