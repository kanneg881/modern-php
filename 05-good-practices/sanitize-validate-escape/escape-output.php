<?php
/** @var string $output 輸出 */
$output = '<p><script>alert("安裝了NSA後門");</script>';
echo htmlentities($output, ENT_QUOTES, 'UTF-8');
