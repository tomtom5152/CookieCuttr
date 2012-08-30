<?php
if (!isset($gCms)) exit;

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for CookieCuttr "default" action

   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

global $gCms;
$db = $gCms->getDb();

$sql = "SELECT `v` FROM ".cms_db_prefix()."module_cookiecuttr WHERE `k` = 'opt';";
$r = $db->Execute($sql);
    
if($r == false) return null;

while($r->fetchInto($row)) {
    $smarty->assign('opt', $row['v']);
}
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $smarty->assign('p', $this->GetModuleURLPath($use_ssl = true));
} else {
    $smarty->assign('p', $this->GetModuleURLPath($use_ssl = false));
}
echo $this->ProcessTemplate('CookieCuttr.tpl');
?>
