<?php

  require_once 'schtroumpf.class.php';
  $s1 = new Schtroumpf ("Dev");
  $s2 = new Schtroumpf ("Farceur");
  $g1 = clone $s1;

  unset($s1);
echo "<br>Fin de script</br>";
