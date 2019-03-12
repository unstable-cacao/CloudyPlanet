<?php
namespace CloudyPlanet\Base\DAO;


use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\Objects\MusicCatalog\Tag;


interface ITagDAO
{
	public function load(int $id): ?Tag;
	public function loadByName(string $name): ?Tag;
	
	/**
	 * @param int[] $ids
	 * @return Tag[]
	 */
	public function loadAllByIds(array $ids): array;
	
	public function save(Tag $tag): bool;
	public function update(Tag $tag): bool;
	public function delete(int $id): bool;
	
	/**
	 * @param Song $song
	 * @return Tag[]
	 */
	public function loadForSong(Song $song): array;
	
	/**
	 * @param int $songId
	 * @param int[] $tagIds
	 * @return bool
	 */
	public function deleteTagRelationsById(int $songId, array $tagIds): bool;
	
	/**
	 * @param int $songId
	 * @param int[] $tagIds
	 * @return bool
	 */
	public function insertTagRelationsById(int $songId, array $tagIds): bool;
	
	public function updateForSong(Song $song): bool;
	
	/**
	 * @return Tag[]
	 */
	public function loadAll(): array;
}