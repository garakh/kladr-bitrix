<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	'NAME' => GetMessage('COMPONENT_NAME'),
	'DESCRIPTION' => GetMessage('COMPONENT_DESC'),
	'ICON' => '/images/addressform.gif',
	'SORT' => 10,
	'CACHE_PATH' => 'Y',
	'PATH' => array(
		'ID' => 'content',
		'CHILD' => array(
			'ID' => 'primepix',
			'NAME' => GetMessage('COMPONENT_GROUP'),
			'SORT' => 10,
		)
	),
);

?>