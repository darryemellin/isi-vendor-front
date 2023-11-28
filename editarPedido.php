<?php

// if($_SERVER['REQUEST_METHOD'] === 'GET'){
//     if(isset($_GET['idDelete'])){
//         $id = $_GET['idDelete'];

//     $url = "http://localhost/pedidos/$id";
//     $ch = curl_init($url);

//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
//     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'accept: */*'
//     ));

//     curl_exec($ch);
//     // Verificando erros
//     if (curl_errno($ch)) {
//         echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
//     }

//     curl_close($ch);
//     echo"<script>window.location.href= 'meusPedidos.php';</script>";
//     }
// }


?>