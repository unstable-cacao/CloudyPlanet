<html>
	<head>
        <link rel="stylesheet" href="/resources/app.css">
	</head>
	
	<body style="margin: auto; min-height: 100vh">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                        <a class="navbar-brand" href="/">Cloudy Planet</a>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="MusicCatalogMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Music Catalog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="MusicCatalogMenu">
                                    <a class="dropdown-item" href="/music-catalog/songs">Songs</a>
                                    <a class="dropdown-item" href="/music-catalog/tags">Tags</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="row">
                <main class="col">
    
                </main>
            </div>
        </div>
		
		<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
		<script src="/resources/bootstrap.min.js"></script>
		<script src="/resources/bootstrap.bundle.min.js"></script>
		<script src="/resources/bootbox.min.js"></script>
		<script src="/resources/handlebars-v4.0.12.js"></script>
		<script src="/resources/templates.js"></script>
		<script src="/resources/main.js?<?= filemtime(__DIR__ . '/resources/main.js'); ?>"></script>
		
		<script>
			CloudyPlanet.Boot();
		</script>
	</body>
</html>