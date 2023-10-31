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
conexion.end();
