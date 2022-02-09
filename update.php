<?php
    include("conexao.php"); 

        //---------ATUALIZAR CLIENTE---------------------------------------------------------------------------------------------------------------

        if($_POST["acao"] == "clientUpdate"){

            $name_client  = $_POST['name_client']; 
            $cpf   = $_POST['cpf'];
            $rg    = $_POST['rg'];
            $email = $_POST['email'];
            $tel1  = $_POST['tel1'];
            $tel2  = $_POST['tel2'];
            $birth = $_POST['birth'];
            $id    = $_POST['id'];

            $stmt = $pdo->prepare("UPDATE clients SET name_client=?,cpf=?,rg=?,email=?,tel1=?,tel2=?,birth=? WHERE id=?");

            $stmt->bindParam(1, $name_client); 
            $stmt->bindParam(2, $cpf); 
            $stmt->bindParam(3, $rg);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $tel1);
            $stmt->bindParam(6, $tel2);
            $stmt->bindParam(7, $birth);
            $stmt->bindParam(8, $id);

            $stmt->execute(); 

            echo json_encode("CLIENTE ATUALIZADO");
            

        }

        //-----------ATUALIZAR ENDEREÇO---------------------------------------------------------------------------------------------------------

        if($_POST["acao"] == "addressUpdate"){

            $state      = $_POST['state'];
            $CEP        = $_POST['CEP'];  
            $city       = $_POST['city'];
            $district   = $_POST['district'];
            $street     = $_POST['street'];
            $number     = $_POST['number'];
            $id_address = $_POST['id_address'];

            $stmt = $pdo->prepare("UPDATE clients_address SET state=?,CEP=?,city=?,district=?,street=?,number=? WHERE id_address=?"); 
            
            $stmt->bindParam(1, $state); 
            $stmt->bindParam(2, $CEP); 
            $stmt->bindParam(3, $city);
            $stmt->bindParam(4, $district);
            $stmt->bindParam(5, $street);
            $stmt->bindParam(6, $number);
            $stmt->bindParam(7, $id_address);
            
            $stmt->execute();

            echo json_encode("ENDEREÇO ATUALIZADO");
            

        }


        //-----------DESATIVAR CLIENTE----------------------------------------------------------------------------------------------------------

       
        if($_POST["acao"] == "ativar"){ 

            $id  = $_POST['id'];

            $prin = $pdo->prepare("UPDATE clients SET active='1' WHERE id=?");

            $prin->bindParam(1, $id);

            $prin->execute();

            echo json_encode("alterado");

        }

        if($_POST["acao"] == "desativar"){ 

            $id = $_POST['id'];

            $stmt = $pdo->prepare("UPDATE clients SET active='0' WHERE id=?");

            $stmt->bindParam(1, $id);

            $stmt->execute(); 

            echo json_encode("alterado");

        }

        //----------PRINCIPAL ENDEREÇO-----------------------------------------------------------------------------------------------------------

        if($_POST["acao"] == "prinEnd"){ 

            $id_address = $_POST['id_address'];
            $id_client  = $_POST['id_client'];

            $prin = $pdo->prepare("UPDATE clients_address SET main_address='1' WHERE id_client=?");

            $prin->bindParam(1, $id_client);

            $prin->execute();

            $stmt = $pdo->prepare("UPDATE clients_address SET main_address='2' WHERE id_address=?");

            $stmt->bindParam(1, $id_address);

            $stmt->execute();

            echo json_encode("alterado");


        }

        //-------------MUDAR DE ENDEREÇO PRINCIPAL PARA OPCIONAL--------------------------------------------------------------------------------

        if($_POST["acao"] == "removeprin"){ 

            $id = $_POST['id'];

            $stmt = $pdo->prepare("UPDATE clients_address SET main_address='1' WHERE id_address=?");

            $stmt->bindParam(1, $id);

            $stmt->execute(); 

            echo json_encode("alterado");

        }

        //--------------DESATIVAR ENDEREÇO------------------------------------------------------------------------------------------------------
    
        if($_POST["acao"] == "deletarEnd"){

            $id = $_POST['id'];

            $stmt = $pdo->prepare("UPDATE clients_address SET active_address='0' WHERE id_address=?");
            
            $stmt->bindParam(1, $id);
            
            $stmt->execute(); 
            
            echo json_encode("alterado");

        }


?>   