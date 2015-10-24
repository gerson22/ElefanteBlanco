function nuevoAjax(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i])
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest) // if Mozilla, Safari etc
  return new XMLHttpRequest()
 else
  return false
}


function cmbSucursalDep(){

        var mygetrequest=new nuevoAjax();
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){


  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("divSucursal").innerHTML=mygetrequest.responseText;
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var empresaCmb=document.getElementById("empresa").value;

mygetrequest.open("GET", "cmbSucursal.php?idEmpresa="+empresaCmb, true);
mygetrequest.send(null);
}

function cmbDepto(){

        var mygetrequest=new nuevoAjax();
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){


  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("divDepto").innerHTML=mygetrequest.responseText;
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var sucursalCmb=document.getElementById("sucursal").value;

mygetrequest.open("GET", "cmbDepto.php?idSucursal="+sucursalCmb, true);
mygetrequest.send(null);
}


function bsqEmpleado(){

        var mygetrequest=new nuevoAjax();
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){
document.getElementById("resultados").innerHTML='<img src="../images/loader.gif">';

  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("resultados").innerHTML=mygetrequest.responseText;
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var busqEmpleado=document.getElementById("emplBusq").value;
mygetrequest.open("GET", "bsqEmpleados.php?nombre="+busqEmpleado, true);
mygetrequest.send(null);
}
function listaDsctosVta(){

        var mygetrequest=new nuevoAjax();
mygetrequest.onreadystatechange=function(){
 if (mygetrequest.readyState==4){
document.getElementById("divDsctoVta").innerHTML='<img src="images/loader.gif">';

  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("divDsctoVta").innerHTML=mygetrequest.responseText;
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
var fechaC=document.getElementById("date1").value;
var fechaC2=document.getElementById("date2").value;
mygetrequest.open("GET", "lista_dscto_vta.php?fecha="+fechaC+"&fecha2="+fechaC2, true);
mygetrequest.send(null);
}


