<?php
namespace CloudyPlanet\Web\Validators\MusicCatalog;


use CloudyPlanet\Base\DAO\ITagDAO;
use CloudyPlanet\Objects\MusicCatalog\Tag;
use CloudyPlanet\SkeletonInit;
use WebCore\IInput;


class DeleteTagParamsValidator
{
	public function validate(IInput $input): Tag
	{
		$id = $input->requireInt('id');
		
		if (!$id)
			throw new \Exception("ID is required");
		
		/** @var Tag $tag */
		$tag = SkeletonInit::skeleton(ITagDAO::class)->load($id);
		
		if (!$tag)
			throw new \Exception("Tag with ID $id was not found");
		
		return $tag;
	}
}