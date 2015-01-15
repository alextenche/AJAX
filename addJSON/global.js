$('#add').on('submit', function(){
	var contents = $(this).serialize();

	$.ajax({
		url: 'add.php',
		dataType: 'json',
		type: 'post',
		data: contents,
		success: function(data){
			if(data.success){
				alert('The result is ' + data.result);
			}
		}
	});
	return false;
});

