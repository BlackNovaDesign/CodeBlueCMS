<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {BuildNav} plugin
 * Type:     function<br>
 * Name:     Build Navigation<br>
 * Purpose:  fetch file, web or ftp data for Navigation and display results
 *
 * @author Kyle Holmes <kholmes at blacknovadesigns dot co dot uk>
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string|null if the assign parameter is passed, Smarty assigns the result to a template variable
 */
function smarty_function_CopyrightDate()
{

$startYear = 2012;
$thisYear = date('Y');
$copyright = "&copy;$startYear&ndash;$thisYear";
echo $copyright;
}

function CompanyNumberDisplay() {
$companyNumber = "Black Nova Designs – Registered in England and Wales - Company Number: 07982781";
echo $companyNumber;
}

function CompanyAddressOutput() {
$CompanyAddressLine1 = "WhiteCote";
$CompanyAddressLine2 = "Dauntsey";
$CompanyAddressLine3 = "Chippenham";
$CompanyAddressLine4 = "Wiltshire";
$CompanyPostcode = "SN15 4JH";
$CompanyCountry = "United Kingdom";

echo "Registered Office Address: $CompanyAddressLine1, $CompanyAddressLine2, $CompanyAddressLine3, $CompanyAddressLine4, $CompanyPostcode, $CompanyCountry";
}


