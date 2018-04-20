<?php
/** @var string $input 輸入 */
$input = '<p><script>alert("你贏得了奈及利亞彩票!");</script></p>';
echo htmlentities($input, ENT_QUOTES, 'UTF-8');
