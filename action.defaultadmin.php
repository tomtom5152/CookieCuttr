<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for CookieCuttr "defaultadmin" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/
        
$db = $gCms->getDb();
        
if(!empty($params['submit'])) {
    $v;
    if(!empty($params['v'])) $v = htmlspecialchars($params['v'], ENT_QUOTES);;
    $sql = "UPDATE ".cms_db_prefix()."module_cookiecuttr 
        SET `v`='$v' WHERE `k`='opt'";
    $db->Execute($sql);
    echo $this->ShowMessage($this->Lang('update_successful'));
}

$sql = "SELECT `v` FROM ".  cms_db_prefix()."module_cookiecuttr
    WHERE `k`='opt'";
$result = $db->Execute($sql);

$opt;
while($result->fetchInto($r)) {
    $opt = $r['v'];
}

$smarty->assign('options', $this->CreateLabelForInput($id, 'v', $this->Lang('options')));
$smarty->assign('optsyntax', $this->CreateSyntaxArea($id, $opt, 'v', '', '', 'javascript'));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('submit')));
$smarty->assign('cancel', $this->CreateInputReset($id, 'cancel', $this->Lang('cancel')));

echo $this->CreateFormStart($id, 'defaultadmin', $returnid);
echo $this->ProcessTemplate('adminpanel.tpl');
echo $this->CreateFormEnd();
?>