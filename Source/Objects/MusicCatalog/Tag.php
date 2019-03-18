<?php
namespace CloudyPlanet\Objects\MusicCatalog;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int 	$ID
 * @property string $Created
 * @property string $Modified
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
			'ID'		=> LiteSetup::createInt(null),
			'Created'	=> LiteSetup::createString(null),
			'Modified'	=> LiteSetup::createString(null),
			'Name'		=> LiteSetup::createString(null)
		];
	}
}