<?php
header('Content-Type:image/jpg');
var_dump($_GET);
$largeur = $_GET['largeur'];

$hauteur = $_GET['hauteur'];

$positionX=$_GET['largeur'];

$positionY=$_GET['hauteur'];
if(intval($positionX)>80 || intval($positionY)>80){
    $positionX=10;
    $positionY=10;
}
function convert_Image($source,$dst,$largeur,$hauteur,$positionX,$positionY){
    $quality=100;
    $largeur=strval ($largeur);
    $hauteur = strval($hauteur);
    //tab[0] largeur tab[1] hauteur
    $imageSize = getimagesize($source);
    $imageRessource = imagecreatefromjpeg($source);
    
    $imageFinal = imagecreatetruecolor($largeur, $hauteur);
    
    $final = imagecopyresampled($imageFinal, $imageRessource, $positionX, $positionY, 0, 0, $largeur, $hauteur, $imageSize[0], $imageSize[1]);
    imagejpeg($imageFinal, $dst, $quality);
    
}

convert_Image("images/original/image.jpg","images/final/image.jpg",$largeur,$hauteur,$positionX,$positionY);
echo "<img src='images/final/image.jpg'/ height='100' width='100'>";
