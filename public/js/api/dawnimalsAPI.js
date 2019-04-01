//web : http://localhost:8080/Dawnimals/public/api/formdata
var urlApi = 'http://localhost:8080/Dawnimals/public/api/';
var ftipos=[];
var froles=[];
var fsexos=[];
var inputTipo = $('#tipo');
setAttr();
function pushDatos(datos){

    var datos = datos['data'];
    var tiposData = [];
    var sexosData = [];
    var rolesData = [];
    datos['tipos'].forEach(function(elem){
        tiposData.push(elem);
    });
    datos['sexos'].forEach(function(elem){
        sexosData.push(elem);
    });
    datos['roles'].forEach(function(elem){
        rolesData.push(elem);
    });

    ftipos = tiposData;
    fsexos = sexosData;
    froles = rolesData;
}

inputTipo.on("change",function(){
    setSubtiposByTipo();
})

function setSubtiposByTipo(){
    $.ajax({
        url:urlApi+'subtipo',
        method:get,
        data:$(inputTipo).val(),
        contentType: "text",
        dataType: "text",
        success: function(subtipos){
            subtipos = JSON.parse(subtipos);
            console.log(subtipos);
        }
    })
}

function setAttr(){
    $.ajax({
        url:urlApi,
        method: "get",
        contentType: "text",
        dataType: "text",
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            pushDatos(data);
        }
     });
}
