namespace('CloudyPlanet.Actions', function (root)
{
    var Action 	= root.Oyster.Action;


    function IndexAction() { Action.call(this); }
    inherit(IndexAction, Action);


    IndexAction.prototype.activate = function ()
    {
        this.modules('View').render('main');
    };


    this.IndexAction = IndexAction;
});