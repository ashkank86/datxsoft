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

	/*
	 * test 2
	 */
	public static function persianNumberToFloat($string)
	{
		$persian_digits_1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
		$persian_digits_2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
		$all_persian_digits = array_merge($persian_digits_1, $persian_digits_2);
		$replaces = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '9', '8', '7', '6', '5', '4', '3', '2', '1'];
		$output = str_replace([" ", ",", "'"], ["", "", ""], $string);
		$output = str_replace($all_persian_digits, $replaces, $output);
		$output = floatval($output);

		return $output;
	}

	public static function uiPrintFinancialNumber($string, $decimal = 0)
	{
		$output = "<span class=\"financial-number-<%= {$string} > 0 ? 'positive' : 'negative' %>\"><%= financialNumber({$string}, {$decimal}) %></span>";

		return $output;
	}

	/**
	 * @param $string
	 *
	 * @return mixed
	 */
	public static function linkToWiki($string)
	{
		$attributes = ['target' => '_blank'];

		return link_to('//wiki.dttsplus.com/' . $string, $string, $attributes);
	}

	/**
	 * @param $input : instrument eloquent object or $instrument_code or InstrumentID
	 *
	 * @return mixed
	 */
	public static function linkToTsetmc($input)
	{
		if (is_object($input)) {
			$instrument_object = $input;
		} else {
			$instrument_object = TseInstrument::where('InsCode', $input)->orWhere('InstrumentID', $input)->first();
		}
		$attributes = ['target' => '_blank'];
		$url = "http://www.tsetmc.com/Loader.aspx?ParTree=151311&amp;i=" . $instrument_object->InsCode;
		$title = 'TSETMC';

		return link_to($url, $title, $attributes);
	}

	/**
	 * @param $input : instrument eloquent object or $instrument_code or InstrumentID
	 *
	 * @return mixed
	 */
	public static function linkToDttsplus($input)
	{
		if (is_object($input)) {
			$instrument_object = $input;
		} else {
			$instrument_object = TseInstrument::where('InsCode', $input)->orWhere('InstrumentID', $input)->first();
		}
		$attributes = ['target' => '_self'];
		$url = "//www.dttsplus.com/api/v1/stock/detail/" . $instrument_object->InsCode;
		$title = 'DTTSplus';

		return link_to($url, $title, $attributes);
	}

	/**
	 * @param $input : instrument eloquent object or $instrument_code or InstrumentID
	 *
	 * @return mixed
	 */
	public static function linkToTse($input)
	{
		if (is_object($input)) {
			$instrument_object = $input;
		} else {
			$instrument_object = TseInstrument::where('InsCode', $input)->orWhere('InstrumentID', $input)->first();
		}
		$attributes = ['target' => '_blank'];
		$url = "http://new.tse.ir/Instrument.html?" . $instrument_object->InstrumentID;
		$title = 'TSE';

		return link_to($url, $title, $attributes);
	}
}