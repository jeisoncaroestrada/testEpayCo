<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Respuesta Estandar Checkout Viejo - 80.000</title>
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
                <h3 class="text-muted">Producto - 80.000$</h3>
            </header>
            <main role="main">
                <div class="success hidden" id="success">
                    <div class="alert alert-success" role="alert">
                        <h1 class="alert-heading display-4">Compra realizada con exito!</h1>
                        <h3 class="display-5">Producto 80.000$</h3>
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
                            <a href="https://dev-plugins.info/prueba_estandar" style="padding: 10px;font-size: 16px;" class="badge badge-primary">Comprar otro producto</a>
                        </h3>
                    </div>
                </div>
                <div class="loader" id="loader">
                    <h4>Procesando el pago...</h4>
                </div>
            </main>
        </div>

    </body>
     <script >
        function success(res){
            //se muestra el indicador de que el pago se esta procesando
            var loader = document.getElementById("loader");
                loader.classList.remove("hidden");
            
            //se muestra la respuesta 
            var html ='<br>Text_response: ' + res.text_response
            + '<br>Cod_response: ' + res.cod_response
            + '<br>Ref_payco: ' + res.ref_payco
            + '<br>Franchise: ' + res.franchise
            + '<br>Currency_code: ' + res.currency_code
            + '<br>Id_invoice: ' + res.id_invoice;
            
            document.getElementById('code').innerHTML=html;
            loader.classList.add("hidden");
            var success = document.getElementById("success");
            success.classList.remove("hidden");
        }
    </script>
    <?php 
        $x_cust_id_cliente = '9695';
        $x_key = 'a1c7200f0e2029d11b62bfd863422d5db10a8397';
        $x_transaction_id = $_REQUEST['x_transaction_id'];
        $x_ref_payco = $_REQUEST['x_ref_payco'];
        $x_amount = $_REQUEST['x_amount'];
        $x_currency_code = $_REQUEST['x_currency_code'];
        $x_cod_response = $_REQUEST['x_cod_response'];
        $x_response = $_REQUEST['x_response'];
        $x_signature = $_REQUEST['x_signature'];
        $x_id_invoice = $_REQUEST['x_id_invoice'];
        $x_franchise = $_REQUEST['x_franchise'];

        $generated_signature = hash('sha256',$x_cust_id_cliente.'^'.$x_key.'^'.$x_ref_payco.'^'.$x_transaction_id.'^'.$x_amount.'^'.$x_currency_code);

        $res = json_encode(array(
            "text_response" => $x_response,
            "cod_response" => $x_cod_response,
            "ref_payco" => $x_ref_payco,
            "transaction_id" => $x_transaction_id,
            "currency_code" => $x_currency_code,
            "id_invoice" => $x_id_invoice,
            "franchise" => $x_franchise,
        ));
           
        if ($generated_signature == $x_signature) {
            echo '<script type="text/javascript">';
            echo 'success('.$res.');';
            echo '</script>';
    
        }
    ?>

</html>