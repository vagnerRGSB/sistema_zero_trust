<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema zero trust</title>
    <?= view("layouts/partials/styles",[],["cache"=>60,"cache_name"=>"partials_styles"])?>
    <?= $this->renderSection("style") ?>
    
</head>
<body>
    <?= $this->renderSection("conteudo") ?>

    <?= view("layouts/partials/scripts",[],["cache"=>60,"cache_name"=>"partials_scripts"]) ?>
    <?= $this->renderSection("script") ?>
    
</body>
</html>