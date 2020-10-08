<?php
include_once "htmlparser/simple_html_dom.php";

$baseURL = "https://terrikon.com";
$html = file_get_html("$baseURL/football/italy/championship/archive");
$archiveLinks = null;
$teams = null;

$teamSelected = false;
if(isset($_POST['team-name-select'])){
    $teamSelected = true;
    $results = null;
}
//searching all archives
foreach($html->find('.tab') as $element)
    foreach($element->find('a') as $link){
        $archiveLinks[] =  $link->href;
    }

    $counter = 0;
foreach ($archiveLinks as $element){
    
    $archive = file_get_html($baseURL.$element);
    
    
    if($teamSelected){
        $results[$counter]['season'][] = $archive->find(".maincol .id h1")[0]->plaintext;
    }
    
    
    $archive = $archive->find("table.colored.big")[0];
    foreach ($archive->find("tr") as $table) {
        if($teamSelected){
            $results[$counter]['team'][] = $table->find("td")[1]->plaintext;
        }
        $teams[] = $table->find("td")[1]->plaintext;
    }
}



$teams = array_values(array_unique($teams));
array_shift($teams)
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>4th task</title>
</head>
<body>
    <form action="" method="post">
        <select name="team-name-select" id="team-name-select">
            <option value="" 
                <?php
                    if(!$teamSelected)
                        echo "selected";
                ?>
                >Выберите команду</option>
            <?php
                foreach ($teams as $key=>$value)
                {
                    if($key == $_POST['team-name-select'] && $teamSelected)
                        echo "<option value=\"$key\" selected>$value</option> \n";
                    else
                        echo "<option value=\"$key\">$value</option> \n";
                }
            ?>
        </select>
        <input type="submit">
    </form>


    <?php
    if($teamSelected) {
        foreach ($results[0]['season'] as $value) {
            for ($i = 0; $i < 21; $i++) {
                $team = array_shift($results[0]['team']);
                if ($team == $teams[$_POST['team-name-select']]) {
                    echo $value . '<br>';
                    echo "Команда заняла " . $i . " место!<br>";
                }
            }
        }
    }
    ?>
</body>
</html>
