/**
 * Created by emilychen on 24/11/2015.
 */
$(document).ready(function()
{
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
});