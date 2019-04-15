namespace('CloudyPlanet.Modules', function (root)
{
    var Module = root.Oyster.Module;


    function SongModule () { classify(this); }
    inherit(SongModule, Module);


    SongModule.moduleName = 'Song';


    SongModule.prototype._openFormModal = function ()
    {
        $('#formModal').modal('show');
    };

    SongModule.prototype._populateFormModal = function (id)
    {
        var object = this._params.songs[id];
        
        if (is.false(object))
        {
            // handle
            return;
        }
        
        $('#songId').val(object.ID);
        $('#songName').val(object.Name);
        $('#songArtist').val(object.Artist);
        
        // tags
    };

    SongModule.prototype._clearFormModal = function ()
    {
        $('#songId').val('');
        $('#songName').val('');
        $('#songArtist').val('');

        // tags
    };

    SongModule.prototype._onFormSubmit = function ()
    {
        // validate
        // make the request
    };

    SongModule.prototype._isFormValid = function ()
    {
        var name = $('#songName').val();
        var artist = $('#songArtist').val();
    };


    SongModule.prototype.onNew = function () 
    {
        this._clearFormModal();
        this._openFormModal();
    };

    SongModule.prototype.onEdit = function (event)
    {
        var id = $(event.target).data('id');
        this._populateFormModal(id);
        this._openFormModal();
    };

    SongModule.prototype.onDelete = function (event)
    {
        var id = $(event.target).data('id');
        
        bootbox.confirm("Are you sure you want to delete this song?", function (result)
        {
            if (result)
            {
                $.ajax(
                    '/music-catalog/songs/delete',
                    {
                        method: 'POST',
                        data: {id: id},
                        
                        success: function (response) 
                        {
                            if (!response.result)
                            {
                                bootbox.alert(response.message);
                            }
                        },
                        
                        error: function (obj, textStatus, errorThrown) 
                        {
                            bootbox.alert("Error occurred: " + textStatus + " " + errorThrown);
                        }
                    }
                );
            }
        });
    };


    this.SongModule = SongModule;
});