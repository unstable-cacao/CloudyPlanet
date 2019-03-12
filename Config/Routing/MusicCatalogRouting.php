<?php

return [
	'controller'    => \CloudyPlanet\Web\Controllers\NotFoundController::class,
	'action'        => 'notFound',
	
	
	// try to match one of the children
	'include' =>
	[
		[
			'ajax' => false,
			
			'require' =>
			[
				// Index action
				[
					"controller"    => \CloudyPlanet\Web\Controllers\IndexController::class,
					"action"        => 'index'
				],
			]
		],
		
		
		// All ajax requests
		[
			'ajax' => true,
			
			'require' =>
			[
				// Music catalog actions
				[
					"route"         => "music-catalog/songs",
					"method"        => "GET",
					"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\SongController::class,
					"action"        => 'index',
					
					'include' 		=> 
					[
						[
							"route"         => "new",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\SongController::class,
							"action"        => 'newSong'
						],
						[
							"route"         => "edit",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\SongController::class,
							"action"        => 'editSong'
						],
						[
							"route"         => "delete",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\SongController::class,
							"action"        => 'deleteSong'
						]
					]
				],
				[
					"route"         => "music-catalog/tags",
					"method"        => "GET",
					"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\TagController::class,
					"action"        => 'index',
					
					'include' 		=>
					[
						[
							"route"         => "new",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\TagController::class,
							"action"        => 'newTag'
						],
						[
							"route"         => "edit",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\TagController::class,
							"action"        => 'editTag'
						],
						[
							"route"         => "delete",
							"method"        => "POST",
							"controller"    => \CloudyPlanet\Web\Controllers\MusicCatalog\TagController::class,
							"action"        => 'deleteTag'
						]
					]
				]
			]
		]
	]
];