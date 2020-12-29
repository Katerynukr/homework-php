//how to deleate img from tag or make them all unique
//does it work if i will be chacking by the namespace
//do i create an array of pick that are correct and than check if all match or what is the logic?

<?php 
function RandImg($dir)
{
$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)];
return $randomImage;
} 
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
        <img src="./img/1237645f11.png">
    </div>
    <div class="captcha">
        <form>
            <table>
<?php 
    $count = -1;
    foreach(range(0, 8) as $img){
        $picture = RandImg('./img/');
        $count++;
        if($count === 0 || $count === 3 || $count === 6 ){
            echo "<tr>";
        }
        echo "<td>
                <input type=\"checkbox\" id=\"myCheckbox.$count\" />
                <label for=\"myCheckbox.$count\"><img src=\"$picture\" /></label>
            </td>";
        if($count === 2 || $count === 5 || $count === 8 ){
            echo "</tr>";
        }
    }
?>
                <!-- <tr>
                    <td>
                        <input type="checkbox" id="myCheckbox1" />
                        <label for="myCheckbox1"><img src="#" /></label>
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox2" />
                        <label for="myCheckbox2"><img src="#" /></label> 
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox3" />
                        <label for="myCheckbox3"><img src="#" /></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="myCheckbox4" />
                        <label for="myCheckbox4"><img src="#" /></label>
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox5" />
                        <label for="myCheckbox5"><img src="#" /></label>
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox6" />
                        <label for="myCheckbox6"><img src="#" /></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="myCheckbox7" />
                        <label for="myCheckbox7"><img src="#" /></label>
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox8" />
                        <label for="myCheckbox8"><img src="#" /></label>
                    </td>
                    <td>
                        <input type="checkbox" id="myCheckbox9" />
                        <label for="myCheckbox9"><img src="#" /></label>
                    </td>
                </tr> -->
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