
var urlApi = 'http://localhost:8080/Dawnimals/public/api/';
//var urlApi = 'http://www.abp-politecnics.com/2019/daw/projecte02/dw04/public/api/';
var ftipos=[];
var fcentros=[];
var inputTipo = $('#tipo');
var inputSubTipo=$('#subtipo');
var inputCentroR=$('#centroR');
var inputCentroD=$('#centroD');
setAttr();
recuperarDonantes();
function pushDatos(datos){

    var datos = datos['data'];
    var tiposData = [];
    var  centroData= [];
    datos['tipos'].forEach(function(elem){
        tiposData.push(elem);
    });
    datos['centros'].forEach(function(elem){
        centroData.push(elem);
    });
    ftipos = tiposData;
    fcentros = centroData;
    crearOpcionesTipo(ftipos);
    crearOpcionesCentro(fcentros);
}

inputTipo.on("change",function(){
    setSubtiposByTipo();
})

function setSubtiposByTipo(){
    $.ajax({
        url:urlApi+'subtipo/'+$(inputTipo).val(),
        method:'get',
        contentType: "text",
        dataType: "text",
        success: function(subtipos){
            subtipos = JSON.parse(subtipos);
            crearOpcionesSubtipo(subtipos);
        }
    })
}

function crearOpcionesCentro(listaCentros){
    listaCentros.forEach(function(centro){
        var option=$('<option></option>');
        option.attr('value',centro.id);
        option.html(centro.nombre);
        inputCentroD.append(option);
    });
    listaCentros.forEach(function(centro){
        var option=$('<option></option>');
        option.attr('value',centro.id);
        option.html(centro.nombre);
        inputCentroR.append(option);
    });
}

function setAttr(){
    $.ajax({
        url:urlApi+'donacionesData',
        method: "get",
        contentType: "text",
        dataType: "text",
        success: function (data) {
            data = JSON.parse(data);
            pushDatos(data);
        }
     });
}

function crearOpcionesTipo(listaTipo){
    listaTipo.forEach(function(tipo){
        var option=$('<option></option>');
        option.attr('value',tipo.id);
        option.html(tipo.nombre);
        inputTipo.append(option);
    });
}
function crearOpcionesSubtipo(subtipos){
        inputSubTipo.html('');
        subtipos['data'].forEach(function(subtipo){
        var option=$('<option></option>');
        option.attr('value',subtipo.id);
        switch(idioma){
            case 'es': option.html(subtipo.nombre_esp);break;
            case 'ca': option.html(subtipo.nombre_cat);break;
        }
        inputSubTipo.append(option);
    });
}

function recuperarDonantes(){
    $.ajax({
        url:urlApi+'donantes',
        method: "get",
        contentType: "text",
        dataType: "text",
        success: function (data) {
            data = JSON.parse(data);
            var donantes=data['data']['donantes'];
            createTable(donantes)
        }
    });
}

function createTable(donantes){
    var tBody=$('#donanteTableBody');
    tBody.html('');
    donantes.forEach(function(donante){
        var trDonante=$('<tr></tr>');
        var cif = $('<td></td>');
        var nombre = $('<td></td>');
        var direccion = $('<td></td>');
        var telefono =$('<td></td>');
        var correo =$('<td></td>');
        var accion =$('<td></td>');
        cif.html(donante.cif);
        nombre.html(donante.nombre);
        direccion.html(donante.direccion);
        telefono.html(donante.telefono);
        correo.html(donante.telefono);
        trDonante.append(cif).append(nombre).append(direccion).append(telefono).append(correo).append(accion);
        tBody.append(trDonante);
    });
}
