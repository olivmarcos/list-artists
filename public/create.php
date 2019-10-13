<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>
    <h1>Insert</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div>
                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="img" placeholder="Foto"><br>
                <textarea rows="4" cols="50" name="bio" placeholder="Biography"></textarea><br>
                <button type="submit" class="btn1">Insert</button>
            </div>
        </form>
    </section>

    <?php
        include('database.php');

        if($_POST)
        {
            try {

                $sql = "INSERT INTO TBL_ARTISTS(art_name, art_bio, art_img)
                        VALUES (:name, :bio, :img)";
                
                $stmt = $con->prepare($sql);
                
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $bio = htmlspecialchars(strip_tags($_POST['bio']));
                $img = htmlspecialchars(strip_tags($_POST['img']));

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':bio', $bio);
                $stmt->bindParam(':img', $img);
    
                if ($stmt->execute()) {
                    echo '<div class="alert-success">Record ws saved</div>';
                }
                else
                    echo '<div class="alert-failed">Failed</div>';
                

            } catch (PDOException $exp) {
                echo ("ERRO: " . $exp->getMessage());
            }
        }
    ?>

</body>

</html>