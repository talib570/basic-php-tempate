<?php
include_once('config/constants.php');

/**
 * Routes have two required parameters type and login
 * The view parameter tell the controller which view
 * file needs to be rendered for this particular route
 * there will be routes with no views, like the API call
 * below.
 */
$routes = array(
    /* User's Route */
    array(
      ROUTE_TYPE => 'user',
      ROUTE_FUNCTION => 'login',
      ROUTE_VIEW => 'userLogin'
    )
  );
?>
