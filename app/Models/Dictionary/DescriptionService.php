<?php

namespace App\Models\Dictionary;


use App\Exceptions\DescriptionException;
use App\Http\Requests\Dictionary\DescribeWord;
use App\Models\DB\Description;


class DescriptionService
{

	/**
	 * @var Description
	 */
	private $dbModel;

	/**
	 * @var Integer
	 */
	private $userId;

	/**
	 * UserService constructor.
	 *
	 * @param Description $dbModel
	 * @param integer $userId
	 */
	public function __construct(Description $dbModel, $userId)
	{

		$this->dbModel = $dbModel;
		$this->userId = $userId;

	}

	/**
	 * Create description
	 *
	 * @param DescribeWord $request
	 *
	 * @return Description
	 */
	public function create(DescribeWord $request) {

		return $this->createDescription(
			[
				'user_id' => $this->userId,
				'word' => $request->word,
				'transcription' => $request->transcription,
				'sound' => $request->sound,
				'description' => $request->description,
				'translation' => $request->translation,
			]
		);

	}

	/**
	 * Get list of words
	 *
	 * @return Description[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function getList() {

		return $this->dbModel->where('user_id', $this->userId)->orderBy('id', 'desc')->get();
	}

	/**
	 * Find description
	 *
	 * @param integer $id
	 *
	 * @return Description
	 * @throws DescriptionException
	 */
	public function find($id) {

		$description = $this->dbModel->where('user_id', $this->userId)->where('id', $id)->first();

		if (is_null($description)) {
			throw new DescriptionException('Description not found.');
		}

		return $description;

	}

	/**
	 * Find random description
	 *
	 * @return Description
	 */
	public function findRandom() {

		$description = $this->dbModel->where('user_id', $this->userId)->inRandomOrder()->first();


		return $description;

	}

	/**
	 * Create description
	 *
	 * @param array $credentials
	 *
	 * @return Description
	 */
	private function createDescription(array $credentials)
	{

		return $this->dbModel->create($credentials);

	}

}
