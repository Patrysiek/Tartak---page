function validation() {
	var imie = document.forms['myForm']['imie'].value;
	var telefon = document.forms['myForm']['telefon'].value;
	var email = document.forms['myForm']['email'].value;
    var tresc = document.forms['myForm']['tresc'].value;
    var tresc2 = String(tresc);
	var x = 1;
	var email_reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
	var imie_reg = /([A-Za-z])/;
	if(imie == ""|| imie_reg.test(imie) == false ){
		
		document.getElementById("name_failure").innerHTML="<br/>Wprowadź poprawne imie";
		x = 0;
	}
	if(email == "" || email_reg.test(email) == false ){
		
		document.getElementById("email_failure").innerHTML="<br/>Wprowadź poprawny email";
		x = 0;
	}
    if(isNaN(telefon)){
		
		document.getElementById("phone_failure").innerHTML="<br/>Wprowadz poprawny numer telefonu";
		x = 0;
	}
        if(tresc2.length<8){
		
		document.getElementById("message_failure").innerHTML="Tresc powinna zawierac conajmniej 8 znaków<br/>";
		x = 0;
	}
	
	if(x==0){
		return false;
		}
	else{
		return true;
	}
}