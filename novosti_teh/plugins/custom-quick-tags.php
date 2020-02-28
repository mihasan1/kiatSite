<?php

/*
Plugin Name:	Custom Quick Tags
Plugin URI:		http://cutenews.ru/1096101834/
Description:	�������� ����������� ����� �������������� ������ ��� �������� � ������������.
Version:		1.0
Author:			David Carrington
Author URI:		http://www.brandedthoughts.co.uk
Required Framework: 1.1.2
Application:	CuteNews
*/

add_filter('cutenews-options', 'cqt_AddToOptions');
add_action('plugin-options','cqt_CheckAdminOptions');

add_filter('news-entry-content','apply_cqt');
add_filter('news-comment-content','apply_cqt');


function cqt_AddToOptions($options, $hook) {
	global $PHP_SELF;
	
	// Add a custom screen to the "options" screen
	$options[] = array(
		'name'		=> '���� ��������������',
		'url'		=> $PHP_SELF.'?mod=options&amp;action=cqt',
		'access'	=> '1',
	);
	
	// return the customized options
	return $options;
}

// 
function cqt_CheckAdminOptions($hook) {
	// chek if the user is requesting the CQT options
	if ($_GET['action'] == 'cqt')
		// show the CQT admin screen
		cqt_AdminOptions();
}

function cqt_AdminOptions() {
	echoheader('user','���� ��������������');
	
	$cqt = new PluginSettings('Custom_Quick_Tags');
	
	switch ($_GET['subaction']) {
		case 'edit':
			$tag = $cqt->settings['tags'][$_GET['id']];
		case 'add':
			$id = $tag ? '&amp;id='.$_GET['id'] : '';
			$buffer = '
   <table cellspacing="0" cellpadding="0">
    <tr>
      <td width="25" align=middle><img border="0" src="skins/images/help_small.gif"></td>
      <td >&nbsp;<a href="http://www.brandedthoughts.co.uk/cutewiki/index.php/Custom%20Quick%20Tags%20Plugin" target="_blank">������ �� ������ � ������</a></td>
    </tr>
	<tr><td>&nbsp;</tr>
   </table>
	<form method="post" action="?mod=options&amp;action=cqt&amp;subaction=doadd'.$id.'" class="easyform">
		<div>
			<label for="txtName"><b>�������� ����</b></label><br />
			<input id="txtName" name="cqt[name]" value="'.$tag[name].'" style="width: 400px;" />
		</div><br />
		<div>
			<label for="txtTag"><b>���</b></label><br />
			<input id="txtTag" name="cqt[tag]" value="'.$tag[tag].'" style="width: 400px;" />
		</div><br />
		<div>
			<label for="txtReplace"><b>�������� ��...</b></label><br />
			<textarea id="txtReplace" name="cqt[replace]" style="width: 400px; height: 150px;">'.$tag[replace].'</textarea><br />
		</div>
		<div>
			<input type="checkbox" id="txtComplex" name="cqt[complex]"'.($tag[complex] ? ' checked="checked"' : '').' value="true" style="border: 0px;" />
	        <label for="txtComplex">�����������</label>
		</div><br />
		<input type="submit" value="���������" />
	</form>';
			break;
		

		case 'delete':
			$tag = $cqt->settings['tags'][$_GET['id']];
			if ($tag[name])
				$buffer = '<p>��������� ���: <strong>'.$tag[name].'</strong></p>';
			unset($cqt->settings['tags'][$_GET['id']]);
			$cqt->save();
			break;


		case 'doadd':
			$tag = array(
				name	=> stripslashes($_POST[cqt][name]),
				tag		=> stripslashes($_POST[cqt][tag]),
				complex	=> stripslashes($_POST[cqt][complex]),
				replace	=> stripslashes($_POST[cqt][replace]),
			);
			
			if ($_GET['id'])
				$cqt->settings['tags'][$_GET['id']] = $tag;
			else
				$cqt->settings['tags'][] = $tag;
			
			$buffer = '<p>����������� ���: <strong>'.$_POST[cqt][name].'</strong></p>';
			$cqt->save();


		default:
			$buffer .= '
		<table border=0 cellpading=0 cellspacing=0 width=100%>
			<thead>
				<tr>
					<td bgcolor=#F7F6F4 width=1>&nbsp;</td>
					<td bgcolor=#F7F6F4><u>��������</u></td>
					<td bgcolor=#F7F6F4><u>���</u></td>
					<td bgcolor=#F7F6F4><u>���</u></td>
					<td bgcolor=#F7F6F4><u>���</u></td>
					<td bgcolor=#F7F6F4><u>��������</u></td>
				</tr>
			</thead>
			<tbody>';
			
			$tags = $cqt->settings['tags'];
			
			if (empty($tags)) {
				$buffer .= '<td colspan="5">��� ����� ��������������</td>';
			} else
				foreach ($cqt->settings['tags'] as $id => $tag) {
					$buffer .= '
				<tr>
					<td>&nbsp;</td>
					<td>'.$tag[name].'</td>
					<td>['.$tag[tag].']</td>
					<td>'.($tag[complex] ? '�����.' : '�����.' ).'</td>
					<td>'.htmlspecialchars($tag[replace]).'</td>
					<td><a href="?mod=options&amp;action=cqt&amp;subaction=edit&amp;id='.$id.'" title="�������� ��� '.$tag[tag].'">���.</a> <a href="?mod=options&amp;action=cqt&amp;subaction=delete&amp;id='.$id.'" title="������� ��� '.$tag[tag].'">����.</a></td>
				</tr>';
				}
			
			$buffer .= '
			<tbody>
		</table>
		<p><a href="?mod=options&amp;action=cqt&amp;subaction=add">�������� ����� ���?</a></p>';
	}
	
	echo $buffer;
	
	echofooter();
}

function apply_cqt($content, $hook) {
	$cqt = new PluginSettings('Custom_Quick_Tags');
	$tags = $cqt->settings['tags'];
	if (!empty($tags))
		foreach ($tags as $tag)
			if ($tag[complex] == 'true')
				$content = preg_replace('{\['.$tag[tag].'=([^[]*)\](.*)\[\/'.$tag[tag].'\]}i', $tag[replace], $content);
			else
				$content = preg_replace('{\['.$tag[tag].'\](.*)\[\/'.$tag[tag].'\]}i', $tag[replace], $content);
	
	return $content;
}

?>