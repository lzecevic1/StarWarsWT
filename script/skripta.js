// Funkcije za validacije formi - login, kontakt i sign up

function showMessage(message, p) // Y U NO WORK??
{
    p.style.paddingTop = p.style.paddingBottom = "1.5%";
    p.style.marginLeft = "-50px";
    p.style.color = "white";
    p.innerHTML(message);
}

function validacijaLogin()
{
    var p = document.getElementById("warningMessage");
    var email = document.getElementById("emailLogin").value;
    var password = document.getElementById("passwordLogin").value;
    if(!email && !password)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "Your email or password were incorrect.";
        return false;
    }
    if(!email)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "That's not a valid email address. Please try again.";
        return false;
    }
    if(!password)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "You forgot to enter your password!";
        return false;
    }

    return true;
}

function validacijaKontakt()
{
    var name = document.getElementById("nameContact").value;
    var email = document.getElementById("emailContact").value;
    var message = document.getElementById("message").value;
    var p = document.getElementById("warningMessage");    

    if(!name)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "You forgot to enter your name!";
        return false;
    }
    if(!email)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "That's not a valid email address. Please try again.";
        return false;
    }
    if(!message)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "Please enter your message.";
        return false;     
    }

    return true;
}

function validacijaRegistracija()
{
    var name = document.getElementById("nameRegister").value; 
    var surname = document.getElementById("surname").value;
    var email = document.getElementById("emailRegister").value;
    var password = document.getElementById("password1").value;
    var passwordRepeat = document.getElementById("password2").value;
    var p = document.getElementById("warningMessage");    
    
    if(!name)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "You forgot to enter your name!";
        return false;
    }
    if(!surname)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "You forgot to enter your last name!";
        return false;
    }
    if(!email)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "That's not a valid email address. Please try again.";
        return false;
    }
    if(!password || !password)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "You forgot to enter your password!";
        return false;
    }
    if(password !== passwordRepeat)
    {
        p.style.paddingTop = p.style.paddingBottom = "1.5%";
        p.style.marginLeft = "-50px";
        p.style.color = "white";
        p.innerHTML = "Passwords don't match!";
        return false;
    }

    return true;
}

