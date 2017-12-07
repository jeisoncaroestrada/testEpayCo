<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pago usando SDK PHP - 50.000</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        .hidden{
            display: none!important;
        }

        .loader{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            z-index: 10000;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <header class="header clearfix">
                <h3 class="text-muted">Pagar producto - 50.000$</h3>
            </header>
            <main role="main">
                <div id="main_form" class="main-form">
                    <form class="form-horizontal" onsubmit="return createPay(this)">
                        <fieldset>
                            
                            <!-- Form Name -->
                            <legend>Datos de usuario</legend>
                            
                            <!-- Text input name-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="name">Primer nombre</label>  
                                <div class="col-md-12">
                                    <input required="" id="name" name="name" type="text" placeholder="Ingrese su nombre" class="form-control input-md" >
                                    
                                </div>
                            </div>
                            
                            <!-- Text input last_name-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="lastname">Last name</label>  
                                <div class="col-md-12">
                                    <input required="" id="lastname" name="lastname" type="text" placeholder="Ingrese su apellido" class="form-control input-md" >
                                    
                                </div>
                            </div>
                            
                            <!-- Select doc_type -->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="doc_type">Seleccione su tipo de documento</label>
                                <div class="col-md-12">
                                    <select id="doc_type" name="doc_type" class="form-control">
                                        <option value="CC">CÉDULA DE CIUDADANÍA</option>
                                        <option value="CE">CÉDULA DE EXTRANJERÍA</option>
                                        <option value="TI">TARJETA DE IDENTIDAD</option>
                                        <option value="DNI">DOCUMENTO NACIONAL DE IDENTIFICACIÓN</option>
                                        <option value="PPN">PASAPORTE</option>
                                        <option value="SSN">NÚMERO DE SEGURIDAD SOCIAL</option>
                                        <option value="LIC">LICENCIA DE CONDUCCIÓN</option>
                                        <option value="NIT">NÚMERO DE INDENTIFICACIÓN TRIBUTARIA</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Text input doc_number-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="doc_number">Numero de documento </label>
                                <div class="col-md-12">
                                    <input required="" id="doc_number" name="doc_number" type="text" placeholder="Ingrese su numero de documento" class="form-control input-md" >
                                    
                                </div>
                            </div>
                            
                            <!-- Text input email-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="email">E-mail</label>  
                                <div class="col-md-12">
                                    <input required="" id="email" name="email" type="text" placeholder="tuemail@mail.com" class="form-control input-md" >
                                </div>
                            </div>
        
                            <!-- Password input cellphone-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="cellphone">Celular </label>
                                <div class="col-md-12">
                                    <input required="" id="cellphone" name="cellphone" type="text" placeholder="Ingrese su numero de celular" class="form-control input-md" >
                                    
                                </div>
                            </div>
        
                            <!-- Password input address-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="address">Dirección </label>
                                <div class="col-md-12">
                                    <input required="" id="address" name="address" type="text" placeholder="Ingrese su dirección" class="form-control input-md" >
                                    
                                </div>
                            </div>
                            
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="singlebutton"></label>
                                <div class="col-md-12">
                                    <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Pagar</button>
                                </div>
                            </div>
        
                        </fieldset>
                    </form>
                </div>
                <div class="success hidden" id="success">
                    <div class="alert alert-success" role="alert">
                        <h1 class="alert-heading display-4">Compra realizada con exito!</h1>
                        <h3 class="display-5">Producto 50.000$</h3>
                        <p>Esta es la respuesta de la transacción:</p>
                        <hr>
                        <h3>
                            <span id="code">
                            </span>
                        </h3>
                    </div>
                    <div class="jumbotron">
                        <p class="lead">¿Quieres seguir comprando?</p>
                        <h3>
                            <a href="http://localhost:8080/" style="padding: 10px;font-size: 16px;" class="badge badge-primary">Comprar otro producto</a>
                        </h3>
                    </div>
                </div>
                <div class="loader hidden" id="loader">
                    <h4>Procesando el pago...</h4>
                </div>
            </main>
        </div>

    </body>
    <script >
        function createPay(e){
            //se muestra el indicador de que el pago se esta procesando
            var loader = document.getElementById("loader");
                loader.classList.remove("hidden");

            // se crea el body que va en la  petición HTTP
            var body ='name=' +  document.getElementById('name').value
                + '&lastname=' +  document.getElementById('lastname').value
                + '&doc_type=' +  document.getElementById('doc_type').value
                + '&doc_number=' +  document.getElementById('doc_number').value
                + '&email=' +  document.getElementById('email').value
                + '&cellphone=' +  document.getElementById('cellphone').value
                + '&address=' +  document.getElementById('address').value;

            // Creación de la petición HTTP
            var req = new XMLHttpRequest();
            // Petición HTTP GET síncrona hacia el archivo fotos.json del servidor
            req.open("POST", "http://localhost:8080/create_pay", true);
            req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

            //funcion que se ejecuta cuando la peticion termine correctamente
            req.onreadystatechange = function(data) {
                if (this.readyState == 4 && this.status == 200) {
                    //se muestra la respuesta 
                    var res = JSON.parse(data.currentTarget.response)
                    var html ='Success: ' + res.success
                    + '<br>Text_response: ' + res.text_response
                    + '<br>Estado: ' + res.data.estado
                    + '<br>Factura: ' + res.data.factura
                    + '<br>Recibo: ' + res.data.recibo
                    + '<br>Ref_payco: ' + res.data.ref_payco;
                    
                    document.getElementById('code').innerHTML=html;
                    var form = document.getElementById("main_form");
                    form.classList.add("hidden");
                    loader.classList.add("hidden");
                    var success = document.getElementById("success");
                    success.classList.remove("hidden");
                    console.log(JSON.parse(data.currentTarget.response));
                }
            };
            // Envío de la petición
            req.send(body);
            return false;

        }
    </script>
</html>