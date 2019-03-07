<?php
namespace CloudyPlanet\DAO\MusicCatalog;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\MySQLConnector;
use CloudyPlanet\Objects\MusicCatalog\Song;
use CloudyPlanet\Objects\MusicCatalog\Tag;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class TagDAO implements ITagDAO
{
	public const TABLE = 'Tag';
	
	
	/** @var GenericIdConnector */
	private $connector;
	
	
	public function __construct()
	{
		$this->connector = new GenericIdConnector();
		$this->connector
			->setConnector(MySQLConnector::conn())
			->setObjectMap(Tag::class, ['Created', 'Modified'])
			->setTable(self::TABLE)
			->setAutoIncrementId('ID');
	}
	
	
	public function load(int $id): ?Tag
	{
		return $this->connector->loadById($id);
	}
	
	public function loadByName(string $name): ?Tag
	{
		return $this->connector->oneByField('Name', $name);
	}
	
	public function save(Tag $tag): bool
	{
		return $this->connector->save($tag);
	}
	
	public function update(Tag $tag): bool
	{
		return $this->connector->update($tag);
	}
	
	public function delete(int $id): bool
	{
		return $this->connector->deleteById($id);
	}
	
	public function loadForSong(Song $song): array 
	{
		$tags = $this->connector->getConnector()
			->select()
			->column('Tag.*')
			->join('SongTag', 'sg', 'sg.TagID = Tag.ID')
			->byField('sg.SongID', $song->ID)
			->queryAll(true);
		
		return Tag::allFromArray($tags);
	}
	
	public function deleteTagRelationsById(int $songId, array $tagIds): bool 
	{
		$cmd = $this->connector->getConnector()
			->delete()
			->from('SongTag')
			->byField('SongID', $songId);
		
		if ($tagIds)
			$cmd->whereIn('TagID', $tagIds);
		
		return $cmd->executeDml();
	}
	
	public function insertTagRelationsById(int $songId, array $tagIds): bool
	{
		$values = [];
		
		foreach ($tagIds as $tagId)
		{
			$values[] = ['SongID' => $songId, 'TagID' => $tagId];
		}
		
		return $this->connector->getConnector()
			->insert()
			->into('SongTag')
			->valuesBulk($values)
			->executeDml();
	}
	
	public function updateForSong(Song $song): bool
	{
		if (!$song->Tags)
		{
			return $this->deleteTagRelationsById($song->ID, []);
		}
		
		$currentIds = $this->connector->getConnector()
			->select()
			->column('TagID')
			->from('SongTag')
			->byField('SongID', $song->ID)
			->queryColumn();
		
		$expectedIds = array_map(function($tag) 
		{
			return $tag->ID;
		}, $song->Tags);
		
		$idsToInsert = array_diff($expectedIds, $currentIds);
		$idsToDelete = array_diff($currentIds, $expectedIds);
		
		$result = true;
		
		if ($idsToDelete)
			$result = $this->deleteTagRelationsById($song->ID, $idsToDelete) && $result;
		
		if ($idsToInsert)
			$result = $this->insertTagRelationsById($song->ID, $idsToInsert) && $result;
		
		return $result;
	}
}