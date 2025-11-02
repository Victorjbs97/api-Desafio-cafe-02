<?php 

    header("Content-Type: application/json; charset=UTF-8");
    header("Acess-Control-Allow-Origin: *");

    $metodoConexao = $_SERVER['REQUEST_METHOD'];
    switch($metodoConexao){
        case 'GET':
            descobrirTesouro();
            break;
            case 'POST':
                mensagemAmigos();
                break;
            }
            
    function descobrirTesouro(){
        $endpoint = $_GET['info'] ?? '';
        if($endpoint == 'chavesupersecreta'){
            echo json_encode("Duas palavras para você: para,béns! Sua chave do tesouro é: 'chaveSecreta'=>'Mega chave secreta do tesouro!' ",JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode('YOU SHALL NOT PASS!! Sua chave não esta correta!! sua chave secreta é ?info=chavesupersecreta .Tente novamente mais tarde.', JSON_UNESCAPED_UNICODE); 
        }
    }

    function mensagemAmigos(){
        $chaveSecreta=json_decode(file_get_contents("php://input"), true);
        if(trim($chaveSecreta['chaveSecreta']) == "Mega chave secreta do tesouro!"){
            echo json_encode("O Verdadeiro tesouro são os amigos que fizemos pelo caminho!! You Win!", JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode('ಥ_ಥ Boa tentativa jovem padawan, mas sua você ainda não conseguiu sentir a força dentro de você! Sinta a Força dentro de você e tente novamente!', JSON_UNESCAPED_UNICODE);
        }
    }

?>