<?php
namespace CloudyPlanet\Web\Controllers;


class NotFoundController
{
	public function notFound()
	{
		return file_get_contents(__DIR__ . '/../Views/404.html');
	}
}