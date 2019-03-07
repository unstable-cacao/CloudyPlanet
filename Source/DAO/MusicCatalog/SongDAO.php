<?php
namespace CloudyPlanet\DAO\MusicCatalog;


use CloudyPlanet\Base\DAO\ISongDAO;
use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\MySQLConnector;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\SkeletonInit;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class SongDAO implements ISongDAO
{
	public const TABLE = 'Song';
	
	
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(Song::class, ['Created', 'Modified', 'Tags'])
			->setTable(self::TABLE)
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?Song
	{
		$song = $this->connector->loadById($id);
		
		if ($song)
			$this->loadTags($song);
		
		return $song;
	}
	
	public function loadByName(string $name): array 
	{
		$songs = $this->connector->allByField('Name', $name);
		
		foreach ($songs as $song)
		{
			$this->loadTags($song);
		}
		
		return $songs;
	}
	
	public function loadByArtist(string $artist): array 
	{
		$songs = $this->connector->allByField('Artist', $artist);
		
		foreach ($songs as $song)
		{
			$this->loadTags($song);
		}
		
		return $songs;
	}
	
	public function save(Song $song): bool
	{
		return $this->connector->save($song) && $this->updateTags($song);
	}
	
	public function update(Song $song): bool
	{
		return $this->connector->update($song) && $this->updateTags($song);
	}
	
	public function updateTags(Song $song): bool 
	{
		return SkeletonInit::skeleton(ITagDAO::class)->updateForSong($song);
	}
	
	public function loadTags(Song $song): void
	{
		$tags = SkeletonInit::skeleton(ITagDAO::class)->loadForSong($song);
		$song->Tags = $tags;
	}
	
	public function delete(int $id): bool 
	{
		return $this->connector->deleteById($id);
	}
}