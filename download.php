<?php




$z = $_GET["z"];
$xLeft = $_GET["xL"];
$yBottom = $_GET["yB"];

$xRight = $_GET["xR"];
$yTop = $_GET["yT"];




$xLeft_T= $xLeft;
$xRight_T = $xRight;

$yTop_T = $yTop;
$yBottom_T = $yBottom;


while ($yTop_T <= $yBottom_T) {
    print $yTop_T."<br>";
    $xLeft_T= $xLeft;
    while ($xLeft_T<= $xRight_T) {
        downloadSave($z,$xLeft_T,$yTop_T);
        $xLeft_T++;
    }
    $yTop_T++;
}




function downloadSave($z, $x, $y){
    $token = "";
$baseUrl = "https://b.tiles.mapbox.com/v4/jimmyis.a476b589";
    $url = $baseUrl.'/'.$z.'/'.$x.'/'.$y.'.png?'.$token;

    
    
    $img = 'tiles/'.$z.'/'.$x.'/'.$y.'.png';
    if (!file_exists($img)) {
        mkdir('tiles/'.$z.'/'.$x.'/', 0777, true);
        file_put_contents($img, file_get_contents($url));
        print "Download reussi : ".$img."<br>";
    }else{
        print "Fichier deja existant : ".$img."<br>";
    }
}
