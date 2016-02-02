$(document).ready(function(){

	//listen for a change
	$('#cities').change(function(){

		//get the id of the choosn city
		var cityID = $(this).val();

		//basic validation
		if(cityID == '') {return;}

		//AJAX
		$.ajax({
			url: "api/cities_and_suburbs.php",
			data: {
				city: cityID
			},
			success: function(dataFromServer){
				console.log(dataFromServer);

				//clear results from the suburbs select element
				$('#suburbs').html('');

				for (var i = 0; i < dataFromServer.length; i++) {
					$('#suburbs').append('<option value="'+dataFromServer[i].suburbID+'">'+dataFromServer[i].suburbName+'</option>');
				};
			},
			error: function() {
				alert('wrong');
			}
		});
	});
});