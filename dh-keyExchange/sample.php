<?php

require_once 'dh.php';

// 十分に大きな素数(16進文字列)
define('P', '3B9AC9C1');
// 適当な数(16進文字列)
define('G', '75BCD15');

printf('事前に決めておく値
  十分に大きな素数: %s
  適当な数: %s
', P, G);

$a = new dh(P, G);
$b = new dh(P, G);

printf('知られてもいい値
  %s
  %s
', $a->getPablic(), $b->getPablic());

$bKey = $b->getKey($a->getPablic());
$aKey = $a->getKey($b->getPablic());

printf('作られた鍵
  %s
  %s
', $aKey, $bKey);

