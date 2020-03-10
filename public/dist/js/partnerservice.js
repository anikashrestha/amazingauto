$(document).ready(function(){



    var currentItem = 0;
        $('#btnPartnerServiceAdd').click(function () {
            currentItem++;

            var tr = '<tr>' +
                '<td><input type="text" name="title[' + currentItem + ']" id="js-input-title' + currentItem + '" class="form-control"></td>' +
                '<td><input type="file" name="image[' + currentItem + ']" id="js-input-image' + currentItem + '" class="form-control" multiple></td>' +

                '<td style="text-align:center;"><a href="#" class="btn btn-danger" id="btnPartnerServiceSub" >X</a></td>' +
                +'</tr>';
                $('#js-input-title'+currentItem).attr('required', true);
                $('#js-input-image'+currentItem).attr('required', true);
            $('.partnerservice-body').append(tr);


        });



    $('.partnerservice-body').on('click','#btnPartnerServiceSub',function(){
        var tblBody = $('#partnerservice');
        if (tblBody.find('tr').siblings().length > 2){
        $(this).parent().parent().remove();
        }
        });

    });
