<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(empty($arParams['KEY'])){
    ShowError(GetMessage('EMPTY_KEY_ERROR'));
}

$arResult = array();

$arResult['TOKEN']  = $arParams['TOKEN'];
$arResult['KEY'] = $arParams['KEY'];

$arResult['SETTINGS'] = array(
    'INCLUDE_JQUERY' => $arParams['INCLUDE_JQUERY'] == 'Y',
    'INCLUDE_JQUERY_UI' => $arParams['INCLUDE_JQUERY_UI'] == 'Y',
    'INCLUDE_JQUERY_UI_THEME' => $arParams['INCLUDE_JQUERY_UI_THEME'] == 'Y',
);

$arResult['OPTIONS'] = array(
    'update_labels' => $arParams['UPDATE_LABELS'] == 'Y' ? '1' : '',
    'delete_not_in_kladr_values' => $arParams['DELETE_NOT_IN_KLADR_VALUES'] == 'Y' ? '1' : '',
);

$arResult['COMMON_FIELDS'] = array();

if($arParams['HIDDEN_KLADR_ID'] == 'Y'){
    $arResult['COMMON_FIELDS'][] = array(
        'NAME' => 'kladr_id',
        'HIDDEN' => true,
    );
}

if($arParams['HIDDEN_Z_INDEX'] == 'Y'){
    $arResult['COMMON_FIELDS'][] = array(
        'NAME' => 'zip_code',
        'HIDDEN' => true,
    );
}


$arResult['FIELDS'] = array();

if($arParams['REGION_INPUT'] == 'Y'){
    $arResult['FIELDS'][] = array(
        array(
            'LABEL' => GetMessage('REGION_LABEL'),
            'NAME' => 'region',
        ),
    );
}

if($arParams['DISTRICT_INPUT'] == 'Y'){
    $arResult['FIELDS'][] = array(
        array(
            'LABEL' => GetMessage('DISTRICT_LABEL'),
            'NAME' => 'district',
        ),
    );
}

if($arParams['LOCATION_INPUT'] == 'Y'){
    $arResult['FIELDS'][] = array(
        array(
            'LABEL' => GetMessage('LOCATION_LABEL'),
            'NAME' => 'location',
        ),
    );
}

if($arParams['STREET_INPUT'] == 'Y'){
    $arResult['FIELDS'][] = array(
        array(
            'LABEL' => GetMessage('STREET_LABEL'),
            'NAME' => 'street',
        ),
    );
}

if($arParams['BUILDING_INPUT'] == 'Y'){
    $arResult['FIELDS'][] = array(
        array(
            'LABEL' => GetMessage('BUILDING_LABEL'),
            'NAME' => 'building',
        ),
    );
}

foreach($arResult['FIELDS'] as $key => $fields){
    $main_field = $fields[0];

    if($arParams['HIDDEN_LABEL'] == 'Y'){
        $fields[] = array(
            'NAME' => $main_field['NAME'] . '_label',
            'HIDDEN' => true,
        );
    }

    if($arParams['HIDDEN_LABEL_MIN'] == 'Y'){
        $fields[] = array(
            'NAME' => $main_field['NAME'] . '_label_min',
            'HIDDEN' => true,
        );
    }

    $arResult['FIELDS'][$key] = $fields;
}

$this->IncludeComponentTemplate();