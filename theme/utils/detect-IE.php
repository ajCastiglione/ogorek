<?php
function detect_ie()
{
  if (
    isset($_SERVER['HTTP_USER_AGENT']) &&
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') !== false)
  )
    return true;
  else
    return false;
}
