<?
global $MESS;
include(GetLangFileName(substr(__FILE__, 0, -18)."/lang/", "/install/index.php"));

class primepixkladr extends CModule
{
	var $MODULE_ID = "primepixkladr";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
        var $MODULE_CSS;
        var $MODULE_GROUP_RIGHTS = "Y";
        var $PARTNER_NAME  = "Primepix";
        var $PARTNER_URI = "primepix.ru";

	function primepixkladr()
	{
		$arModuleVersion = array();

		include(substr(__FILE__, 0,  -10)."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("primepixkladr_install_name");
		$this->MODULE_DESCRIPTION = GetMessage("primepixkladr_install_desc");
	}

	function InstallFiles($arParams = array())
	{
		if($_ENV["COMPUTERNAME"]!='BX')
		{
			CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/primepixkladr/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		}
		return true;
	}

	function UnInstallFiles()
	{
		if($_ENV["COMPUTERNAME"]!='BX')
		{
                        DeleteDirFilesEx("/bitrix/components/primepix/");
		}
		return true;
	}

	function DoInstall()
	{
                RegisterModule("primepixkladr");
		$this->InstallFiles();
	}

	function DoUninstall()
	{
		$this->UnInstallFiles();
                UnRegisterModule("primepixkladr");
                return true;
	}
}
?>