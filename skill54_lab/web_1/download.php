<?php
$file = 'file/'.$_GET['f'];
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
if(ob_get_contents()) ob_clean();
flush();
readfile($file);
exit;