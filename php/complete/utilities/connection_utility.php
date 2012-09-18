<?php

/**
 *
 * Utility Class to make a GET HTTP connection
 * to the given url and pass the output
 *
 * @author SEOmoz
 *
 */
class ConnectionUtility {

	const CURL_CONNECTION_TIMEOUT = 120;

	/**
	 *
	 * Method to make a GET HTTP connecton to
	 * the given url and return the output
	 *
	 * @param urlToFetch url to be connected
	 * @param array $postParams
	 * @return the http get response
	 */
	public static function makeRequest($urlToFetch, $postParams = null) {

		$curl_handle = curl_init();

		curl_setopt($curl_handle, CURLOPT_URL, "$urlToFetch");
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, ConnectionUtility::CURL_CONNECTION_TIMEOUT);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

		/**
		 * add additional params through post
		 */
		if (isset($postParams)) {
			curl_setopt($curl_handle, CURLOPT_POST, true);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postParams);
		}

		$buffer = curl_exec($curl_handle);

		curl_close($curl_handle);

		$arr = json_decode($buffer);

		return $arr;
	}

}
?>