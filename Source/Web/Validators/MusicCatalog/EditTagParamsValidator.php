<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Objects\MusicCatalog\Tag;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class EditTagParamsValidator
{
	public function validate(IInput $input): Tag
	{
		$id = $input->requireInt('id');
		$name = $input->string('name');
		
		if (!$id)
			throw new \Exception("ID is required");
		
		/** @var Tag $tag */
		$tag = SkeletonInit::skeleton(ITagDAO::class)->load($id);
		
		if (!$tag)
			throw new \Exception("Tag with ID $id was not found");
		
		if ($name)
		{
			if (SkeletonInit::skeleton(ITagDAO::class)->loadByName($name))
				throw new \Exception("Tag with name $name already exists");
				
			$tag->Name = $name;
		}
		
		return $tag;
	}
}