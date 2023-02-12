$(document).ready(function() {
    var totalRecord = 0;
	var car_availability = getCheckboxValues('car_availability');
	var location = getCheckboxValues('location');
    var car_type = getCheckboxValues('car_type');
    var car_seat_capacity = getCheckboxValues('car_seat_capacity');
    var car_transmission = getCheckboxValues('car_transmission');
    var totalData = $("#totalRecords").val();
	var sorting = getCheckboxValues('sorting');
	$.ajax({
		type: 'POST',
		url : "load-cars-admin.php",
		dataType: "json",			
		data:{totalRecord:totalRecord, car_type:car_type, car_seat_capacity:car_seat_capacity, car_transmission:car_transmission, location:location, car_availability:car_availability, sorting:sorting},
		success: function (data) {
			$("#results-admin").append(data.products);
			totalRecord++;
		}
	});	
    $(window).scroll(function() {
		scrollHeight = parseInt($(window).scrollTop() + $(window).height());		
        if(scrollHeight == $(document).height()){	
            if(totalRecord <= totalData){
                loading = true;
                $('.loader').show();                
				$.ajax({
					type: 'POST',
					url : "load-cars-admin.php",
					dataType: "json",			
					data:{totalRecord:totalRecord, car_type:car_type, car_seat_capacity:car_seat_capacity, car_transmission:car_transmission, location:location, car_availability:car_availability},
					success: function (data) {
						$("#results-admin").append(data.products);
						$('.loader').hide();
						totalRecord++;
					}
				});
            }            
        }
    });
	
    function getCheckboxValues(checkboxClass){
        var values = new Array();
		$("."+checkboxClass+":checked").each(function() {
		   values.push($(this).val());
		});
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
	$(document).on('click', 'label', function() {
		if($('input:checkbox:checked')) {
			$('input:checkbox:checked', this).closest('label').addClass('active');
		}
	});	
});