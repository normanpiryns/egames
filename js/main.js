$(document).ready(function(){

function checkNum(string){
	let re = /[0-9]/;
	flag = 0;
	for(let i=0;i<string.length;i++){
		if(re.exec(string[i])){
			flag = 1;
		}
	}
	if (flag == 1) {
		return true;
	} else {
		return false;
	}
}

function checkSymbol(string){
	let re = /^[a-zA-Z0-9ÁÀÂÉÈÊÍÌÎÚÙÛáàâîíìêéèóòôúùûç]*$/;
	flag = 0;
	for(let i=0;i<string.length;i++){
		if(!re.exec(string[i])){
			flag = 1;
		}
	}
	if (flag == 1) {
		return true;
	} else {
		return false;
	}
}

function checkMaj(string){
	let re = /[A-Z]/;
	flag = 0;
	for(let i=0;i<string.length;i++){
		if(re.exec(string[i])){
			flag = 1;
		}
	}
	if (flag == 1) {
		return true;
	} else {
		return false;
	}
}

$("#submit-button").on('click',function(){
	$(".e").hide();
	let loginfield = $("#login-field").val();
	let passwordfield = $("#password-field").val();
	let url = $("#form-add").attr("action");
	// Check coté client
	if (loginfield == '' || passwordfield == '') {
		$(".error-1").toggle();
		return;
	}
	if (checkSymbol(loginfield)) {
		$(".error-3").toggle();
		return;
	}
	if(!checkMaj(passwordfield)){
		$(".error-4").toggle();
		return;
	}
	if(!checkNum(passwordfield)){
		$(".error-5").toggle();
		return;
	}
	$.ajax({
		type: "POST",
		data: {'login' : loginfield,
			  'mdp' : passwordfield},
		url: url,
		success: function(data) {
      		// Check coté PHP
			data = JSON.parse(data);
			if (data == 'error-1') {
	      		$(".e").hide();
	      		$(".error-1").toggle();
	      		return;
	      	}	
			if (data == 'error-2') {
				$(".e").hide();
				$(".error-2").toggle();
	      		return;
	      	}	
			if (data == 'error-3') {
				$(".e").hide();
				$(".error-3").toggle();
	      		return;
	      	}	
			if (data == 'error-4') {
				$(".e").hide();
				$(".error-4").toggle();
	      		return;
	      	}	
			if (data == 'error-5') {
				$(".e").hide();
				$(".error-5").toggle();
	      		return;
	      	}	
	      	window.location.href = "/egames/View/admin.php?success=1";
		},
		error: function(response) { alert("Erreur AJAX");}

	});
});






});