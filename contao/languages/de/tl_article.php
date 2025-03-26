<?php
/*
 * This file is part of extendedArticle.
 *
 * (c) Timon Sixt 2022 <mail@tisi-digital.de>
 */

$GLOBALS['TL_LANG']['tl_article']['fullsize_legend'] = 'Höhe des Artikels';
$GLOBALS['TL_LANG']['tl_article']['background_legend'] = 'Hintergrundbild / -farbe';
$GLOBALS['TL_LANG']['tl_article']['divider_legend'] = 'Divider';

$GLOBALS['TL_LANG']['tl_article']['fullsize'] = array('Volle Höhe', 'den Artikel in der Höhe dem Viewport anpassen');
$GLOBALS['TL_LANG']['tl_article']['fullsizeOffsetElements'] = array('Offset Elemente für Fullsize-Höhe', 'Elemente, die bei der Berechnung der Fullsize-Höhe abgezogen werden sollen. Mehrere Elemente mit | trennen. Z.B. header|#breadcrumb ');
$GLOBALS['TL_LANG']['tl_article']['addFullsizeScroller'] = array('Scroll-Button hinzufügen', 'Dem Artikel ein klickbares Element zum nach unten scrollen hinzufügen');
$GLOBALS['TL_LANG']['tl_article']['fullsizeScrollerColor'] = array('Farbe des Scroll-Buttons', '');
$GLOBALS['TL_LANG']['tl_article']['scrollOffsetElements'] = array('Offset Elemente für Scroll-Funktion', 'Elemente, die bei der Scroll-Funktion abgezogen werden sollen. Mehrere Elemente mit | trennen. Z.B. header|#breadcrumb ');
$GLOBALS['TL_LANG']['tl_article']['articleHeightMobile'] = array('Höhe des Artikels auf Mobilgeräten', '');
$GLOBALS['TL_LANG']['tl_article']['articleHeightDesktop'] = array('Höhe des Artikels auf Desktopgeräten und Tablets', '');
$GLOBALS['TL_LANG']['tl_article']['articleHeightBreakpoint'] = array('Breakpoint', 'Breakpoint (min-width) bei dem von Mobile auf Desktop-Höhe gewechselt wird.');
$GLOBALS['TL_LANG']['tl_article']['verticalAlignment'] = array('Inhalt vertikal anordnen', '');

