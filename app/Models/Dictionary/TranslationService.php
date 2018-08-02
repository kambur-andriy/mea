<?php

namespace App\Models\Dictionary;


use App\Exceptions\TranslationException;
use App\Http\Requests\Dictionary\TranslateWord;
use App\Models\DB\Translation;


class TranslationService
{

	/**
	 * @var Translation
	 */
	private $dbModel;

	/**
	 * @var TranslationApi
	 */
	private $translationApi;

	/**
	 * UserService constructor.
	 *
	 * @param Translation $dbModel
	 * @param TranslationApi $translationApi
	 */
	public function __construct(Translation $dbModel, TranslationApi $translationApi)
	{

		$this->dbModel = $dbModel;
		$this->translationApi = $translationApi;

	}

	/**
	 * Translate word
	 *
	 * @param TranslateWord $request
	 *
	 * @return Translation
	 * @throws TranslationException
	 */
	public function translate(TranslateWord $request) {

		$wordToTranslate = strtolower($request->word);

		$translation = $this->dbSearch($wordToTranslate);

		if (!is_null($translation)) {

			return $translation;

		}

		$translation = $this->apiSearch($wordToTranslate);

		if (!is_null($translation)) {

			return $this->dbModel->create($translation);

		}

		throw new TranslationException('Translation not found');

	}

	/**
	 * Get list of translated words
	 *
	 * @return Translation[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function getList() {

		return $this->dbModel->orderBy('id', 'desc')->get();
	}

	/**
	 * Search translation in the DB
	 *
	 * @param string $wordToTranslate
	 *
	 * @return Translation|null
	 */
	private function dbSearch(string $wordToTranslate) {

		return $this->dbModel->where('word', $wordToTranslate)->first();

	}

	/**
	 * Search translation in the API
	 *
	 * @param string $wordToTranslate
	 *
	 * @return array|null
	 */
	private function apiSearch(string $wordToTranslate) {

		return $this->translationApi->translate($wordToTranslate);

	}

}
