<?php
define('PAGINATION_COUNT',15);
define('ADMIN_PREFIX','admin');
if (!function_exists('getFolder')) {
	function getFolder() {
    return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';
  }
}
if (!function_exists('getLang')) {
  function getLang() {
    return app()->getLocale();
  }
}
