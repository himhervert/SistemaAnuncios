/*
 * Función que se encarga de inicializar el tiempo,
 * toma la hora, minutos y segundos, cuando toma el tiempo
 * llama a la funcion checkTime que agrega un 0 cada vez que 
 * la hora, minutos y segundos, cambia a un solo digito
 * Ejemplo: 10:00:00
 * Al checar inscrusta el texto al documento por JS.
*/

function startTime() {
    today = new Date();
    h = today.getHours();
    m = today.getMinutes();
    s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('timer').innerHTML = "Hora: " + h + ":" + m + ":" + s;
    t = setTimeout('startTime()', 500);
}

var myIndex = 0;
var bandera;
var fil;
var obj;
var interval;
var img;

var myIndex1 = 0;
var bandera1;
var fil1;
var obj1;
var interval1;
var img1;

slider();
slider2();

function slider() {
    var i;
    var x = document.getElementsByClassName("anuncio-item");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    myIndex1++;
    if (myIndex1 > x.length) { myIndex1 = 1 }
    fil1 = 0;
    img1 = x[myIndex1 - 1];  
    x[myIndex1 - 1].style.filter = "alpha(opacity=0)";
    x[myIndex1 - 1].style.opacity = 0;
    x[myIndex1 - 1].style.display = "block";
    
    pinta1();
    setTimeout(slider, 20000); // Change image every 5 seconds
}

function slider2() {
    var i;
    var x = document.getElementsByClassName("sliderItem2");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        
    }
    myIndex++;
    if (myIndex > x.length) { myIndex = 1 }
    fil = 0;
    img = x[myIndex - 1];  
    x[myIndex - 1].style.filter = "alpha(opacity=0)";
    x[myIndex - 1].style.opacity = 0;
    x[myIndex - 1].style.display = "block";    
    var tiempo = x[myIndex - 1].alt * 1000;
    pinta();
    setTimeout(slider2, tiempo); // Change image every 3.5 seconds    
}

//funcion para pintar el slider 2
function pinta() {
    bandera = "pinta";
    interval = setInterval(colorM, 70);
}

//funcion para pintar el slider1
function pinta1() {
    bandera1 = "pinta";
    interval1 = setInterval(colorM1, 70);
}

// funcion de evanece el slider2
function colorM() {

    obj = img;

    if (bandera == "pinta") {
        fil = fil + 0.1;
        obj.style.opacity = fil;
        obj.style.filter = "alpha(opacity=" + fil * 100 + ")";

        if (fil >= 1.0) {
            clearInterval(interval);
           // bandera = "borra";
        }
    }
    else {
        fil = fil - 0.1;
        obj.style.opacity = fil;
        obj.style.filter = "alpha(opacity=" + fil * 100 + ")";

        if (fil <= 0.1) {
            clearInterval(interval);
            bandera = "pinta";
        }

    }
}

// funcion de evanece el slider1
function colorM1() {
    
        obj1 = img1;
    
        if (bandera1 == "pinta") {
            fil1 = fil1 + 0.1;
            obj1.style.opacity = fil1;
            obj1.style.filter = "alpha(opacity=" + fil1 * 100 + ")";
    
            if (fil1 >= 1.0) {
                clearInterval(interval1);
               // bandera = "borra";
            }
        }
        else {
            fil1 = fil1 - 0.1;
            obj1.style.opacity = fil1;
            obj1.style.filter = "alpha(opacity=" + fil1 * 100 + ")";
    
            if (fil1 <= 0.1) {
                clearInterval(interval1);
                bandera1 = "pinta";
            }
    
        }
    }

    /*
     * Función que checa el tiempo si el digito es menor a 10, le agrega un 0
     * un digito anterior.
    */
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    /*
     * Funcion que al iniciar la ventana carga la hora del servidor
     * y lo muestra en pantalla.
     */
    window.onload = function () {
        startTime();
    }

    /*
     * Función 
     */
    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    var f = new Date();
    document.getElementById('date').innerHTML += f.getDate() + " - " + meses[f.getMonth()] + " - " + f.getFullYear();