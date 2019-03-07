<?php

$this->set(\CloudyPlanet\Base\DAO\ISongDAO::class, \CloudyPlanet\DAO\MusicCatalog\SongDAO::class);
$this->set(\CloudyPlanet\Base\DAO\ITagDAO::class, \CloudyPlanet\DAO\MusicCatalog\TagDAO::class);