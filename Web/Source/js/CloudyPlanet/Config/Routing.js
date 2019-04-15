namespace('CloudyPlanet.Config', function (root)
{
    var RootAction  	    = root.CloudyPlanet.Actions.RootAction;
    var IndexAction  	    = root.CloudyPlanet.Actions.IndexAction;
    var SongsAction	        = root.CloudyPlanet.Actions.MusicCatalog.SongsAction;
    var TagsAction	        = root.CloudyPlanet.Actions.MusicCatalog.TagsAction;
    var NotFoundAction	    = root.CloudyPlanet.Actions.NotFoundAction;


    this.Routing = {
        _:
        {
            action: RootAction
        },

        $:
        {
            action: IndexAction
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
                action: NotFoundAction
            },
            
            Songs:
            {
                $:
                {
                    path: 'songs',
                    action: SongsAction
                },
            },
            
            Tags:
            {
                $:
                {
                    path: 'tags',
                    action: TagsAction
                },
            }
        }
    };
});