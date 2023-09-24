<?php
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
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores enviados pelo formulário
    //$quantChale3 = $_POST['quantChale3'];
    //$quantChale = $_POST['quantChale'];
    $quantChale = 0;
    $quantChale3 = 0;
    $quantCampCompleto = $_POST['quantCampCompleto'];
    $quantCampCompletoMeia = $_POST['quantCampCompletoMeia'];
    $quantCampDois = $_POST['quantCampDois'];
    $quantCampDoisMeia = $_POST['quantCampDoisMeia'];
    $quantCampUm = 0;
    $quantCampUmMeia = 0;
    $quantCampUmSem = $_POST['quantCampUmSem'];
    $quantCampUmMeiaSem = $_POST['quantCampUmMeiaSem'];

    // Realiza os cálculos necessários
    $totalChale3 =  $quantChale3 * 900;
    $totalChale = $quantChale * 600;
    $totalCamp = ($quantCampCompleto * 180) + ($quantCampCompletoMeia * 90);
    $totalCampDois = ($quantCampDois * 130) + ($quantCampDoisMeia * 65);
    $totalCampUm = ($quantCampUm * 75) + ($quantCampUmMeia * 37.5);
    $totalCampUmSem = ($quantCampUmSem * 50) + ($quantCampUmMeiaSem * 25);

    $valorTotal = $totalChale3 + $totalChale + $totalCamp + $totalCampDois + $totalCampUm + $totalCampUmSem;

    // Armazena o valor na sessão
    $_SESSION['total'] = $valorTotal;
    $_SESSION['quantChale3'] = $quantChale3;
    $_SESSION['quantChale'] = $quantChale;
    $_SESSION['quantCampCompleto'] = $quantCampCompleto;
    $_SESSION['quantCampCompletoMeia'] = $quantCampCompletoMeia;
    $_SESSION['quantCampDois'] = $quantCampDois;
    $_SESSION['quantCampDoisMeia'] = $quantCampDoisMeia;
    $_SESSION['quantCampUm'] = $quantCampUm;
    $_SESSION['quantCampUmMeia'] = $quantCampUmMeia;
    $_SESSION['quantCampUmSem'] = $quantCampUmSem;
    $_SESSION['quantCampUmMeiaSem'] = $quantCampUmMeiaSem;
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reset.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastramento</title>
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
        <div class="cabecalho">
        <nav>
            <a href="index.html" style="color: red    ;">Cancelar</a>
        </nav>
        </div>
        </header>
        <br>
        <article>

            <br>

            <?php
            if($quantChale || $quantCampCompleto || $quantCampCompletoMeia || $quantCampDois || $quantCampDoisMeia || $quantCampUm || $quantCampUmMeia || $quantChale3 || $quantCampUmSem || $quantCampUmMeiaSem > 0 ){
            ?>


            <div class="Carrinho">

                <h1>Sua compra</h1>
                
                
                <table>
                <tr class="linhaInicial">
                    
                    <td>Pacotes</td>
                    <td>Preço</td>
                    <td>Quantidade - Inteira</td>
                    <td>Quantidade - Meia</td>
                    <td>Total</td>
                </tr>
                <tr>
                    <td>Chalé 3 dias</td>
                    <td>R$ 900,00</td>
                    <td><?php echo $quantChale3; ?></td>
                    <td>Indisponível</td>
                    <td><?php echo 'R$ '. number_format($totalChale3,2); ?></td>
                </tr>
                <tr>
                    <td>Chalé 2 dias</td>
                    <td>R$ 600,00</td>
                    <td><?php echo $quantChale; ?></td>
                    <td>Indisponível</td>
                    <td><?php echo 'R$ '. number_format($totalChale,2); ?></td>
                </tr>
                <tr>
                    <td>Camp 3 dias</td>
                    <td>R$ 180,00</td>
                    <td><?php echo $quantCampCompleto; ?></td>
                    <td><?php echo $quantCampCompletoMeia; ?></td>
                    <td><?php echo 'R$ '. number_format($totalCamp,2); ?></td>
                </tr>
                <tr>
                    <td>Camp 2 dias</td>
                    <td>R$ 130,00</td>
                    <td><?php echo $quantCampDois; ?></td>
                    <td><?php echo  $quantCampDoisMeia; ?></td>
                    <td><?php echo 'R$ '. number_format($totalCampDois,2) ; ?></td>
                </tr>
                <tr>
                    <td>Day USE</td>
                    <td>R$ 75,00</td>
                    <td><?php echo $quantCampUm; ?></td>
                    <td><?php echo $quantCampUmMeia; ?></td>
                    <td><?php echo 'R$ '. number_format($totalCampUm,2); ?></td>
                </tr>
                <tr>
                    <td>Day USE - S/ almoço</td>
                    <td>R$ 50,00</td>
                    <td><?php echo $quantCampUmSem; ?></td>
                    <td><?php echo $quantCampUmMeiaSem; ?></td>
                    <td><?php echo 'R$ '. number_format($totalCampUmSem,2); ?></td>
                </tr>
            </table>
            
              <h1 style="font-family: texto; color: black; font-size: 30px;"><?php echo "Total : R$ ". number_format($valorTotal,2)  ?></h1>
            </div>
        




            <div class="formulario">
                <h1>Faça seu Cadastro</h1>

                
             
                    <form action="Pagamento.php" method="post">
                    <ul>
                    <p>Nome Completo : </p>
                    <input name="nome" type="text" placeholder="DIGITE AQUI SEU NOME COMPLETO !" required>

                    <p>C P F : </p>

                    <input type="text" name="cpf" pattern="\d{11}" placeholder="DIGITE SEM USAR PONTOS, ESPAÇOS OU TRAÇOS" required>

                    <p>Email :</p>
                    <input name="email" type="email" placeholder="DIGITE AQUI SEU EMAIL !" required>

                    <P>Número de Telefone :</P>
                    <input name="tel" type="tel" pattern="[0-9]{11}" placeholder="DIGITE SEM USAR PARENTESES E ESPAÇOS!" required>

                    <p>Endereço :</p>

                    <ul>
                        <li><input type="text" name="endereco" placeholder="Endereço" required></li>
                        <li><input type="text" name="cidade" placeholder="Cidade" required></li>
                        <select id="estado" name="estado" required>
                        <option value="Acre">Acre</option>
                        <option value="Alagoas">Alagoas</option>
                        <option value="Amapá">Amapá</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Ceará">Ceará</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Espírito Santo">Espírito Santo</option>
                        <option value="Goiás">Goiás</option>
                        <option value="Maranhão">Maranhão</option>
                        <option value="Mato Grosso">Mato Grosso</option>
                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Pará">Pará</option>
                        <option value="Paraíba">Paraíba</option>
                        <option value="Paraná">Paraná</option>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Piauí">Piauí</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rondônia">Rondônia</option>
                        <option value="Roraima">Roraima</option>
                        <option value="Santa Catarina">Santa Catarina</option>
                        <option value="São Paulo" selected>São Paulo</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Tocantins">Tocantins</option>
                        </select>
                    </ul>
                    
                    <input type='submit' name='submit' value='Prosseguir' onclick="disableButton();">


            </form>
            </div>

            <?php
            } else {
            ?>

            <h1>Opa, Adicione a quantidade do produto!!</h1>
            <h1 style="color: black;">Retorne ao site anterior ou <a href="index.html" style="color: red;">Clique Aqui</a></h1>
            <?php
            }
            ?>
        </article>
        <br>
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
