function choose(x){
	
	if(x == 'l')
	{
		document.getElementById("group2").style.background = 'grey';
		document.getElementById("group1").style.background = 'lightgreen';
		document.getElementById("login").style.display = 'block';
		document.getElementById("signup").style.display = 'none';
	}
	else
	{	
		document.getElementById("group1").style.background = 'grey';
		document.getElementById("group2").style.background = 'lightgreen';
		document.getElementById("login").style.display = 'none';
		document.getElementById("signup").style.display = 'block';
	}
}

function pass(a){

	if(a == 'o'){
		document.getElementById("Oeye").style.display = 'none';
		document.getElementById("Ceye").style.display = 'block';
		document.getElementById("signupinput").type = "text";
	}
	else
	{
		document.getElementById("Oeye").style.display = 'block';
		document.getElementById("Ceye").style.display = 'none';
		document.getElementById("signupinput").type = "password";
	}
}
