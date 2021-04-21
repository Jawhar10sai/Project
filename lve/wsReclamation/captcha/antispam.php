<?php

//Démarrage de la session
session_start();

//Définition du chemin absolut
if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');

/*
fonction qui génère un captcha code. 
elle prend en paramètre la taille du code captcha
*/
function generateCaptchaCode($length) {
 // $chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstvwxyz';
 $chars = '123456789abcdefghijklmnopqrstvwxyz';
  $captcha_code = '';
  for ($i=0; $i<$length; $i++) {
    $captcha_code .= $chars{ mt_rand( 0, strlen($chars)-1 ) };
  }
  return $captcha_code;
}

/*
Récupération de l'image background
glob va récupérer les chemins des images avec extension png
*/
$captchabgs = glob('captchabgs/*.png');

//choix aléatoire de l'images background
$captchabg = $captchabgs[array_rand($captchabgs)];

/*
On récupère la liste des polices qu'on va utilisé
*/
$captchafonts = glob('fonts/*.otf');

//génération du code captcha
$captcha = generateCaptchaCode(4);

//stocker le code captcha crypté en session
$_SESSION['sysCaptchaCode'] = md5($captcha);

/*
création de l'image background à partir du chemin récupéré
en utilisant imagecreatefrompng. Cette image sera éditer
et renvoyer comme image captcha
*/
$captchaimg = imagecreatefrompng($captchabg);

/*
Définition des couleurs pour les caractères.
imagecolorallocate permet de définir une couleur à base du RVB et l'associé à une image créée.
*/
$colors=array (	/*imagecolorallocate($captchaimg, 81,81,172),
                imagecolorallocate($captchaimg,  72,72,75),
                imagecolorallocate($captchaimg, 143,143,212),
                imagecolorallocate($captchaimg, 168,168,249),
                imagecolorallocate($captchaimg, 120,122,135),
                imagecolorallocate($captchaimg, 40,59,80),
                imagecolorallocate($captchaimg, 204,225,249)*/
				imagecolorallocate($captchaimg, 0,0,0) );

/*
le text sera incliné sur l'image captcha, on va donc définir un tableau
des inclinaisons
*/
$inclinaison = array ( mt_rand( -25, 25 ),
			mt_rand( -25, 25 ),
			mt_rand( -25, 25 ),
			mt_rand( -25, 25 ),
			mt_rand( -25, 25 ),
			mt_rand( -25, 25 ),
			mt_rand( -25, 25 ));

/*
génération de l'image captcha en écrivant du texte sur l'image background en utilisant imagettftext(image, taille police, inclinaison, coordonnée X, coordonnée Y, couleur, police, texte)
*/
for ($i = 0; $i < 7; $i++) {
imagettftext($captchaimg, 20, $inclinaison[$i], (35*$i) +15, 20, $colors[array_rand($colors)], ABSPATH.$captchafonts[array_rand($captchafonts)], $captcha[$i]);
}

//Définition de l'en-tête HTTP de la page.
header('Content-Type: image/png');

//Renvoie de l'image captcha
imagepng($captchaimg);

//Destruction de l'image en mémoire
imagedestroy($captchaimg);
?>
