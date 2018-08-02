<?php

namespace App\Http\Controllers;


use App\Models\Dictionary\DescriptionService;
use App\Models\Dictionary\TranslationService;
use Illuminate\Support\Facades\App;


class UserController extends Controller
{

	/**
	 * Dashboard page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$translationService = App::make(TranslationService::class);

		$descriptionService = App::make(DescriptionService::class);

		$translations = $translationService->getList();

		$descriptions = $descriptionService->getList();

		return view(
			'user.index',
			[
				'translations' => $translations,
				'descriptions' => $descriptions,
			]
		);
	}

	/**
     * Translate page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function translateWord()
    {
        return view(
            'user.translate-word'
        );
    }

	/**
	 * Translations list page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function translationsList()
	{
		$translationService = App::make(TranslationService::class);

		$translations = $translationService->getList();

		return view(
			'user.translations-list',
			[
				'translations' => $translations
			]
		);
	}

	/**
	 * Extend dictionary page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function descriptionsList()
	{
		$descriptionService = App::make(DescriptionService::class);

		$descriptions = $descriptionService->getList();

		return view(
			'user.descriptions-list',
			[
				'descriptions' => $descriptions
			]
		);
	}

	/**
	 * Extend dictionary page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function describeWord()
	{
		return view(
			'user.describe-word'
		);
	}

	/**
	 * View description page
	 *
	 * @param integer $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function viewWord($id)
	{
		$descriptionService = App::make(DescriptionService::class);

		$description = $descriptionService->find($id);

		return view(
			'user.view-word',
			[
				'description' => $description
			]
		);
	}

	/**
	 * Revise random word page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function reviseWord()
	{
		$descriptionService = App::make(DescriptionService::class);

		$description = $descriptionService->findRandom();

		return view(
			'user.revise-word',
			[
				'content' => $description->translation,
				'word' => $description->word,
				'id' => $description->id
			]
		);
	}

	/**
	 * Practice random word page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function practiceWord()
	{
		$descriptionService = App::make(DescriptionService::class);

		$description = $descriptionService->findRandom();

		return view(
			'user.practice-word',
			[
				'content' => (rand(0, 10) > 5) ? $description->description : $description->translation,
				'word' => $description->word,
				'id' => $description->id
			]
		);
	}

}
