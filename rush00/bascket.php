<?php
function addToBasket($id, $count=1)
{
  $_SESSION['basket'][$id][$price]=$_SESSION['basket'][$id]+$price+$count;
  return true;
}
?>
