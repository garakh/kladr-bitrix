<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;

$arComponentParameters = array(
	'GROUPS' => array(
                'INPUTS' => array(
                    'NAME' => GetMessage('INPUTS_GROUP_NAME'),
                ),
                'HIDDEN_INPUTS' => array(
                    'NAME' => GetMessage('HIDDEN_INPUTS_GROUP_NAME'),
                ),
                'OPTIONS' => array(
                    'NAME' => GetMessage('OPTIONS_GROUP_NAME'),
                ),
                'SETTINGS' => array(
                    'NAME' => GetMessage('SETTINGS_GROUP_NAME'),
                ),

	),
	'PARAMETERS'  =>  array(
                'TOKEN' => array(
                    'PARENT' => 'BASE',
                    'NAME' => GetMessage('TOKEN_PARAMETR_NAME'),
                    'TYPE' => 'STRING',
                    'DEFAULT' => '',
                ),
                'KEY' => array(
                    'PARENT' => 'BASE',
                    'NAME' => GetMessage('KEY_PARAMETR_NAME'),
                    'TYPE' => 'STRING',
                    'DEFAULT' => '',
                ),
                'REGION_INPUT' => array(
                    'PARENT' => 'INPUTS',
                    'NAME' => GetMessage('REGION_INPUT_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'Y',
                ),
                'DISTRICT_INPUT' => array(
                    'PARENT' => 'INPUTS',
                    'NAME' => GetMessage('DISTRICT_INPUT_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'Y',
                ),
                'LOCATION_INPUT' => array(
                    'PARENT' => 'INPUTS',
                    'NAME' => GetMessage('LOCATION_INPUT_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'Y',
                ),
                'STREET_INPUT' => array(
                    'PARENT' => 'INPUTS',
                    'NAME' => GetMessage('STREET_INPUT_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'Y',
                ),
                'BUILDING_INPUT' => array(
                    'PARENT' => 'INPUTS',
                    'NAME' => GetMessage('BUILDING_INPUT_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'Y',
                ),
                'HIDDEN_KLADR_ID' => array(
                    'PARENT' => 'HIDDEN_INPUTS',
                    'NAME' => GetMessage('HIDDEN_KLADR_ID_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'HIDDEN_Z_INDEX' => array(
                    'PARENT' => 'HIDDEN_INPUTS',
                    'NAME' => GetMessage('HIDDEN_Z_INDEX_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'HIDDEN_LABEL' => array(
                    'PARENT' => 'HIDDEN_INPUTS',
                    'NAME' => GetMessage('HIDDEN_LABEL_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'HIDDEN_LABEL_MIN' => array(
                    'PARENT' => 'HIDDEN_INPUTS',
                    'NAME' => GetMessage('HIDDEN_LABEL_MIN_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'UPDATE_LABELS' => array(
                    'PARENT' => 'OPTIONS',
                    'NAME' => GetMessage('UPDATE_LABELS_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'DELETE_NOT_IN_KLADR_VALUES' => array(
                    'PARENT' => 'OPTIONS',
                    'NAME' => GetMessage('DELETE_NOT_IN_KLADR_VALUES_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),

                'INCLUDE_JQUERY' => array(
                    'PARENT' => 'SETTINGS',
                    'NAME' => GetMessage('INCLUDE_JQUERY_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'INCLUDE_JQUERY_UI' => array(
                    'PARENT' => 'SETTINGS',
                    'NAME' => GetMessage('INCLUDE_JQUERY_UI_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),
                'INCLUDE_JQUERY_UI_THEME' => array(
                    'PARENT' => 'SETTINGS',
                    'NAME' => GetMessage('INCLUDE_JQUERY_UI_THEME_PARAMETR_NAME'),
                    'TYPE' => 'CHECKBOX',
                    'DEFAULT' => 'N',
                ),

	),
);
?>
