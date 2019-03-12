<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ISongDAO;
use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class EditSongParamsValidator
{
	public function validate(IInput $input): Song
	{
		$id = $input->requireInt('id');
		$name = $input->string('name');
		$artist = $input->string('artist');
		$tags = $input->has('tags') ? $input->array('tags') : [];
		
		if (!$id)
			throw new \Exception("ID is required");
		
		/** @var Song $song */
		$song = SkeletonInit::skeleton(ISongDAO::class)->load($id);
		
		if (!$song)
			throw new \Exception("Song with ID $id was not found");
		
		if ($name)
			$song->Name = $name;
		
		if ($artist)
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