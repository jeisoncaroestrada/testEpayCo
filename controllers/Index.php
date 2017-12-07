<?php

include 'controllers/Controller.php';

class Index extends Controller{

    public static function CreatePay($data){
        $name = $_REQUEST['name'];
        $lastname = $_REQUEST['lastname'];
        $doc_type = $_REQUEST['doc_type'];
        $doc_number = $_REQUEST['doc_number'];
        $email = $_REQUEST['email'];
        $cellphone = $_REQUEST['cellphone'];
        $address = $_REQUEST['address'];
        $full_name = $name." ".$lastname;

        $epayco = new Epayco\Epayco(array(
           "apiKey" => " 45b960805ced5c27ce34b1600b4b9f54",
           "privateKey" => " 5c4773856f296c674685209bbfd11f92",
           "lenguage" => "ES",
           "test" => true
        ));
       
       
        $token = $epayco->token->create(array(
            "card[number]" => '4575623182290326',
            "card[exp_year]" => "2018",
            "card[exp_month]" => "06",
            "card[cvc]" => "123"
        ));
    
        $customer = $epayco->customer->create(array(
            "token_card" => $token->id,
            "name" => $full_name,
            "email" => $email,
            "phone" => $cellphone,
            "default" => true
        ));
    
        $pay = $epayco->charge->create(array(
            "token_card" => $token->id,
            "customer_id" => $customer->data->customerId,
            "doc_type" => $doc_type,
            "doc_number" => $doc_number,
            "name" => $name,
            "last_name" => $lastname,
            "email" => $email,
            "bill" => "OR-1234",
            "description" => "Test Payment",
            "value" => "50000",
            "tax" => "0",
            "tax_base" => "0",
            "currency" => "COP",
            "dues" => "12"
        ));
           
        return  json_encode($pay);
    }

}

?>