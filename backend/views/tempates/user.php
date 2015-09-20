<?php
if (isset($viewData))
  $user = $viewData;

if($route[ROUTE_VIEW] == 'userLogin') {
  require_once("views/pages/userLogin.html");
  exit;
}