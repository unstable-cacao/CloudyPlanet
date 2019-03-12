<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class NewSongParamsValidator
{
	public function validate(IInput $input): Song
	{
		$name = $input->require('name');
		$artist = $input->require('artist');
		$tags = $input->has('tags') ? $input->array('tags') : [];
		
		if (!$name || !$artist)
			throw new \Exception("Artist and Name are required");
		
		$song = new Song();
		$song->Name = $name;
		$song->Artist = $artist;
		
		if ($tags)
		{
			$tags = $tags->requireInt();
			$loadedTags = SkeletonInit::skeleton(ITagDAO::class)->loadAllByIds($tags);
			
			if (count($loadedTags) != count($tags))
				throw new \Exception("Not all tags are valid");
			
			$song->Tags = $tags;
		}
		
		return $song;
	}
}