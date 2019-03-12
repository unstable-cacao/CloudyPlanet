<?php
namespace CloudyPlanet\Modules;


use CloudyPlanet\Base\DAO\ISongDAO;
use CloudyPlanet\Base\Modules\ISongModule;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\SkeletonInit;


class SongModule implements ISongModule
{
	/**
	 * @return Song[]
	 */
	public function loadAll(): array
	{
		return SkeletonInit::skeleton(ISongDAO::class)->loadAll();
	}
	
	public function save(Song $song): bool
	{
		return SkeletonInit::skeleton(ISongDAO::class)->save($song);
	}
	
	public function update(Song $song): bool
	{
		return SkeletonInit::skeleton(ISongDAO::class)->update($song);
	}
	
	public function delete(Song $song): bool
	{
		return SkeletonInit::skeleton(ISongDAO::class)->delete($song->ID);
	}
}