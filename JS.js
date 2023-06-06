/*------------ Menú ------------*/

function menu() {
    document.getElementById("menu").style = "display: block;"
    document.getElementById("main").style = "opacity: 0.5;"
    document.body.style = "background-color: gray;"
}
function adiosmenu() {
    document.getElementById("menu").style = "display: none;"
    document.getElementById("main").style = "opacity: 1;"
    document.body.style = "background-color: lightgray;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}

/*------------ Submenus ------------*/

function list1() {
    document.getElementById("listamenu1").style = "display: block;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}
function list2() {
    document.getElementById("listamenu2").style = "display: block;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}
function list3() {
    document.getElementById("listamenu3").style = "display: block;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}
function list4() {
    document.getElementById("listamenu4").style = "display: block;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}
function list5() {
    document.getElementById("listamenu5").style = "display: block;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu6").style = "display: none;"
}
function list6() {
    document.getElementById("listamenu6").style = "display: block;"
    document.getElementById("listamenu1").style = "display: none;"
    document.getElementById("listamenu2").style = "display: none;"
    document.getElementById("listamenu3").style = "display: none;"
    document.getElementById("listamenu4").style = "display: none;"
    document.getElementById("listamenu5").style = "display: none;"
}

/*------------ Filtros ------------*/

function divfiltros() {
    document.getElementById("filtros").style = "display: block;"
    document.getElementById("main").style = "opacity: 0.5;"
}
function aplicar() {
    document.getElementById("filtros").style = "display: none;"
    document.getElementById("main").style = "opacity: 1;"
}

/*------------ Cuenta ------------*/

function cuenta() {
    document.getElementById("divcuenta").style = "display: block;"
    document.getElementById("main").style = "opacity: 0.5;"
}
function adioscuenta() {
    document.getElementById("divcuenta").style = "display: none;"
    document.getElementById("main").style = "opacity: 1;"
}

/*------------ Cambiar la contraseña ------------*/

function pass() {
    var check = document.getElementById("checkbox")

    if (check.checked) {
        document.getElementById("clave").style="display: block;"
        document.getElementById("clave2").style="display: block;"
        document.getElementById("clavenueva").style = "display: block;"
        document.getElementById("claveactual").style = "display: block;"
    }
    else {
        document.getElementById("clave").style="display: none;"
        document.getElementById("clave2").style="display: none;"
        document.getElementById("clavenueva").style = "display: none;"
        document.getElementById("claveactual").style = "display: none;"
    }
}

/*------------ Insertar ------------*/

function newrow() {
    document.getElementById("newinsert").style = "display: block";
}
function adiosedit() {
    document.getElementById('divedicion').style = "display: none;";
}
function adiosborrar() {
    document.getElementById('divborrar').style = "display: none;";
}
