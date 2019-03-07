namespace('CloudyPlanet.Config', function (root)
{
    var RootAction  	    = root.CloudyPlanet.Actions.RootAction;
    var MusicCatalogAction	= root.CloudyPlanet.Actions.MusicCatalogAction;
    var NotFoundAction	    = root.CloudyPlanet.Actions.NotFoundAction;


    this.Routing = {
        _:
        {
            action: RootAction
        },
        
        404:
        {
            $:
                {
                    path: '404',
                    action: NotFoundAction
                }
        },
        
        MusicCatalog:
        {
            $:
                {
                    path: 'music-catalog',
                    action: MusicCatalogAction
                }
        }
    };
});