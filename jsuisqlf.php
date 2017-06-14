<?php
/**
 * @package Hello_PNL
 * @version 1.6
 */
/*
Plugin Name: Hello PNL
Plugin URI: http://github.com/qhaensler/hello-pnl/
Description: <b>"Le plug-in ou rien"</b> Ce n’est pas qu’une extension. Elle symbolise l’espoir et l’enthousiasme de toute une génération. Une fois activée, elle affichera une ligne aléatoirement des paroles de la chanson <cite>DA</cite> en haut à droite de toutes les pages de l’administration.
Author: Quentin HAENSLER
Version: 1.0
Author URI: https://qhaensler.com/
*/

function hello_dolly_get_lyric() {
	$lyrics = "Ma frappe y'a personne qui l’arrête
Penalty j'souris au gardien
Igo y'a Mowgli dans l’arène
Ciseaux retourné comme Papin
J'parle pas trop j'me fous du rap
J'négocie l'tarot man
Tes rappeurs c'est tous des tapins
Ils s'passent tous tous la pommade
Toute ma vie j'l'ai ramée dans les ténèbres
J'me réveille j'ai cette haine qui me pénètre
Peu de mandats mais les tasses m'envoient des lettres
Mowgli n'aime pas qu'on lui dise T'es célèbre
Chaque jour c'est la même c'est le biff qui m'fait frissoner
N'aie pas honte de leur mettre ces pédés, moi j'leur pisse au nez
Né dans la jungle j'suis sauvage un gros oinj pour m'isoler
Les grosses tasses qui déboulent sous mon arbre, bah j'les prend en le-le
J'tacle à la gorge comme en BPL wAllah pum pum
Dis à ton pote dans la street c'est la mort ou la bibi
Choisis ton camp mais belek au cas où ça ti-tire
Joue pas l'thug avec ta meuf on sait tu fais l'Titi
J'suis d'l'époque de la Sega j'm'entraîne à frapper comme Sagat
Rico Rico, j'débarque vrr vrr ratatata
Fais gaffe fais gaffe au hebs c'est pa-pata-ta-ta
J'connais le million mais j'chante toujours pas la-la-la-la
Entre nous, trop cramé, ils m'aiment pas, font semblant
C'est chelou, j'suis armé, cœur de pierre, abonné
J'suis Mowgli, j'suis Simba, animal ça s'entend
Hum, hum, dans leur mère, tu connais
DA, DA, DA
Bats les couilles pour eux j'suis nda (da, da)
Bats les couilles qu'ces pédés m'aiment pas (pas, pas)
Au fait moi j'ai les couilles de papa (pa, pa)
Mon Dieu faut qu'j'me dirige vers la Mecque
Mais bon j'suis d'la pire espèce
Avant j'étais moche dans la tess
Aujourd'hui j'plais à Eva Mendes
Gars, gars, gars, gars
J'ai mal, j'vois mes semblables en bas, bas, bas
Faire rampampampa
Hé la, holà ! Tes lèvres ne me font plus penser
Hé la, holà ! Mes rêves ne me font plus bander
J'ai sorti une arme dans l'respect
La patience ? le temps ? pas testé
Gratte pas l'amitié pas d'nouveaux amis
(Pas l'amitié pas d'nouveaux amis)
On enverra Mowgli chercher médaille
J'redoute plus la visite de la flicaille
Tout est possible, j'fais oseille tout devient réel
Elle aime les voyous, jeune sheitana cherche mec mortel
Puta épluche mon cœur
Ton putain de futur au bout d'une chaîne
Ne m'attends pas (-tends pas), ou gâche ta vie dans mes bras
Petit ange qu'elle est séduisante la couronne à Simba
DA, DA, DA
Bats les couilles pour eux j'suis nda (da, da)
Bats les couilles qu'ces pédés m'aiment pas (pas, pas)
Au fait moi j'ai les couilles de papa (pa, pa)
Mon Dieu faut qu'j'me dirige vers la Mecque
Mais bon j'suis d'la pire espèce
Avant j'étais moche dans la tess
Aujourd'hui j'plais à Eva Mendes
Gars, gars, gars, gars
J'ai mal, j'vois mes semblables en bas, bas, bas
Faire rampampampa";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
