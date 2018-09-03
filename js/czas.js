/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function zegar()
	{
		var zegar1 = new Date();
		
		var godzina = zegar1.getHours();
		if (godzina<10) godzina = "0"+godzina;
		
		var minuta = zegar1.getMinutes();
		if (minuta<10) minuta = "0"+minuta;
		
		var sekunda = zegar1.getSeconds();
		if (sekunda<10) sekunda = "0"+sekunda;
		
		document.getElementById("clock1").innerHTML = godzina+":"+minuta+"."+sekunda;
		 
		 setTimeout("zegar()",1000);
	}

