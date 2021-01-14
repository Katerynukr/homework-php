<?php
if(isset($_SESSION['err'])){
    if($_SESSION['err'] === 1){
        echo '<h3 style="color:red;">Cannot be planted negative amount of bushes</h3>';
    }
    if($_SESSION['err'] === 2){
        echo '<h3 style="color:red;">Cannot be planted more than 4 bushes at once</h3>';
    } else {
        echo '<h3 style="color:red;">Impossible to plant</h3>';
    }
    unset($_SESSION['err']);
}
?>