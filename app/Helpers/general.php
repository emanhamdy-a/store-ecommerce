<?php
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
