$(document).ready(function()
{

    $('#basic').on('show.bs.modal', function(e) {

        var fileid = $(e.relatedTarget).data('id');
        $("#filename").val( fileid );

    });

    $("#deletebutton").click(function()
    {
        var fileid =$("#filename").val();
        var galleryid = $("#filename").data('name');
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        var url_path =base_url+'/gallery/delete/'+galleryid+'/'+fileid;

        $.ajax
        ({
            type: "POST",
            url: url_path,
            data:{},
            cache: false,
            success: function(data)
            {
                $('#basic').modal('hide')
                location.reload();
            }
        });

    });

});
