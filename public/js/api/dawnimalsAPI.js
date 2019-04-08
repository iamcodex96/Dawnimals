
var urlApi = 'http://localhost:8080/Dawnimals/public/api/';
var ftipos=[];
var fsexos=[];
var inputTipo = $('#tipo');
var inputSubTipo=$('#subtipo');
setAttr();
function pushDatos(datos){

    var datos = datos['data'];
    var tiposData = [];
    var sexosData = [];
    datos['tipos'].forEach(function(elem){
        tiposData.push(elem);
    });
    datos['sexos'].forEach(function(elem){
        sexosData.push(elem);
    });

    ftipos = tiposData;
    fsexos = sexosData;
    crearOpcionesTipo(ftipos);
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
function setAttr(){
    $.ajax({
        url:urlApi+'formdata',
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
        option.html(subtipo.nombre);
        inputSubTipo.append(option);
    });
}
