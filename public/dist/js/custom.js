
$(document).ready(function(){


    $('#js-input-quick_links_name').attr('required',true);
    $('#js-input-quick_links').attr('required',true);
    $('#js-input-useful_links_name').attr('required',true);
    $('#js-input-useful_links').attr('required',true);
    
var count = 1;
$('#btnQuickAdd').on('click', function () {
    
    count++;
    var tblBody = $('#tbl_quick_links');
    var row_to_clone = tblBody.find('tr').last();
    var row_name = row_to_clone.find('input').attr('name');

    //Find the position- its in between two square brackets
    var braces_start = row_name.indexOf('[');
    var braces_end = row_name.indexOf(']');
    var list_position = row_name.slice(braces_start + 1, braces_end);
    //Clone a textfield and append it to the table
    //clone() has parameters to register events
    var row_cloned = row_to_clone.clone(true, true).appendTo(tblBody);
    console.log("list "+list_position);

    //Clear the new textfield created
    row_cloned.find('input').val('');
    //Set new name for each added rows
    var new_list_position = parseInt(list_position) + parseInt("1");

    console.log("new"+new_list_position);

    row_cloned.find('td').each(function () {
        var name = $(this).find('input').attr('name');
        $('#js-input-quick_links_name'+count).attr('required',true);
        $('#js-input-quick_links'+count).attr('required',true);
        $(this).find('input').attr('required', true);
        
        $(this).find('input').attr('name', name.replace('[' + list_position + ']', '[' + new_list_position + ']'));
        
    });
});

$('#tbl_quick_links').on('click','#btnQuickSub',function(){
    var tblBody = $('#tbl_quick_links');
    if (tblBody.find('tr').siblings().length > 1){
    $(this).parent().parent().remove();
    }
    });




$('#btnUsefulAdd').on('click', function () {
    
    count++;
    var tblBody = $('#tbl_useful_links');
    var row_to_clone = tblBody.find('tr').last();
    var row_name = row_to_clone.find('input').attr('name');

    //Find the position- its in between two square brackets
    var braces_start = row_name.indexOf('[');
    var braces_end = row_name.indexOf(']');
    var list_position = row_name.slice(braces_start + 1, braces_end);
    //Clone a textfield and append it to the table
    //clone() has parameters to register events
    var row_cloned = row_to_clone.clone(true, true).appendTo(tblBody);
    console.log("list "+list_position);

    //Clear the new textfield created
    row_cloned.find('input').val('');
    //Set new name for each added rows
    var new_list_position = parseInt(list_position) + parseInt("1");

    console.log("new"+new_list_position);

    row_cloned.find('td').each(function () {
        var name = $(this).find('input').attr('name');
        $('#js-input-useful_links_name'+count).attr('required',true);
        $('#js-input-useful_links'+count).attr('required',true);
        $(this).find('input').attr('required', true);
        
        $(this).find('input').attr('name', name.replace('[' + list_position + ']', '[' + new_list_position + ']'));
        
    });
});

$('#tbl_useful_links').on('click','#btnUsefulSub',function(){
    var tblBody = $('#tbl_useful_links');
    if (tblBody.find('tr').siblings().length > 1){
    $(this).parent().parent().remove();
    }
    });



    $('#btnSocialAdd').on('click', function () {
    
        count++;
        var tblBody = $('#tbl_social_links');
        var row_to_clone = tblBody.find('tr').last();
        var row_name = row_to_clone.find('input').attr('name');
    
        //Find the position- its in between two square brackets
        var braces_start = row_name.indexOf('[');
        var braces_end = row_name.indexOf(']');
        var list_position = row_name.slice(braces_start + 1, braces_end);
        //Clone a textfield and append it to the table
        //clone() has parameters to register events
        var row_cloned = row_to_clone.clone(true, true).appendTo(tblBody);
    
        //Clear the new textfield created
        row_cloned.find('input').val('');
        //Set new name for each added rows
        var new_list_position = parseInt(list_position) + parseInt("0");
    
        row_cloned.find('td').each(function () {
            var name = $(this).find('input').attr('name');
            $('#js-input-social_links'+count).attr('required',true);
            $('#js-input-social_icon'+count).attr('required',true);
            $(this).find('input').attr('required', true);
            
            $(this).find('input').attr('name', name.replace('[' + list_position + ']', '[' + new_list_position + ']'));
            
        });
    });
    
    $('#tbl_social_links').on('click','#btnSocialSub',function(){
        var tblBody = $('#tbl_social_links');
        if (tblBody.find('tr').siblings().length > 1){
        $(this).parent().parent().remove();
        }
        });



        $('#btnContactAdd').on('click', function () {
    
            count++;
            var tblBody = $('#tbl_contact_links');
            var row_to_clone = tblBody.find('tr').last();
            var row_name = row_to_clone.find('input').attr('name');
        
            //Find the position- its in between two square brackets
            var braces_start = row_name.indexOf('[');
            var braces_end = row_name.indexOf(']');
            var list_position = row_name.slice(braces_start + 1, braces_end);
            //Clone a textfield and append it to the table
            //clone() has parameters to register events
            var row_cloned = row_to_clone.clone(true, true).appendTo(tblBody);
        
            //Clear the new textfield created
            row_cloned.find('input').val('');
            //Set new name for each added rows
            var new_list_position = parseInt(list_position) + parseInt("0");
        
            row_cloned.find('td').each(function () {
                var name = $(this).find('input').attr('name');
                $('#js-input-contact_info'+count).attr('required',true);
            
                $(this).find('input').attr('required', true);
                
                $(this).find('input').attr('name', name.replace('[' + list_position + ']', '[' + new_list_position + ']'));
                
            });
        });
        
        $('#tbl_contact_links').on('click','#btnContactSub',function(){
            var tblBody = $('#tbl_contact_links');
            if (tblBody.find('tr').siblings().length > 1){
            $(this).parent().parent().remove();
            }
            });
    




    $('#js-input-heading').attr('required', true);
    $('#js-input-text').attr('required', true);
    
    
    
    
    });


