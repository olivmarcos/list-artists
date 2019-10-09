<?php

require_once('./database/connection.php');

    if($_POST)
        {
            try {
                $sql = "INSERT INTO TBL_ARTISTS(art_name, art_bio)
                        VALUES (:name, :bio)";
                
                $stmt = $con->prepare($sql);
                
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $bio = htmlspecialchars(strip_tags($_POST['bio']));

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':bio', $bio);
    
                if ($stmt->execute()) {
                    echo '<div class="alert-success">Record was saved</div>';
                }
                else
                    echo '<div class="alert-failed">Failed</div>';
                

            } catch (PDOException $exp) {
                echo ("ERRO: " . $exp->getMessage());
            }
        }
?>
