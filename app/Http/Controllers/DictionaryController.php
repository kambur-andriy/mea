<?php

namespace App\Http\Controllers;


use App\Http\Requests\Dictionary\DescribeWord;
use App\Http\Requests\Dictionary\TranslateWord;
use App\Models\Dictionary\DescriptionService;
use App\Models\Dictionary\DictionaryService;
use App\Models\Dictionary\TranslationService;
use Illuminate\Support\Facades\App;


class DictionaryController extends Controller
{

	/**
	 * Translate word
	 *
	 * @param TranslateWord $request
	 *
	 * @return JSON
	 */
	public function translateWord(TranslateWord $request)
	{

		$translationService = App::make(TranslationService::class);

		$translation = $translationService->translate($request);

		return response()->json(
			$translation
		);

	}

	/**
	 * Describe word
	 *
	 * @param DescribeWord $request
	 *
	 * @return JSON
	 */
	public function describeWord(DescribeWord $request)
	{

		$descriptionService = App::make(DescriptionService::class);

		$description = $descriptionService->create($request);

		return response()->json(
			$description
		);

	}

}
