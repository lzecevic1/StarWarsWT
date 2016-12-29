function showResult(value) 
{
    alert("r");
    var rezultati = document.getElementById("rezultati");
    if (value.length==0) 
    { 
        rezultati.innerHTML = "";
        rezultati.style.border = "0px";
        // rezultati.style.display = "none";
        return;
    }
    if (window.XMLHttpRequest) 
    {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } 
    else 
    {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            rezultati.innerHTML = this.responseText;
            rezultati.style.position = "absolute";
            rezultati.style.backgroundColor = "white";
            rezultati.style.color = "black";
        }
    }
    xmlhttp.open("GET","search.php?q=" + value, true);
    xmlhttp.send();
}