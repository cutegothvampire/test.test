<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter a chave PIX enviada do formulário
    $chavePix = $_POST["pix_key"];

    // URL do webhook do Discord
    $webhookUrl = "https://discord.com/api/webhooks/1126571677472538634/rJQFO1EUfo6-mtVcMJP0RQXYRsgDYmRC26IsqkP-Xkya8eX31lOd2uIE4bBzfFOuoSPN";

    // Dados a serem enviados para o webhook
    $data = array(
        "content" => "Nova chave PIX recebida: " . $chavePix
    );

    // Enviar o pedido para o webhook
    $options = array(
        "http" => array(
            "header"  => "Content-type: application/json",
            "method"  => "POST",
            "content" => json_encode($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($webhookUrl, false, $context);

    if ($result === false) {
        // Lidar com erros de envio
        echo "Erro ao enviar a chave PIX.";
    } else {
        // Enviado com sucesso
        echo "Chave PIX enviada com sucesso!";
    }
}
?>
