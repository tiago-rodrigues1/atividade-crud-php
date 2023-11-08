<?php include "parts/head.php"; ?>
<body>
    <?php include "parts/header.php"; ?>
    <?php 
        $id = $_GET["id"] ?? 0;
        $action = "ws/save.php";

        if ($id > 0) {
            $db = new PDO("sqlite:musicas.sqlite");
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            $id = $_GET["id"];

            $q = $db->query("SELECT * FROM musicas WHERE id=:id");

            $q->bindParam(":id", $id);
            $q->execute();

            $musica = $q->fetch();
            $action = "ws/edit.php";
            
        }
    ?>
    <main class="container">
        <form action="<?= $action ?>" method="get">
            <?php 
                if ($id > 0) {  
            ?>
                <input type="hidden" name="id" value="<?= $id ?>">
            <?php } ?>
            <div class="form-group">
                <label for="txtMusica">Música</label>
                <input type="text" class="form-control" name="nome" id="txtMusica" placeholder="Nome da música" value="<?= $id > 0 ? $musica->nome : "" ?>">
            </div>
            <div class="form-group">
                <label for="txtBanda">Banda</label>
                <input type="text" class="form-control" name="banda" id="txtBanda" placeholder="Nome da banda" value="<?= $id > 0 ? $musica->banda : "" ?>">
            </div>
            <input type="submit" value="Salvar" class="btn btn-success">
        </form>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>