namespace('CloudyPlanet.Actions.MusicCatalog', function (root)
{
    var Action 	= root.Oyster.Action;


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
        this.modules('View').render('music-catalog', 'loading');
        $.get(
            {
                url: '/api/music-catalog/songs',
                success: this._renderContent
            }
        );
    };


    this.SongsAction = SongsAction;
});