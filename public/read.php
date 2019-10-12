<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artists</title>
</head>
<body>
    <div class="container">
    <!-- <img src='/images/me.jpeg'> -->
        <?php
        include('database.php');

        try {
            $sql = "SELECT art_name, art_bio, art_img FROM TBL_ARTISTS ORDER BY art_name";

            $stmt = $con->prepare($sql);
            
            if ( $stmt->execute() ) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo    "Nome: {$row['art_name']} <br>
                            Biografia: {$row['art_bio']} <br>";
                    echo "<img src='/images/{$row['art_img']}'>";
                }
            }
            else
                echo "Conexão com o banco não foi possível";
        } catch (PDOException $exp) {
            echo ("ERRO: " . $exp->getMessage());
        }

        ?>
    </div>
</body>
</html>