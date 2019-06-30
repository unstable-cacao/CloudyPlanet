namespace('CloudyPlanet.Actions.MusicCatalog', function (root)
{
    var Action 	= root.Oyster.Action;
    var MusicCatalog = root.CloudyPlanet.Components.MusicCatalog;


    function SongsAction() { Action.call(this); }
    inherit(SongsAction, Action);


    SongsAction.prototype._renderContent = function (data)
    {
        data = JSON.parse(data);
        
        if (is.empty(data))
        {
            this.modules('View').render('music-catalog', 'songs-empty');
        }
        else
        {
            this.modules('View').render('music-catalog', 'songs', data);
        }
    };


    SongsAction.prototype.activate = function ()
    {
        this._catalog = this.component(MusicCatalog);
        
        this.modules('View').render('music-catalog', 'loading');
        $.get(
            {
                url: '/api/music-catalog/songs',
                success: (data) => { this._catalog.setData(data); }
            }
        );
    };


    this.SongsAction = SongsAction;
});