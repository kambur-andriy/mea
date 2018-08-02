<?php

namespace App\Models\Dictionary;


class TranslationApi
{

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var string
	 */
	private $apiUrl;

	/**
	 * @var string
	 */
	private $authUrl;

	/**
	 * @var integer
	 */
	private $srcLang;

	/**
	 * @var integer
	 */
	private $dstLang;

	/**
	 * @var string
	 */
	private $dictionary;

	/**
	 * TranslationApi constructor.
	 */
	public function __construct()
	{

		$this->apiKey = env('LINGVO_API_KEY');
		$this->apiUrl = env('LINGVO_API_URL');
		$this->authUrl = env('LINGVO_AUTH_URL');
		$this->srcLang = env('LINGVO_SOURCE_LANGUAGE');
		$this->dstLang = env('LINGVO_DESTINATION_LANGUAGE');
		$this->dictionary = env('LINGVO_DICTIONARY');

	}

	/**
	 * Translate word
	 *
	 * @param string $word
	 *
	 * @return array|null
	 */
	public function translate(string $word)
	{

		$authToken = $this->getAuthToken();

		if (!$authToken) {
			return null;
		}

		$translationData = $this->callApi($word, $authToken);

		if (!is_object($translationData)) {
			return null;
		}

		return [
			'word' => $translationData->Translation->Heading,
			'translation' => self::_getTranslationsList($translationData),
		];

	}

	/**
	 * Create list of translations
	 *
	 * @param \stdClass $translationData
	 *
	 * @return array
	 */
	private static function _getTranslationsList($translationData)
	{

		$translationsList = [];

		$translations = explode(';', $translationData->Translation->Translation);

		foreach ($translations as $translation) {
			$translationsList[] = trim($translation);
		}

		return $translationsList;

	}

	/**
	 * Call Lingvo API to translate the word
	 *
	 * @param string $word
	 *
	 * @return array|mixed
	 */
	private function callApi($word, $authToken)
	{

		$ch = curl_init();

		$urlParams = 'Minicard?text=' . urlencode($word) . '&srcLang=' . $this->srcLang . '&dstLang=' . $this->dstLang;

		curl_setopt($ch, CURLOPT_URL, $this->apiUrl . $urlParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $authToken));
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);

		$apiResponse = curl_exec($ch);

		curl_close($ch);

		$result = json_decode($apiResponse);

		return $result;

	}

	/**
	 * Get Auth Token
	 *
	 * @return string
	 */
	private function getAuthToken()
	{

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->authUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $this->apiKey));
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([]));

		$authResponse = curl_exec($ch);

		curl_close($ch);

		return $authResponse;

	}

}
