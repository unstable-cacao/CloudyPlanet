<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ISongDAO;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class DeleteSongParamsValidator
{
	public function validate(IInput $input): Song
	{
		$id = $input->requireInt('id');
		
		if (!$id)
			throw new \Exception("ID is required");
		
		/** @var Song $song */
		$song = SkeletonInit::skeleton(ISongDAO::class)->load($id);
		
		if (!$song)
			throw new \Exception("Song with ID $id was not found");
		
		return $song;
	}
}