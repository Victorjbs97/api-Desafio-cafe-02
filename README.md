# Documentação
## Método GET
### Acesse o Arquivo api_cafe_02.php 

Coloque o arquivo no htdocs, um exemplo de caminho é:
- http://localhost/reforco_api/api_cafe_02.php

Se o caminho estiver correto você verá uma mensagem com o Endpoint para acessar a chave de acesso do método **POST**.

<details>
  <summary>Só Click aqui se você não conseguiu acessar o Endpoint</summary>

> O Endpoint é  **?info=chavesupersecreta**;

>> Link de exemplo com o Endpoint:
http://localhost/reforco_api/api_cafe_02.php?info=chavesupersecreta

</details>

## Método POST
### Para acessar o método POST basta usar o padrão que vimos em aulas, um exemplo é o arquivo comidas Post, basta trocar o conteúdo do array novaComida pela chave secreta conseguida no método GET.

<details>
    <summary> Só Click aqui se você não conseguiu a chave secreta </summary>

```PHP
    $chave = ['chaveSecreta'=>'Mega chave secreta do tesouro!'];
```
</details>

<details>
    <summary> Só Click aqui se você quiser saber como fazer o método POST detalhadamente</summary>

- Primeiro armazenar a url da api
```PHP
 $url = "http://localhost/reforco_api/api_cafe_02.php";
```
- Criar um array com a chave secreta

```PHP
    $chave = ['chaveSecreta'=>'Mega chave secreta do tesouro!'];
```
- Crie o array de contexto, usando o 'content' para o passar a chave:
```PHP
$metodo = [
    'http' => [
        'method' => "POST",
        'header' => "Content-type: application/json\r\n",
        'content'=>json_encode($chave)
    ]
];

``` 
- Transformar o array metodo em uma estrutura de URL:

```PHP
    $contexto = stream_context_create($metodo);
```
- Realizar a requisição Post:

```PHP
    $resposta = file_get_contents($url,false,$contexto);
```
- Mostrar o retorna da API:

```PHP
    echo $resposta;
```
</details>
