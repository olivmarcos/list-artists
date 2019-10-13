<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artists</title>
    <link rel="stylesheet" href="artists.css">
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
                    echo    "<div id='container'>
                                <div class='artists'>
                                    <h1> {$row['art_name']} </h1><br>

                                    <div class='img'>
                                        <img src='/images/{$row['art_img']}' ><br>
                                    </div> <br>
                                    <div class='bio'>
                                        <h3>Biografia:</h3> <p>{$row['art_bio']}</p> <br>
                                    </div>
                                </div>
                            </div>";
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