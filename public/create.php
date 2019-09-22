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
                <textarea rows="4" cols="50" name="bio" placeholder="Biography"></textarea><br>
                <button type="submit" class="btn1">Insert</button>
            </div>
        </form>
    </section>

    <?php

        $host = "mysql-crud";
        $db_name = "db_dev";
        $username = "user";
        $password = "123.456";

        if($_POST)
        {
            try {
                $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

                $sql = "INSERT INTO TBL_ARTISTS(art_name, art_bio)
                        VALUES (:name, :bio)";
                
                $stmt = $con->prepare($sql);
                
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $bio = htmlspecialchars(strip_tags($_POST['bio']));

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':bio', $bio);
    
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