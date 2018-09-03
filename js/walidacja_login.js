
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
    obiektLogin = /^[a-zA-ZąĄżŻźŹćĆłŁóÓęĘ0-9\s]{4,20}$/;
    obiektPass = /^[a-zA-ZąĄżŻźŹćĆłŁóÓęĘ0-9\s]{4,20}$/;

    if (!sprawdzPole("login", obiektLogin))
    {
        ok = false;

        document.getElementById("login_error").style.color = "#ff0000";
    } else {
        document.getElementById("login_error").style.color = "";
    }


    if (!sprawdzPole("pass", obiektPass))
    {
        ok = false;
        document.getElementById("pass_error").style.color = "#ff0000";
        
    } else {
        document.getElementById("pass_error").style.color = "";
    }
    
    return ok;

}

