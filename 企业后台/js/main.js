function showarr(){
	var a=1;
	var x=document.getElementsByClassName("sidebar-a-son");
	if(x[0].style.display=="block"){
		x[0].style.display="none";
		x[1].style.display="none";
		x[2].style.display="none";
	}else{
		x[0].style.display="block";
		x[1].style.display="block";
		x[2].style.display="block";
	}
}

function showkb(){
	var a=1;
	var x=document.getElementsByClassName("sidebar-a-son");
	if(x[3].style.display=="block"){
		x[3].style.display="none";
		x[4].style.display="none";
		x[5].style.display="none";
		x[6].style.display="none";
		x[7].style.display="none";
	}else{
		x[3].style.display="block";
		x[4].style.display="block";
		x[5].style.display="block";
		x[6].style.display="block";
		x[7].style.display="block";
	}
}



function changecolor(obj){
	
	if(obj.style.background==""){
		obj.style.background="rgb(220,220,220)";
	}
	else{
		obj.style.background="";
	}
}	