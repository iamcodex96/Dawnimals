//web : http://localhost:8080/Dawnimals/public/api/formdata
var urlApi = 'http://localhost:8080/Dawnimals/public/api/formdata';
var ftipos=[];
var froles=[];
var fsexos=[];
setAttr();
function pushDatos(datos){

    var datos = datos['data'];
    console.log(datos);
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
    console.log( tiposData);
    ftipos = tiposData;
    fsexos = sexosData;
    froles = rolesData;
}

function setAttr(){
    $.ajax({
        url:urlApi,
        method: "get",
        contentType: "text",
        dataType: "text",
        success: function (data) {
            data = JSON.parse(data);
            pushDatos(data);
        }
     });
}
