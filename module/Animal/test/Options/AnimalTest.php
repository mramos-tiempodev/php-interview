<?php
namespace UnitTest\Animal\Option;

use Animal\Options\Animal as AnimalOptions;

class TaskTest extends \PHPUnit_Framework_TestCase
{
	/** @var AnimalOptions */
	private $sut;

	protected function setUp()
	{
		$this->sut = new AnimalOptions();
	}

	protected function tearDown()
	{
		unset($this->sut);
	}

	public function testExchangeArrayNoDataForId()
	{
		$data = array();
		$this->sut->exchangeArray($data);
		$this->assertNull($this->sut->id);
	}

	public function testExchangeArrayNoDataForName()
	{
		$data = array();
		$this->sut->exchangeArray($data);
		$this->assertNull($this->sut->description);
	}

	public function testExchangeArrayNoDataForStatus()
	{
		$data = array();
		$this->sut->exchangeArray($data);
		$this->assertNull($this->sut->url);
	}

	public function testExchangeArrayWithDataForId()
	{
		$data = array('id' => 1);
		$this->sut->exchangeArray($data);
		$this->assertEquals($this->sut->id, $data['id']);
	}

	public function testExchangeArrayWithDataForName()
	{
		$data = array('name' => 'pepe');
		$this->sut->exchangeArray($data);
		$this->assertEquals($this->sut->description, $data['description']);
	}

	public function testExchangeArrayWithDataForStatus()
	{
		$data = array('status' => 1);
		$this->sut->exchangeArray($data);
		$this->assertEquals($this->sut->url, $data['url']);
	}

	public function testGetArrayCopy()
	{
		$actual = $this->sut->getArrayCopy();
		$this->assertArrayHasKey('id', $actual);
		$this->assertArrayHasKey('description', $actual);
		$this->assertArrayHasKey('url', $actual);
	}
}
 