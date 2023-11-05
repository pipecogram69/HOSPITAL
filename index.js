//importar libreria
const express = require("express");



//objetos para llamar los metodos de express
const app = express();


app.set("view engine","css");


app.use(express.json()); //reconocer objetos json
app.use(express.urlencoded({extended:false})); //reconocer datos html o otra unicacion



app.post("/validar", function(req,res){
    const datos = req.body//almacenar
    console.log(datos);
})


//middleware
app.use(express.static("public"));



//configurar el puerto usado para el servidor local
app.listen(3000,function(){
    console.log("El servidor es http://localhost:3000");
});

