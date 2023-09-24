<?php
include_once('config.php');
session_start();
    $quantChale3 = 0;
    $quantChale = 0;
    $quantCampCompleto = 0;
    $quantCampCompletoMeia = 0;
    $quantCampDois = 0;
    $quantCampDoisMeia = 0;
    $quantCampUm = 0;
    $quantCampUmMeia = 0;
    $quantCampUmSem = 0;
    $quantCampUmMeiaSem = 0;
    
    $total = $_SESSION['total'];
    $quantChale3 = $_SESSION['quantChale3'];
    $quantChale = $_SESSION['quantChale'];
    $quantCampCompleto = $_SESSION['quantCampCompleto'];
    $quantCampCompletoMeia = $_SESSION['quantCampCompletoMeia'];
    $quantCampDois = $_SESSION['quantCampDois'];
    $quantCampDoisMeia = $_SESSION['quantCampDoisMeia'];
    $quantCampUm = $_SESSION['quantCampUm'];
    $quantCampUmMeia = $_SESSION['quantCampUmMeia'];
    $quantCampUmSem = $_SESSION['quantCampUmSem'];
    $quantCampUmMeiaSem = $_SESSION['quantCampUmMeiaSem'];
      
    /*
    echo $total;
    echo $quantChale;
    echo $quantCampCompleto;
    echo $quantCampCompletoMeia;
    echo $quantCampDois;
    echo $quantCampDoisMeia;
    echo $quantCampUm;
    echo $quantCampUmMeia;*/
    

    $nome = $_SESSION['nome'] = $_POST['nome'];
    $cpf = $_SESSION['cpf'] = $_POST['cpf'];
    $email = $_SESSION['email'] = $_POST['email'];
    $tel = $_SESSION['tel'] = $_POST['tel'];
    $endereco = $_SESSION['endereco'] = $_POST['endereco'];
    $cidade = $_SESSION['cidade'] = $_POST['cidade'];
    $estado = $_SESSION['estado'] = $_POST['estado'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, cpf, email, telefone, endereco, cidade, estado, quantChale3, quantChale, quantCampCompleto, quantCampCompletoMeia, quantCampDois, quantCampDoisMeia, quantCampUm, quantCampUmMeia, quantCampUmSem, quantCampUmMeiaSem, total) values ('$nome','$cpf','$email','$tel','$endereco','$cidade','$estado','$quantChale3','$quantChale','$quantCampCompleto','$quantCampCompletoMeia','$quantCampDois','$quantCampDoisMeia','$quantCampUm','$quantCampUmMeia','$quantCampUmSem','$quantCampUmMeiaSem', '$total')");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="reset.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="icon" type="image/x-icon" href="PN-FOTO.png">
    <link rel="stylesheet" href="compras.css">
</head>

