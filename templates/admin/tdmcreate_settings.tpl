<!-- Header -->
<{include file="admin:tdmcreate/tdmcreate_header.tpl"}>
<!-- Display settings list -->
<{if $settings_list}>
    <form name="setting">
        <table class='outer width100'>
            <tr>
                <th class="txtcenter"><{translate key='ID'}></th>
                <th class="txtcenter"><{translate key='SETTING_NAME'}></th>
                <th class="txtcenter"><{translate key='SETTING_VERSION'}></th>
                <th class="txtcenter"><{translate key='SETTING_IMAGE'}></th>
                <th class="txtcenter"><{translate key='SETTING_RELEASE'}></th>
                <th class="txtcenter"><{translate key='SETTING_STATUS'}></th>
                <th class="txtcenter"><{translate key='SETTING_CHOISE'}></th>
                <th class='center width5'><{translate key='FORM_ACTION'}></th>
            </tr>
            <{foreach item=set from=$settings_list key=set_id}>
                <tr id="setting_<{$set.id}>" class="settings">
                    <td class='center bold'><{$set.id}></td>
                    <td class='center bold green'><{$set.name}></td>
                    <td class='center'><{$set.version}></td>
                    <td class='center'><img src="<{$tdmc_upload_imgmod_url}>/<{$set.image}>" height="35"/></td>
                    <td class='center'><{$set.release}></td>
                    <td class='center'><{$set.status}></td>
                    <td class='center'><input class="rSetting" type='radio' id='set_id<{$set.id}>' name='rNumber' value='<{$set.id}>'/>
                        <img id="loading_img_type<{$set.id}>" src="<{$pathIcon16}>/spinner.gif" style="display:none;" title="<{$smarty.const._AM_SYSTEM_LOADING}>" alt="<{$smarty.const._AM_SYSTEM_LOADING}>"/><img style="cursor:pointer;" class="tooltip" id="img_type<{$set.id}>"
                                                                                                                                                                                                                       onclick="tdmcreate_setStatus( { op: 'display', set_id: <{$set.id}>, set_type: <{if $set.type}>0<{else}>1<{/if}> }, 'img_type<{$set.id}>', 'settings.php' )"
                                                                                                                                                                                                                       src="<{$pathIcon16}>/<{$set.type}>.png"
                                                                                                                                                                                                                       alt="<{translate key='CHANGE_DISPLAY'}>&nbsp;<{$set.name}>" title="<{translate key='CHANGE_DISPLAY'}>&nbsp;<{$set.name}>"/>
                    </td>
                    <td class='xo-actions txtcenter width5'>
                        <a href="settings.php?op=edit&amp;set_id=<{$set.id}>" title="<{translate key='A_EDIT'}>">
                            <img src="<{$pathIcon16}>/edit.png}>" alt="<{translate key='A_EDIT'}>"/>
                        </a>
                        <a href="settings.php?op=delete&amp;set_id=<{$set.id}>" title="<{translate key='A_DELETE'}>">
                            <img src="<{$pathIcon16}>/delete.png}>" alt="<{translate key='A_DELETE'}>"/>
                        </a>
                    </td>
                </tr>
            <{/foreach}>
        </table>
    </form>
    <br/>
    <br/>
    <!-- Display settings navigation <input type='radio' name='settings' value='<{$set.type}>' />-->
    <div class="clear">&nbsp;</div>
    <{if $pagenav}>
        <div class="xo-pagenav floatright"><{$pagenav}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{else}>
    <!-- Display setting form (add,edit) -->
    <{if $form}>
        <div class="spacer"><{$form}></div>
    <{/if}>
<{/if}>
<!-- Display form (add,edit) -->
<{if $error_message|default:false}>
    <div class="alert alert-error">
        <strong><{$error_message}></strong>
    </div>
<{/if}>
<{$form|default:''}>

