	var fileup=document.querySelector("#upload");
	const img = document.querySelector("#addpc");
	function upld() {
		fileup.click();
	}

	function uj() {
		img.src = URL.createObjectURL(event.target.files[0]);
		
	}
   // slide checkbox list 
	var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

// show checked checkbox
function show(){
	
	
	var isChecked=document.getElementById('nameAth');
	isChecked.value ='';
    var elems= document.querySelectorAll('input[type="checkbox"]:checked');
                for (var i=0;i<elems.length;i++)
                {
                     isChecked.value +=elems[i].id+',';
					 
              
                    
                }
               
}
// Form validation
	function validation(){

		var boktit = document.bookform.booktit.value;
		var price = document.bookform.bookprice.value;
		var dat = document.bookform.prodate.value;
		var file=document.bookform.flup;
		var auth=document.querySelector('input[name="author[]"]:checked');
		if(boktit=="" || price=="" || dat==""){
			event.preventDefault();
			alert(" BOOK S INFORMATIONS REQUIERED ");
		}
		if(file.files.length == 0){
			event.preventDefault();
			alert("choose a image please");
		}
		if(auth == null) { 
			event.preventDefault();
				 alert('BOOK S AUTHORS REQUIRED');
		} 
	}