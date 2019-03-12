<?php
namespace CloudyPlanet\Web\Controllers\MusicCatalog;


use CloudyPlanet\Base\Modules\ITagModule;
use CloudyPlanet\Web\Validators\MusicCatalog\DeleteTagParamsValidator;
use CloudyPlanet\Web\Validators\MusicCatalog\EditTagParamsValidator;
use CloudyPlanet\Web\Validators\MusicCatalog\NewTagParamsValidator;
use WebCore\IWebRequest;


/**
 * @autoload
 */
class TagController
{
	public function index(ITagModule $module)
	{
		$tags = $module->loadAll();
		$result = [];
		
		foreach ($tags as $tag)
		{
			$result[] = $tag->toArray();
		}
		
		return json_encode($result);
	}
	
	public function newTag(
		IWebRequest $request,
		NewTagParamsValidator $validator,
		ITagModule $module
	)
	{
		try
		{
			$tag = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->save($tag);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to save tag'
		]);
	}
	
	public function editTag(
		IWebRequest $request,
		EditTagParamsValidator $validator,
		ITagModule $module
	)
	{
		try
		{
			$tag = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->update($tag);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to update tag'
		]);
	}
	
	public function deleteTag(
		IWebRequest $request,
		DeleteTagParamsValidator $validator,
		ITagModule $module
	)
	{
		try
		{
			$tag = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->delete($tag);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to delete tag'
		]);
	}
}