<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pago usando Estandar Checkout Viejo - 80.000</title>
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
                <h3 class="text-muted">Pagar producto - 80.000$</h3>
            </header>
            <main role="main">
                <div id="main_form" class="main-form">
                    <form id="frm_botonePayco" name="frm_botonePayco" method="post" action="https://secure.payco.co/checkout.php" target="_blank">
                        <input name="p_cust_id_cliente" type="hidden" value="9695">
                        <input name="p_key" type="hidden" value="a1c7200f0e2029d11b62bfd863422d5db10a8397">
                        <input name="p_id_invoice" type="hidden" value="666">
                        <input name="p_description" type="hidden" value="ePayco Test">
                        <input name="p_currency_code" type="hidden" value="COP">
                        <input name="p_amount" id="p_amount" type="hidden" value="80000">
                        <input name="p_tax" id="p_tax" type="hidden" value="0">
                        <input name="p_amount_base" id="p_amount_base" type="hidden" value="0">
                        <input name="p_test_request" type="hidden" value="TRUE">
                        <input name="p_url_response" type="hidden" value="https://dev-plugins.info/prueba_estandar/response">
                        <input name="p_url_confirmation" type="hidden" value="https://dev-plugins.info/prueba_estandar/response">
                        <input name="p_signature" type="hidden" id="signature" value="<?php echo md5('9695^a1c7200f0e2029d11b62bfd863422d5db10a8397^666^80000^COP') ?>" />
                        <input name="p_billing_document" type="hidden" id="p_billing_document" value="10000000" />
                        <input name="p_billing_name" type="hidden" id="p_billing_name" value="PRUEBAS" />
                        <input name="p_billing_lastname" type="hidden" id="p_billing_lastname" value="TEST" />
                        <input name="p_billing_address" type="hidden" id="p_billing_address" value="Calle 10 # 104-50" />
                        <input name="p_billing_country" type="hidden" id="p_billing_country" value="CO" />
                        <input name="p_billing_email" type="hidden" id="p_billing_email" value="admin@payco.co" />
                        <input name="p_billing_phone" type="hidden" id="p_billing_phone" value="0000000" />
                        <input name="p_billing_cellphone" type="hidden" id="p_billing_cellphone" value="0000000000" />
                        <input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn1.png" />
                    </form>
                </div>
            </main>
        </div>

    </body>
    <script >
        
    </script>
</html>