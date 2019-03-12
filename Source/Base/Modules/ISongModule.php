<?php
namespace CloudyPlanet\Base\Modules;


use CloudyPlanet\Objects\MusicCatalog\Song;


interface ISongModule
{
	/**
	 * @return Song[]
	 */
	public function loadAll(): array;
	
	public function save(Song $song): bool;
	
	public function update(Song $song): bool;
	
	public function delete(Song $song): bool;
}