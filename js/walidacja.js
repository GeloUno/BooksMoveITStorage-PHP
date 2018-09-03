function zapisz()
{
    ///---- zapis do localStorage

    var miastoSave = document.getElementById('miasto').value;
    sessionStorage.setItem('miasto', miastoSave);
    
    var kodSave = document.getElementById('kod_pocztowy').value;
    sessionStorage.setItem('kod_pocztowy', kodSave);
    
    var ulicaSave = document.getElementById('ulica').value;
    sessionStorage.setItem('ulica', ulicaSave);
    
    var nrmSave = document.getElementById('numer_domu').value;
    sessionStorage.setItem('numer_domu', nrmSave);
    
    var nrdSave = document.getElementById('numer_mieszkania').value;
    sessionStorage.setItem('numer_mieszkania', nrdSave);
    
    var nipSave = document.getElementById('nip').value;
    sessionStorage.setItem('nip', nipSave); 

//alert("Allo");	
    

}

function load()
{

    var miastoLoad = sessionStorage.getItem('miasto');
    if (miastoLoad) {
        document.getElementById('miasto').value = miastoLoad;
    }
    
    var kodLoad = sessionStorage.getItem('kod_pocztowy');
    if (kodLoad) {
        document.getElementById('kod_pocztowy').value = kodLoad;
    }
    var ulLoad = sessionStorage.getItem('ulica');
    if (ulLoad) {
        document.getElementById('ulica').value = ulLoad;
    }
    var nrdLoad = sessionStorage.getItem('numer_domu');
    if (nrdLoad) {
        document.getElementById('numer_domu').value = nrdLoad;
    }
    var nrmLoad = sessionStorage.getItem('numer_mieszkania');
    if (nrmLoad) {
        document.getElementById('numer_mieszkania').value = nrmLoad;
    }
    var nipLoad = sessionStorage.getItem('nip');
    if (nipLoad) {
        document.getElementById('nip').value = nipLoad;
    }
}
/* var mailLoad = localStorage.getItem('email');
 if (mailLoad)
 {
 document.getElementById('email').value = mailLoad;
 }*/

function czysc()
{
    ///---- czyszczenie localStorage

    //document.getElementById('nazw').value = '';
    localStorage.removeItem('Miasto');
    // document.getElementById('email').value='';
    localStorage.removeItem('email');
}


function sprawdzPole(pole_id, obiektRegex) {
    var obiektPole = document.getElementById(pole_id);
    if (!obiektRegex.test(obiektPole.value))
        return (false);
    else
        return (true);
}
function sprawdz()
{
    var ok = true;
    obiektMiasto = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\s]{2,20}$/;
    // obiektemail = /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
    obiektUlica = /[\w\s]{3,40}$/;
    //  obiektTresc = /^[\w\s]{4,500}$/;
    obiektKodPocztowy = /^[0-9]{5}$/;
    obiektNip = /^[0-9]{0,11}$/;
    obiektNumerD = /^[0-9]{1,9}$/;
    obiektNumerM = /^[0-9]{0,9}$/;


    if (!sprawdzPole("miasto", obiektMiasto))
    {
        ok = false;

        document.getElementById("miasto_error").style.color = "#ff0000";
    } else {
        document.getElementById("miasto_error").style.color = "";
    }


    if (!sprawdzPole("kod_pocztowy", obiektKodPocztowy))
    {
        ok = false;
        document.getElementById("kod_pocztowy_error").style.color = "#ff0000";
        //  "WPISZ TEMAT !!!";
    } else {
        document.getElementById("kod_pocztowy_error").style.color = "";
    }


    if (!sprawdzPole("ulica", obiektUlica))
    {
        ok = false;
        document.getElementById("ulica_error").style.color = "#ff0000";
    } else {
        document.getElementById("ulica_error").style.color = "";//.innerHTML = "";
    }


    if (!sprawdzPole("numer_domu", obiektNumerD))
    {
        ok = false;
        document.getElementById("numer_domu_error").style.color = "#ff0000";
    } else {
        document.getElementById("numer_domu_error").style.color = "";
    }


    if (!sprawdzPole("numer_mieszkania", obiektNumerM))
    {
        ok = false;
        document.getElementById("numer_mieszkania_error").style.color = "#ff0000";
    } else {
        document.getElementById("numer_mieszkania_error").style.color = "";
    }

    if (!sprawdzPole("nip", obiektNip))
    {
        ok = false;
        document.getElementById("nip_error").style.color = "#ff0000";
        //  "WPISZ TEMAT !!!";
    } else {
        document.getElementById("nip_error").style.color = "";
    }
    // alert(ok);
    zapisz();
    return ok;

}
/*
function zegar()
{
    var zegar1 = new Date();

    var godzina = zegar1.getHours();
    if (godzina < 10)
        godzina = "0" + godzina;

    var minuta = zegar1.getMinutes();
    if (minuta < 10)
        minuta = "0" + minuta;

    var sekunda = zegar1.getSeconds();
    if (sekunda < 10)
        sekunda = "0" + sekunda;

    document.getElementById("clock1").innerHTML = godzina + ":" + minuta + "." + sekunda;

    setTimeout("zegar()", 1000);
}
*/

/*
 window.onload = function ()
 {
 load();
 zegar();
 //alert('Hello');
 return sprawdz();
 }
 */