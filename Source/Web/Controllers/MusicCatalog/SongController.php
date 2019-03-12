<?php
namespace CloudyPlanet\Web\Controllers\MusicCatalog;


use CloudyPlanet\Base\Modules\ISongModule;
use CloudyPlanet\Web\Validators\MusicCatalog\DeleteSongParamsValidator;
use CloudyPlanet\Web\Validators\MusicCatalog\EditSongParamsValidator;
use CloudyPlanet\Web\Validators\MusicCatalog\NewSongParamsValidator;
use WebCore\IWebRequest;


/**
 * @autoload
 */
class SongController
{
	public function index(ISongModule $module)
	{
		$songs = $module->loadAll();
		$result = [];
		
		foreach ($songs as $song)
		{
			$result[] = $song->toArray();
		}
		
		return json_encode($result);
	}
	
	public function newSong(
		IWebRequest $request,
		NewSongParamsValidator $validator,
		ISongModule $module
	)
	{
		try
		{
			$song = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->save($song);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to save song'
		]);
	}
	
	public function editSong(
		IWebRequest $request,
		EditSongParamsValidator $validator,
		ISongModule $module
	)
	{
		try
		{
			$song = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->update($song);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to update song'
		]);
	}
	
	public function deleteSong(
		IWebRequest $request,
		DeleteSongParamsValidator $validator,
		ISongModule $module
	)
	{
		try
		{
			$song = $validator->validate($request->getParams());
		}
		catch (\Exception $exception)
		{
			return json_encode([
				'result' 	=> false,
				'message' 	=> $exception->getMessage()
			]);
		}
		
		$result = $module->delete($song);
		
		return json_encode([
			'result' 	=> $result,
			'message' 	=> $result ? 'Success' : 'Failed to delete song'
		]);
	}
}