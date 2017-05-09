<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" ?>
<clock>
<timestring> it is " . date('H:i:s') . "</timestring>
</clock>";
?>
