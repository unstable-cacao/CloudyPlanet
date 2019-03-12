<?php
namespace CloudyPlanet\Base\Modules;


use CloudyPlanet\Objects\MusicCatalog\Tag;


interface ITagModule
{
	/**
	 * @return Tag[]
	 */
	public function loadAll(): array;
	
	public function save(Tag $tag): bool;
	
	public function update(Tag $tag): bool;
	
	public function delete(Tag $tag): bool;
}