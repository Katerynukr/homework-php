<?php if (isset($error)): ?>
    <?php if(1 == $error): ?>
    <h3 style="color:red;">Cannot be planted negative amount of bushes</h3>
    <?php endif ?>
    <?php if(2 == $error): ?>
    <h3 style="color:red;">Cannot be planted more than 4 bushes at once</h3>
    <?php endif ?>
    <?php unset($error) ?>
<?php endif ?>