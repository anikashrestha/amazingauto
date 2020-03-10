$(document).ready(function () {


    var currentItem = 1;
    $('#addPartnerProductRow').click(function () {
        currentItem++;

        var tr = '<tr>' +
        '<td><input type="text" name="heading[' + currentItem + ']" id="js-input-branch_name' + currentItem + '" class="form-control"></td>' +
        '<td><textarea name="text[' + currentItem + ']" id="js-input-text' + currentItem + '" class="form-control"></textarea></td>' +
        '<td><input type="file" name="file[' + currentItem + ']" id="js-input-file' + currentItem + '" class="form-control" multiple></td>' +
        '<td><input type="file" name="logo[' + currentItem + ']" id="js-input-logo' + currentItem + '" class="form-control" multiple></td>' +
        '<td style="text-align:center;"><a href="javascript:void()" class="btn btn-danger" id="removePartnerProductRow" >X</a></td>' +
        +'</tr>';
        $('#js-input-heading'+currentItem).attr('required', true);
        $('#js-input-text'+currentItem).attr('required', true);
    $('.partnerproduct-body').append(tr);


    });


    $('.partnerproduct-body').on('click','#removePartnerProductRow',function(){
        var tblBody = $('#tbl_partnerproduct');
        if (tblBody.find('tr').siblings().length > 1){
            $(this).parent().parent().remove();
        }
        });




    });


