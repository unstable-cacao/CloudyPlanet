<?php
namespace CloudyPlanet\Objects\MusicCatalog;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int	$ID
 * @property string	$Artist
 * @property string	$Name
 * @property Tag[]	$Tags
 */
class Song extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'		=> LiteSetup::createInt(null),
			'Artist'	=> LiteSetup::createString(null),
			'Name'		=> LiteSetup::createString(null),
			'Tags'		=> LiteSetup::createInstanceArray(Tag::class)
		];
	}
}