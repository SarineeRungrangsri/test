$(function(){
    var cartypeObject = $('#car_type');
    var carObject = $('#car');
    // var districtObject = $('#district');

    // on change cartypes
    cartypeObject.on('change', function(){
        var cartypeId = $(this).val();

        carObject.html('<option value="">เลือกป้ายทะเบียนรถ</option>');
        // districtObject.html('<option value="">เลือกตำบล</option>');

        $.get('get_car.php?cartype_id=' + cartypeId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                carObject.append(
                    $('<option></option>').val(item.car_id).html(item.car_name)
                );
            });
        });
    });

    // on change amphure
    // amphureObject.on('change', function(){
    //     var amphureId = $(this).val();

    //     districtObject.html('<option value="">เลือกตำบล</option>');
        
    //     $.get('get_district.php?amphure_id=' + amphureId, function(data){
    //         var result = JSON.parse(data);
    //         $.each(result, function(index, item){
    //             districtObject.append(
    //                 $('<option></option>').val(item.id).html(item.name_th)
    //             );
    //         });
    //     });
    // });
});