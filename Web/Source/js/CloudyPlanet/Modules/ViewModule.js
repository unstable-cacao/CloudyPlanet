namespace('CloudyPlanet.Modules', function (root)
{
    var Module = root.Oyster.Module;


    function ViewModule () { classify(this); }
    inherit(ViewModule, Module);


    ViewModule.moduleName = 'View';

    
    
    
    ViewModule.prototype.getHtml = function(folder, name, data)
    {
        var obj = Views[folder]({data: data});
        
        obj.render = function (selector)
        {
            $(selector).empty().append(obj);
        };
        
        return obj;
    };

    ViewModule.prototype.render = function(folder, name, data)
    {
        if (is(name))
        {
            if (!is(Views[folder][name]))
            {
                console.error(`Could not find template ${folder}/${name}!`);
            }

            $('main').empty().append(Views[folder][name]({data: data}));
        }
        else
        {
            if (!is(Views[folder]))
            {
                console.error(`Could not find template ${folder}!`);
            }

            $('main').empty().append(Views[folder]({data: data}));
        }
    };


    this.ViewModule = ViewModule;
});