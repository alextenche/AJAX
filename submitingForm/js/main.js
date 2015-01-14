$('form.ajax').on('submit', function(){

	var url = $(this).attr('action'),
		method = $(this).attr('method'),
		data = {};

	$(this).find('[name]').each(function(index, value){
		var name = $(this).attr('name'),
			value = $(this).val();

		data[name] = value;
		
	});
	

	$.ajax({
		url: url,
		type: method,
		data: data,
		success: function(response){
			console.log(response);
		}
	});

	return false;
});