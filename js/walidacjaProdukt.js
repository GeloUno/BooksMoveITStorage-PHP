
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
    obiektNazwa = /^[a-zA-ZąĄżŻźŹćĆłŁóÓęĘ0-9\s]{4,20}$/;
    obiektOpis = /^[a-zA-ZąĄżŻźŹćĆłŁóÓęĘ0-9\s]{4,20}$/;
    obiektCena= /^[0-9\.s]{1,10}$/;
 
    if (!sprawdzPole("nazwa", obiektNazwa))
    {
        ok = false;

        document.getElementById("nazwa_error").style.color = "#ff0000";
    } else {
        document.getElementById("nazwa_error").style.color = "";
    }


    if (!sprawdzPole("opis", obiektOpis))
    {
        ok = false;
        document.getElementById("opis_error").style.color = "#ff0000";
        
    } else {
        document.getElementById("opis_error").style.color = "";
    }
    
    
    if (!sprawdzPole("cena", obiektCena))
    {
        ok = false;
        document.getElementById("cena_error").style.color = "#ff0000";
        
    } else {
        document.getElementById("cena_error").style.color = "";
    }
   
    return ok;

}

