<?php
namespace CloudyPlanet\Base\DAO;


use CloudyPlanet\Objects\MusicCatalog\Song;


interface ISongDAO
{
	public function load(int $id): ?Song;
	
	/**
	 * @param string $name
	 * @return Song[]
	 */
	public function loadByName(string $name): array;
	
	/**
	 * @param string $artist
	 * @return Song[]
	 */
	public function loadByArtist(string $artist): array;
	
	public function save(Song $song): bool;
	public function update(Song $song): bool;
	public function updateTags(Song $song): bool;
	public function loadTags(Song $song): void;
	public function delete(int $id): bool;
	
	/**
	 * @return Song[]
	 */
	public function loadAll(): array;
}