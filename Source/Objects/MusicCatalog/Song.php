<?php
namespace CloudyPlanet\Objects\MusicCatalog;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int	$ID
 * @property string	$Created
 * @property string	$Modified
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
			'Created'	=> LiteSetup::createString(null),
			'Modified'	=> LiteSetup::createString(null),
			'Artist'	=> LiteSetup::createString(null),
			'Name'		=> LiteSetup::createString(null),
			'Tags'		=> LiteSetup::createInstanceArray(Tag::class)
		];
	}
	
	
	public function toArray(array $filter = [], array $exclude = [])
	{
		$data = parent::toArray($filter, $exclude);
		$tags = [];
		
		foreach ($this->Tags as $tag)
		{
			$tags[] = $tag->toArray();
		}
		
		$data['Tags'] = $tags;
		
		return $data;
	}
}