var tabla=[
  {producto:"pizza hawaiana",precio:"100"},
    {producto:"pizza hawaiana",precio:"100"},
      {producto:"pizza hawaiana",precio:"100"},
];
window.onload =cargarEventos;

function cargarEventos(){
  document.getElementById("mostrar-tabla").addEventListener("click",mostrarTabla,false);
  document.getElementById("agregar").addEventListener("submit",nuevoproducto,false);
}

function mostrarTabla(){
var cuerpoTabla=document.getElementById('productos-tabla');
var tablallena= "";
for (var i =0; i<tabla.length; i++) {
	tablallena+="<tr><td>" + tabla[i].producto + "</td><td>" + tabla[i].precio + "</td></tr>";
}
cuerpoTabla.innerHTML=tablallena;
}

function nuevoproducto(event){
	event.preventDefault();
	var productoIntroducido=document.getElementById("producto").value;
	var cantidadIntroducido=document.getElementById("cantidad").value;
	var nuevoproducto={producto: productoIntroducido,precio: cantidadIntroducido};
	tabla.push(nuevoproducto);

}