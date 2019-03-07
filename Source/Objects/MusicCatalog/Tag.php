<?php
namespace CloudyPlanet\Objects\MusicCatalog;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int 	$ID
 * @property string $Name
 */
class Tag extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'	=> LiteSetup::createInt(null),
			'Name'	=> LiteSetup::createString(null)
		];
	}
}