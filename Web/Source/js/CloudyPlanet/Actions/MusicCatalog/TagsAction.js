namespace('CloudyPlanet.Actions.MusicCatalog', function (root)
{
    var Action 	= root.Oyster.Action;


    function TagsAction() { Action.call(this); }
    inherit(TagsAction, Action);


    TagsAction.prototype._renderContent = function (data)
    {
        data = JSON.parse(data);

        if (is.empty(data))
        {
            this.modules('View').render('music-catalog', 'tags-empty');
        }
        else
        {
            this.modules('View').render('music-catalog', 'tags', data);
        }
    };


    TagsAction.prototype.activate = function ()
    {
        this.modules('View').render('music-catalog', 'loading');
        $.get(
            {
                url: '/api/music-catalog/tags',
                success: this._renderContent
            }
        );
    };


    this.TagsAction = TagsAction;
});