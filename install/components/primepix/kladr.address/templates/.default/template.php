<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div id="kladr-address" class="kladr-address">
    <? if($arResult['SETTINGS']['INCLUDE_JQUERY_UI_THEME']): ?><link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" /><? endif ?>
    <? if($arResult['SETTINGS']['INCLUDE_JQUERY']): ?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><? endif ?>
    <? if($arResult['SETTINGS']['INCLUDE_JQUERY_UI']): ?><script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script><? endif ?>

    <? foreach($arResult['OPTIONS'] as $key => $val): ?>
        <input name="<?= $key ?>" type="hidden" value="<?= $val ?>" />
    <? endforeach ?>

    <? foreach($arResult['COMMON_FIELDS'] as $field): ?>
        <? if($field['LABEL']): ?><label for="<?= $field['NAME'] ?>"><?= $field['LABEL'] ?></label><? endif ?>
        <input name="<?= $field['NAME'] ?>" type="<?= $field['HIDDEN'] ? 'hidden' : 'text' ?>" value="" />
    <? endforeach ?>

    <? foreach($arResult['FIELDS'] as $fields): ?>
        <div class="field">
            <? foreach($fields as $field): ?>
                <? if($field['LABEL']): ?><label for="<?= $field['NAME'] ?>"><?= $field['LABEL'] ?></label><? endif ?>
                <input name="<?= $field['NAME'] ?>" type="<?= $field['HIDDEN'] ? 'hidden' : 'text' ?>" value="" />
            <? endforeach ?>
        </div>
    <? endforeach ?>

    <script src="<?= $templateFolder ?>/jquery.primepix.kladr.min.js"></script>
    <script src="<?= $templateFolder ?>/controller.js"></script>
    <script>KladrApiControllerInit('<?= $arResult['TOKEN'] ?>', '<?= $arResult['KEY'] ?>');</script>
</div>