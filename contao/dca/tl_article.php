<?php

/*
 * This file is part of extendedArticle.
 *
 * (c) Timon Sixt 2022 <mail@tisi-digital.de>
 */

$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace
( 
    'inColumn;',
    'inColumn;{fullsize_legend:hide},fullsize,articleHeightMobile,articleHeightDesktop,articleHeightBreakpoint,verticalAlignment;{background_legend:hide},backgroundColor,backgroundHexColor,addImage;{divider_legend:hide},addDivider;',
    $GLOBALS['TL_DCA']['tl_article']['palettes']['default'] 
); 
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'fullsize';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'addImage';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'addDivider';

// Subpalettes
$GLOBALS['TL_DCA']['tl_article']['subpalettes'] = array(
  'fullsize' => 'fullsizeOffsetElements,addFullsizeScroller,fullsizeScrollerColor,scrollOffsetElements,',
  'addImage' => 'singleSRC,backgroundImageSize,backgroundAttachment,backgroundPosition,backgroundSize,backgroundRepeat,parallax,overlayColor,overlayHexColor,overlayColorAlpha',
  'addDivider' => 'dividerTopShape,dividerTopHeight,dividerTopHexColor,dividerTopBgHexColor,dividerTopSwitch,dividerBottomShape,dividerBottomHeight,dividerBottomHexColor,dividerBottomBgHexColor,dividerBottomSwitch',
);


// Hinzufügen der Feld-Konfiguration 
$GLOBALS['TL_DCA']['tl_article']['fields']['fullsize'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['fullsize'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
  'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['fullsizeOffsetElements'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['fullsizeOffsetElements'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'multiple'=>false, 'size'=>2, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['addFullsizeScroller'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['addFullsizeScroller'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('tl_class'=>'clr w50'),
  'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['fullsizeScrollerColor'] = array 
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['fullsizeScrollerColor'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['fullsizeScrollerColor']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['scrollOffsetElements'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['scrollOffsetElements'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'multiple'=>false, 'size'=>2, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['articleHeightMobile'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['articleHeightMobile'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'multiple'=>false, 'size'=>2, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['articleHeightDesktop'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['articleHeightDesktop'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'multiple'=>false, 'size'=>2, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['articleHeightBreakpoint'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['articleHeightBreakpoint'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'multiple'=>false, 'size'=>2, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['verticalAlignment'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['verticalAlignment'],
  'exclude'                 => true,
  'filter'                  => true,
  'sorting'                 => true,
  'inputType'               => 'select',
  'options'                 => &$GLOBALS['TL_LANG']['tl_article']['verticalAlignment']['options'],
  'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>' clr w50'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundColor'] = array 
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundColor'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['backgroundColor']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['addImage'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['addImage'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
  'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['singleSRC'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['singleSRC'],
  'exclude'                 => true,
  'inputType'               => 'fileTree',
  'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'extensions' => '%contao.image.valid_extensions%', 'tl_class'=>'clr'),
  'sql'                     => "binary(16) NULL"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundAttachment'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundAttachment'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['backgroundAttachment']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundPosition'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundPosition'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['backgroundPosition']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundSize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundSize'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['backgroundSize']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['backgroundRepeat'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['backgroundRepeat'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['backgroundRepeat']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['parallax'] = array 
( 
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['parallax'], 
    'exclude'   => true, 
    'inputType' => 'checkbox', 
    'eval'      => array('mandatory'=>false, 'tl_class'=>'clr'), 
    'sql'       => "char(1) NOT NULL default ''" 
);
$GLOBALS['TL_DCA']['tl_article']['fields']['overlayColor'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['overlayColor'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['overlayColor']['options'],
    //'foreignKey'            => 'tl_user.name',
    //'options_callback'      => array('CLASS', 'METHOD'),
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['overlayHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['overlayHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['overlayColorAlpha'] = array 
(
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['overlayColorAlpha'], 
    'exclude'   => true, 
    'inputType' => 'text', 
    'eval'      => array('mandatory'=>false, 'tl_class'=>'w50'), 
    'sql'       => "varchar(64) NOT NULL default ''" 
);

$GLOBALS['TL_DCA']['tl_article']['fields']['addDivider'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_article']['addDivider'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
  'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['dividerTopShape'] = array 
(
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['dividerTopShape'], 
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['dividerTopShape']['options'],
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerTopHeight'] = array 
(
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['dividerTopHeight'], 
    'exclude'   => true, 
    'inputType' => 'text', 
    'eval'      => array('mandatory'=>false, 'tl_class'=>'w50'), 
    'sql'       => "varchar(64) NOT NULL default ''" 
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerTopHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerTopHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerTopBgHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerTopBgHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['dividerBottomShape'] = array 
(
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomShape'], 
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomShape']['options'],
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'clr w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerBottomHeight'] = array 
(
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomHeight'], 
    'exclude'   => true, 
    'inputType' => 'text', 
    'eval'      => array('mandatory'=>false, 'tl_class'=>'w50'), 
    'sql'       => "varchar(64) NOT NULL default ''" 
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerBottomHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerBottomBgHexColor'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomBgHexColor'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerTopSwitch'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerTopSwitch'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['dividerTopSwitch']['options'],
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_article']['fields']['dividerBottomSwitch'] = array 
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomSwitch'],
    'exclude'                 => true,
    'filter'                  => true,
    'sorting'                 => true,
    'inputType'               => 'select',
    'options'                 => &$GLOBALS['TL_LANG']['tl_article']['dividerBottomSwitch']['options'],
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
