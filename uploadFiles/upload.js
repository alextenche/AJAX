var handleUpload = function(event){
	event.preventDefault();
	event.stopPropagation();

	var fileInput = document.getElementById('file');

	var data = new FormData();

	data.append('ajax', true);


	for(var i = 0; i < fileInput.files.length; ++i){
		data.append('file[]', fileInput.files[i]);
	}

	var request = new XMLHttpRequest();

	request.upload.addEventListener('progress',function(event){
		if(event.lengthComputable){
			var percent = event.loaded/event.total;
			var progress = document.getElementById('upload_progress');

			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}

			progress.appendChild(document.createTextNode(Math.round(percent*100)+'%'));
		}
	});

	request.upload.addEventListener('load', function(event){
		document.getElementById('upload_progress').style.display = 'block'; // was none
	});

	request.upload.addEventListener('error', function(event){
		alert('upload failed');
	});

	request.addEventListener('readystatechange', function(){
		// readyState == 4 - completed
		if(this.readyState == 4){
			// status == 200 - ok
			if(this.status == 200){
				var links = document.getElementById('message');

				console.log('response: ' + this.response);
				var uploaded = eval(this.response);
				var div,a;

				for (var i = 0; i < uploaded.length; i++) {
					div = document.createElement('div');
					a = document.createElement('a');

					a.setAttribute('href', 'files/' + uploaded[i]);
					a.appendChild(document.createTextNode(uploaded[i]));

					div.appendChild(a);
					links.appendChild(div);
				}

			} else {
				console.log('Server replied with HTTP status: ' + this.status);
			}
		}
	});

	request.open('POST', 'upload.php');
	request.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_progress').style.display = 'block';

	request.send(data);

}


window.addEventListener('load', function(event){

	if(typeof FormData == 'undefined'){alert('broblem!')}
	var submit = document.getElementById('submit');

	submit.addEventListener('click', handleUpload);
	


});