$GLOBALS['TL_LANG']['tl_article']['backgroundColor'] = array('Artikel Hintergrundfarbe', 'Wählen Sie eine Hintergrundfarbe aus.');
$GLOBALS['TL_LANG']['tl_article']['backgroundHexColor'] = array('Eigene Hintergrundfarbe', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['addImage'] = array('Ein Bild hinzufügen', 'Dem Inhaltselement ein Bild hinzufügen.');
$GLOBALS['TL_LANG']['tl_article']['singleSRC'] = array('Quelldatei', 'Bitte wählen Sie eine Datei oder einen Ordner aus der Dateiübersicht.');
$GLOBALS['TL_LANG']['tl_article']['backgroundAttachment'] = array('Fixierung', '');
$GLOBALS['TL_LANG']['tl_article']['backgroundPosition'] = array('Position', '');
$GLOBALS['TL_LANG']['tl_article']['backgroundSize'] = array('Größe', '');
$GLOBALS['TL_LANG']['tl_article']['backgroundRepeat'] = array('Wiederholen', '');
$GLOBALS['TL_LANG']['tl_article']['parallax'] = array('Parallax Effekt', 'Den Parallax-Effekt für das Hintergrundbild ein-/ausschalten.');
$GLOBALS['TL_LANG']['tl_article']['overlayColor'] = array('Überlagernde Farbe', 'Überlagernde Farbe auswählen.');
$GLOBALS['TL_LANG']['tl_article']['overlayHexColor'] = array('Eigene überlagernde Farbe', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['overlayColorAlpha'] = array('Deckkraft der überlagernden Farbe', 'Deckkraft der überlagernden Farbe einstellen: undurchsichtig = 100, 0 = durchsichtig');

$GLOBALS['TL_LANG']['tl_article']['addDivider'] = array('Divider hinzufügen', 'Dem Artikel einen Divider hinzufügen.');
$GLOBALS['TL_LANG']['tl_article']['dividerTopShape'] = array('Form des oberen Dividers', '');
$GLOBALS['TL_LANG']['tl_article']['dividerTopHeight'] = array('Höhe des oberen Dividers', 'Höhe in Pixel ohne Einheit angeben');
$GLOBALS['TL_LANG']['tl_article']['dividerTopHexColor'] = array('Farbe des oberen Dividers', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['dividerTopBgHexColor'] = array('Hintergrundfarbe des oberen Dividers', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['dividerTopSwitch'] = array('Spiegelung des oberen Dividers', '');
$GLOBALS['TL_LANG']['tl_article']['dividerBottomShape'] = array('Form des unteren Dividers', '');
$GLOBALS['TL_LANG']['tl_article']['dividerBottomHeight'] = array('Höhe des unteren Dividers', 'Höhe in Pixel ohne Einheit angeben');
$GLOBALS['TL_LANG']['tl_article']['dividerBottomHexColor'] = array('Farbe des unteren Dividers', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['dividerBottomBgHexColor'] = array('Hintergrundfarbe des unteren Dividers', 'Farbe als HEX-Wert, z.B. ffffff');
$GLOBALS['TL_LANG']['tl_article']['dividerBottomSwitch'] = array('Spiegelung des unteren Dividers', '');
  


$GLOBALS['TL_LANG']['tl_article']['fullsizeScrollerColor']['options'] = array (
  'light' => 'hell',
  'dark' => 'dunkel',
);
$GLOBALS['TL_LANG']['tl_article']['backgroundColor']['options'] = array (
  'ffffff' => 'Weiß',
  '000000' => 'Schwarz',
  'individual' => 'Eigene Farbe',
);
$GLOBALS['TL_LANG']['tl_article']['backgroundPosition']['options'] = array (
  'left top' => 'left top',
  'center top' => 'center top',
  'right top' => 'right top',
  'left' => 'left center',
  'center' => 'center center',
  'right' => 'right center',
  'left bottom' => 'left bottom',
  'center bottom' => 'center bottom',
  'right bottom' => 'right bottom',
);
$GLOBALS['TL_LANG']['tl_article']['backgroundRepeat']['options'] = array (
  'no-repeat' => 'no-repeat',
  'repeat-x' => 'repeat-x',
  'repeat-y' => 'repeat-y',
  'repeat' => 'repeat'
);
$GLOBALS['TL_LANG']['tl_article']['backgroundSize']['options'] = array (
  'auto auto' => 'auto auto',
  'cover' => 'cover',
  'contain' => 'contain',
);

$GLOBALS['TL_LANG']['tl_article']['backgroundAttachment']['options'] = array (
  'scroll' => 'scroll',
  'fixed' => 'fixed',
);
$GLOBALS['TL_LANG']['tl_article']['overlayColor']['options'] = array (
  'ffffff' => 'Weiß',
  '000000' => 'Schwarz',
  'individual' => 'Eigene Farbe',
);
$GLOBALS['TL_LANG']['tl_article']['verticalAlignment']['options'] = array (
  'center' => 'mittig',
  'flex-start' => 'oben',
  'flex-end' => 'unten',
);
$GLOBALS['TL_LANG']['tl_article']['dividerTopShape']['options'] = array (
  'schraege' => 'Schräge',
  'schraegeAlpha' => 'Schräge (schattiert)',
  'bogen' => 'Bogen',
  'bogenAsymetrisch' => 'Bogen (asymetrisch)',
  'dreieck' => 'Dreieck',
  'spitze' => 'Spitze',
  'spitzeInvers' => 'Spitze (invers)',
  'wellen' => 'Wellen',
  'wellenAlpha' => 'Wellen (schattiert)',
  'schindeln' => 'Schindeln',
);
$GLOBALS['TL_LANG']['tl_article']['dividerBottomShape']['options'] = array (
  'schraege' => 'Schräge',
  'schraegeAlpha' => 'Schräge (schattiert)',
  'bogen' => 'Bogen',
  'bogenAsymetrisch' => 'Bogen (asymetrisch)',
  'dreieck' => 'Dreieck',
  'spitze' => 'Spitze',
  'spitzeInvers' => 'Spitze (invers)',
  'wellen' => 'Wellen',
  'wellenAlpha' => 'Wellen (schattiert)',
  'schindeln' => 'Schindeln',
);
$GLOBALS['TL_LANG']['tl_article']['dividerTopSwitch']['options'] = array (
  'horizontal' => 'horizontal',
  'vertical' => 'vertikal',
  'both' => 'horizontal und vertikal',
);
$GLOBALS['TL_LANG']['tl_article']['dividerBottomSwitch']['options'] = array (
  'horizontal' => 'horizontal',
  'vertical' => 'vertikal',
  'both' => 'horizontal und vertikal',
);
