
var urlApi = 'http://localhost:8080/Dawnimals/public/api/';
//var urlApi = 'http://www.abp-politecnics.com/2019/daw/projecte02/dw04/public/api/';
var ftipos=[];
var fcentros=[];
var datos = null;
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
    if(datos==null){
        $.ajax({
            url:urlApi+'donantes',
            method: "get",
            contentType: "text",
            dataType: "text",
            success: function (data) {
                data = JSON.parse(data);
                var donantes=data['data']['donantes'];
                var tipoDonantes=data['data']['tipoDonantes'];
                var sexos = data['data']['sexos'];
                createTable(donantes);
                createOpciones(tipoDonantes,sexos);
            }
        });
    }
}
/* MARC ESTA ES LA FUNCION */
function guardarDonante(){
    var selTipoDonante = $('#selTipoDonante');
    var selSexos = $('#selSexos');
    var donNombre = $('#nombreD');
    var donCif = $('#cif');
    var donCorreo = $('#email');
    var donante = '{ "tipoD":"'+selTipoDonante.val()+'",';
    donante += '"sexo":"'+selSexos.val()+'",';
    donante += '"full_name":"'+donNombre.val()+'",';
    donante += '"cif":"'+donCif.val()+'",';
    donante += '"email":"'+donCorreo.val()+'"}';
    var donantejson = JSON.parse(donante);
    console.log(donante);
    console.log(JSON.stringify(donantejson));
    $.ajax({
        url:urlApi+'crearDonante',
        method: "post",
        contentType: "json",
        data:donantejson
    });
}

function createOpciones(tipoDonantes,sexos){
    var selTipoDonante = $('#selTipoDonante');
    var selSexos = $('#selSexos');
    tipoDonantes.forEach(function(td){
        var opcion = $('<option></option>');
        opcion.val(td.id);
        opcion.html(td.tipo);
        selTipoDonante.append(opcion);
    });
    sexos.forEach(function(sexo){
        var opcion = $('<option></option>');
        opcion.val(sexo.id);
        opcion.html(sexo.sexo);
        selSexos.append(opcion);
    });
}

function createTable(donantes){
    var tBody=$('#donanteTableBody');
    tBody.html('');
    donantes.forEach(function(donante){
        var acciones = $('<div></div>');
        var btngroup = $('<div></div>');
        var urledit = 'http://localhost:8080/Dawnimals/public/backend/donantes/'+donante.id+'/edit';
        btngroup.addClass('btn-group');
        btngroup.append('<button onclick="setDonante('+donante.id+","+'\''+donante.nombre+'\''+')" data-dismiss="modal" class="btn btn-success"><i class="fas fa-hand-pointer"></i></button>');
        btngroup.append('<a href="'+ urledit +'" class="btn btn-warning"><i class="fas fa-edit"></i></a>');
        acciones.append(btngroup);
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
        accion.append(acciones);
        trDonante.append(cif).append(nombre).append(direccion).append(telefono).append(correo).append(accion);
        trDonante.data('correo',donante.correo).data('cif',donante.cif);
        tBody.append(trDonante);
    });
}
