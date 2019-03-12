<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Objects\MusicCatalog\Tag;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class NewTagParamsValidator
{
	public function validate(IInput $input): Tag
	{
		$name = $input->require('name');
		
		if (!$name)
			throw new \Exception("Name is required");
		
		if (SkeletonInit::skeleton(ITagDAO::class)->loadByName($name))
			throw new \Exception("Tag with name $name already exists");
		
		$tag = new Tag();
		$tag->Name = $name;
		
		return $tag;
	}
}