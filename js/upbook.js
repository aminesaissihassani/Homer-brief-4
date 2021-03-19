

	var fileup=document.querySelector("#upload");
	const img = document.querySelector("#addpc");
	function upld() {
		fileup.click();
	}

	function uj() {
		img.src = URL.createObjectURL(event.target.files[0]);
		
	}

	show();
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
function show(){
	
	
	var isChecked=document.getElementById('nameAth');
	isChecked.value ='';
    var elems= document.querySelectorAll('input[type="checkbox"]:checked');
                for (var i=0;i<elems.length;i++)
                {
                     isChecked.value +=elems[i].id+' / ';
					 
              
                    
                }
            
               
}

function validation(){
	// alert("done");
var boktit = document.bookform.booktit.value;
var price = document.bookform.bookprice.value;
var dat = document.bookform.prodate.value;
var auth=document.querySelector('input[name="author[]"]:checked');
if(boktit=="" || price=="" || dat==""){
	event.preventDefault();
	alert("book information required ");
}
if(auth == null) { 
	event.preventDefault();
		 alert('author required');
} 
}