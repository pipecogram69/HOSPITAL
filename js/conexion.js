let mysql = require("mysql");

let conexion = mysql.createConnection({
host:"localhost",
database:"hospital",
user:"root",
password:""
});
conexion.connect(function(err){
    if(err){
        throw err;
    }else{
    console.log("Conexion exitosa");
    }
});

/*const nuevoregistro = "INSERT INTO registros INSERT INTO registros (reg_nombres, reg_apellidos, reg_correo, reg_celular, reg_num_seg, reg_tipo_id, reg_id, reg_contra) VALUES ('') ";
 conexion.query(nuevoregistro,function(error,rows){
    if(error){
        throw error;
    }else{
        console.log("datos ingresados correctamente");
    }
 });
*/

/*const modificar= "UPDATE registros SET XX = 'ZZ' WHERE REG_ID = 'pk'"
conexion.query(modificar, function(error,lista){
    if(error){
        throw error;
    }else{
        console.log(lista);
        //console.log("dato modificado");
    }
});
*/


const registros= "SELECT * FROM registros"
conexion.query(registros, function(error,lista){
    if(error){
        throw error;
    }else{
        console.log(lista);
        //console.log(lista.length) NUMERO DE REGISTROS
    }
});

/*
const borrar = "DELETE FROM registros WHERE reg_id  = pk"
conexion.query(borrar, function(error,lista){
    if(error){
        throw error;
    }else{
        console.log(lista);
        //console.log("dato eliminado");
    }
});
*/

conexion.end();
