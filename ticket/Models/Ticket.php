<?php
class Ticket
{
	public $id;
	public $type;
	public $title;
	public $text;
	public $answer;
	public $client_id;

	/**
	 * Ticket constructor.
	 * @param $id
	 * @param $type
	 * @param $title
	 * @param $text
	 * @param $answer
	 * @param $client_id
	 */
	public function __construct($id, $type, $title, $text, $answer, $client_id)
	{
		$this->id = $id;
		$this->type = $type;
		$this->title = $title;
		$this->text = $text;
		$this->answer = $answer;
		$this->client_id = $client_id;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param mixed $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @return mixed
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * @param mixed $answer
	 */
	public function setAnswer($answer)
	{
		$this->answer = $answer;
	}

	/**
	 * @return mixed
	 */
	public function getClientId()
	{
		return $this->client_id;
	}

	/**
	 * @param mixed $client_id
	 */
	public function setClientId($client_id)
	{
		$this->client_id = $client_id;
	}



}
?>
