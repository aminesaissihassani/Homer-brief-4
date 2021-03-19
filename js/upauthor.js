
	var fileup=document.querySelector("#upload");
	const img = document.querySelector("#addpc");
	function upld() {
		fileup.click();
	}

	function uj() {
		img.src = URL.createObjectURL(event.target.files[0]);
		
	}

	
	function validation(){
		
		var athorname = document.authorform.athorname.value;
		var dat = document.authorform.bithd.value;
		var file=document.authorform.apic;
		if(athorname=="" || dat==""){
			event.preventDefault();
			alert(" author's informations required ");
		}
		if(file.files.length == 0){
			event.preventDefault();
			alert("choose a image please");
		}
	}