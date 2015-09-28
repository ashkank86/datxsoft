<?php
namespace Datxsoft;
class Utilities
{
	public static function userAgent()
	{
		$agent = @$_SERVER['HTTP_USER_AGENT'];
		$output = '';
		if (preg_match('/MSIE/i', $agent) || preg_match('/rv:/i', $agent)) {
			$browser = substr($agent, 25, 8);
			if ($browser == "MSIE 7.0") {
				$output = 'ie';
			} elseif ($browser == "MSIE 6.0") {
				$output = 'ie';
			} elseif ($browser == "MSIE 8.0") {
				$output = 'ie';
			} elseif ($browser == "MSIE 9.0") {
				$output = 'ie';
			} elseif ($browser == "MSIE 9.0") {
				$output = 'ie';
			} else {
				$output = "ieo";
			}
		} elseif (preg_match('/Firefox/i', $agent)) {
			$output = "ff";
		} elseif (preg_match('/Chrome/i', $agent)) {
			$output = "chrome";
		} elseif (preg_match('/Safari/i', $agent)) {
			$output = "safari";
		} elseif (preg_match('/Flock/i', $agent)) {
			$output = "flock";
		} elseif (preg_match('/Opera/i', $agent)) {
			$output = "opera";
		} elseif (preg_match('/Netscape/i', $agent)) {
			$output = "netscape";
		}
		if (stristr(@$_SERVER['HTTP_USER_AGENT'], "mac")) {
			$output .= ' osx';
		} elseif (stristr(@$_SERVER['HTTP_USER_AGENT'], "linux")) {
			$output .= ' linux';
		} elseif (stristr(@$_SERVER['HTTP_USER_AGENT'], "windows")) {
			$output .= ' windows';
		}

		return 'datx-' . $output;
	}
}