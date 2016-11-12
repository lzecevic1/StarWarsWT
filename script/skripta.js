// Funkcije za validacije formi - login, kontakt i sign up

function validacijaLogin()
{
    var email = document.getElementById("emailLogin").value;
    var password = document.getElementById("passwordLogin").value;
    if(!email && !password)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
       p.innerHTML = "Your email or password were incorrect."
       return false;
    }
    if(!email)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
       p.innerHTML = "That's not a valid email address. Please try again."
       return false;
    }
    if(!password)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
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

    if(!name)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
       p.innerHTML = "You forgot to enter your name!";
       return false;
    }

    if(!email)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
       p.innerHTML = "That's not a valid email address. Please try again."
       return false;
    }
    if(!message)
    {
       var p = document.getElementById("warningMessage");
       p.style.paddingTop = p.style.paddingBottom = "1.5%";
       p.style.marginLeft = "-50px";
       p.innerHTML = "Please enter your message.";
       return false;     
    }
    return true;
}