<body>
    <header>
        <div class="cabecalho">
            <h1>
                <img src="PN-FOTO.png" alt="" class="logoredondo">
                <img src="LOGO-PN-2.png" alt="" class="logobranco">
            </h1>
            </div>
            <div>
            <nav class="cabecalho">
                <a href="index.html" style="color: red;">Cancelar</a></li>
            </nav>
            </div>
    </header>
    <br>
    <article>
        <?php
        if ($quantChale3 > 0 || $quantChale > 0 || $quantCampCompleto > 0 || $quantCampCompletoMeia > 0 || $quantCampDois > 0 || $quantCampDoisMeia > 0 || $quantCampUm > 0 || $quantCampUmMeia > 0 || $quantCampUmSem > 0 || $quantCampUmMeiaSem > 0) {

            
            $access_token = 'APP_USR-141452113197376-052923-820fe71134b954ce6ed2c4aebbbaee8d-12176432';

            require_once 'vendor/autoload.php';
            
            MercadoPago\SDK::setAccessToken($access_token);
            
            $preference = new MercadoPago\Preference();
            
            $items = array();
            
            // Produto 1 - Chalés
            if ($quantChale > 0) {
                $item1 = new MercadoPago\Item();
                $item1->title = 'Chalé - 2 dias';
                $item1->quantity = $quantChale;
                $item1->unit_price = 600.00;
                $items[] = $item1;
            }
            
            // Produto 2 - Camp Completo
            if ($quantCampCompleto > 0) {
                $item2 = new MercadoPago\Item();
                $item2->title = 'Camp Completo 3 dias';
                $item2->quantity = $quantCampCompleto;
                $item2->unit_price = 180.00;
                $items[] = $item2;
            }
            
            // Produto 3 - Camp Completo Meia
            if ($quantCampCompletoMeia > 0) {
                $item3 = new MercadoPago\Item();
                $item3->title = 'Camp Completo 3 dias (Meia)';
                $item3->quantity = $quantCampCompletoMeia;
                $item3->unit_price = 90.00;
                $items[] = $item3;
            }
            
            // Produto 4 - Camp Dois
            if ($quantCampDois > 0) {
                $item4 = new MercadoPago\Item();
                $item4->title = 'Camp Sabado e domingo';
                $item4->quantity = $quantCampDois;
                $item4->unit_price = 130.00;
                $items[] = $item4;
            }
            
            // Produto 5 - Camp Dois Meia
            if ($quantCampDoisMeia > 0) {
                $item5 = new MercadoPago\Item();
                $item5->title = 'Camp Sabado e Domingo (Meia)';
                $item5->quantity = $quantCampDoisMeia;
                $item5->unit_price = 65.00;
                $items[] = $item5;
            }
            
            // Produto 6 - Camp Um
            if ($quantCampUm > 0) {
                $item6 = new MercadoPago\Item();
                $item6->title = 'Day Use - Domingo';
                $item6->quantity = $quantCampUm;
                $item6->unit_price = 75.00;
                $items[] = $item6;
            }
            
            // Produto 7 - Camp Um Meia
            if ($quantCampUmMeia > 0) {
                $item7 = new MercadoPago\Item();
                $item7->title = 'Day Use - Domingo (Meia)';
                $item7->quantity = $quantCampUmMeia;
                $item7->unit_price = 37.50;
                $items[] = $item7;
            }
            
            if ($quantChale3 > 0) {
            $item8 = new MercadoPago\Item();
            $item8->title = 'Chalé - 3 dias';
            $item8->quantity = $quantChale3;
            $item8->unit_price = 900.00;
            $items[] = $item8;
            }
            if ($quantCampUmSem > 0) {
                $item9 = new MercadoPago\Item();
                $item9->title = 'Day Use - S/almoço';
                $item9->quantity = $quantCampUmSem;
                $item9->unit_price = 50.00;
                $items[] = $item9;
            }
            if ($quantCampUmMeiaSem > 0) {
                $item10 = new MercadoPago\Item();
                $item10->title = 'Day Use - S/almoço (Meia)';
                $item10->quantity = $quantCampUmMeiaSem;
                $item10->unit_price = 25.00;
                $items[] = $item10;
                }
            
            $preference->items = $items;

            //$preference->notification_url = 'http://localhost.net/popularnation/notification.php';
            $preference->external_reference = "First Camp Nation - Apresente seu Comprovante e documento com Nome:$nome CPF: $cpf";
            $preference->save();
            
            $link = $preference->init_point;
            
             //echo "$link";
            
            

             echo "<form action='$link' class='MP' method='post'>";
            ?>
            <input class="pagar" type="submit"  value="Pagar com MercadoPago">
            </form>

        <?php
        } else {
        ?>
            <h1>Opa, Ocorreu um erro!!</h1>
            <h1 style="color: black;">Retorne ao site anterior ou <a href="index.html" style="color: red;">Clique Aqui</a></h1>
        <?php
        }
        ?>
    </article>
    <footer>
        <div class="logoFinal">
            <img src="PN-FOTO.png" class="imgRodape">
        </div>

        <div class="links">
            <a href="https://wa.me/5511987681431" target="_blank"> <img src="whats.png"></a>
            <a href="https://www.instagram.com/popularnationaircooled/" target="_blank"><img src="insta.png" alt=""></a>
            <a href="https://www.facebook.com/groups/241664779697662/" target="_blank"><img src="face.png" alt=""></a>
        </div>
        <p>&copy; Popular Nation Aircooled Fusca e Derivados</p>
    </footer>
</body>

</html>

<script>
    function disableButton() {
        document.getElementById("myButton").disabled = true;
    }
</script>
<script src="https://www.mercadopago.com/v2/security.js" view="checkout"></script>
