namespace('CloudyPlanet.Actions', function (root)
{
    var Action 	= root.Oyster.Action;


    function MusicCatalogAction() { Action.call(this); }
    inherit(MusicCatalogAction, Action);


    MusicCatalogAction.prototype.activate = function ()
    {
        this.modules('View').render('music-catalog');
    };


    this.MusicCatalogAction = MusicCatalogAction;
});