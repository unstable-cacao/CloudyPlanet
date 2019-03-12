<?php
namespace CloudyPlanet\Modules;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Base\Modules\ITagModule;
use CloudyPlanet\Objects\MusicCatalog\Tag;
use CloudyPlanet\SkeletonInit;


class TagModule implements ITagModule
{
	/**
	 * @return Tag[]
	 */
	public function loadAll(): array
	{
		return SkeletonInit::skeleton(ITagDAO::class)->loadAll();
	}
	
	public function save(Tag $tag): bool
	{
		return SkeletonInit::skeleton(ITagDAO::class)->save($tag);
	}
	
	public function update(Tag $tag): bool
	{
		return SkeletonInit::skeleton(ITagDAO::class)->update($tag);
	}
	
	public function delete(Tag $tag): bool
	{
		return SkeletonInit::skeleton(ITagDAO::class)->delete($tag->ID);
	}
}