<?php
session_start();

_d($_POST['captcha'], 'post');
_d($_POST['compare'], 'field');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_POST['captcha'])){
        $_SESSION['warn'] = 'You didn not select anything. Try again!';
        header("Location: http://localhost/try/php/captcha/captcha.php");
        exit;
    }else{
       $decode = _POST['compare'];
    //    $i = $_POST['captcha'];
    //    $re = '/f/m';
    //    foreach($i as $value){
    //        _d($value, 'jkj');
    //     foreach($decode as $index => $element){
    //         if($value == $index){
    //             $result = preg_match_all($re, $element, $matches, PREG_SET_ORDER, 0);
    //             if(empty($result)){
    //                 $_SESSION['warn'] = 'You did not pick the right one!';
    //                 header("Location: http://localhost/try/php/captcha/captcha.php");
    //                 exit;
    //             }
    //         }
    //     }
    //    }
       
    }
}
?>

<?php 
// function RandImg($dir)
// {
$images = glob('./img/' . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
shuffle($images);
// $randomImage = $images[array_rand($images)];
// return $randomImage;
// } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .example,
    .captcha{
        display:inline-block;
        width: 440px;
        margin-left: calc((100% - 440px) / 2);
    }
        .example > p {
            display: inline-block;
            width: 70%;
            float: left;
        }
        .example > img {
            display: inline-block;
            width: 30%;
            float: right;
            width: 100px;
            height: 100px;
        }

    input[type=checkbox]{
        display:none;
    }
        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

        label::before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
        }

        label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
        }

        :checked+label {
        border-color: #ddd;
        }

        :checked+label::before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
        }

        :checked+label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
        }
</style>
<body>
    <div class="example">
        <p>Select all the images that match this one</p>
        <img src="./imgDefault/1237645f11.png">
    </div>
    <div class="captcha">
        <form action="" method="post">
            <table>
            <tr>
            <?php if(isset($_SESSION['warn'])): ?>
            <h2 style="color:red;"><?= $_SESSION['warn'] ?></h2>
            <?php unset($_SESSION['warn'])?>
            <?php endif ?>
            </tr>
<?php 
    $count = -1;
    foreach(range(0, 8) as $index => $o){
        $picture = $images[$index];
        $count++;
        if($count === 0 || $count === 3 || $count === 6 ){
            echo "<tr>";
        }
        echo "<td>
                <input type=\"checkbox\" name=\"captcha[]\" id=\"myCheckbox.$count\" value=\"$count\" />
                <label for=\"myCheckbox.$count\"><img src=\"$picture\" /></label>
                <input type=\"hidden\" name=\"compare[]\" value=\"$picture\" />
            </td>";
        if($count === 2 || $count === 5 || $count === 8 ){
            echo "</tr>";
        }
    }
?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <button type="submit" name="verify">Veryfi</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>