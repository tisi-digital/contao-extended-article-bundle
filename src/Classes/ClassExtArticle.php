<?php
declare(strict_types=1);

/*
 * This file is part of extendedArticle.
 * 
 * (c) Timon Sixt 2022 <mail@tisi-digital.de>
 */

namespace TisiDigital\ContaoExtendedArticleBundle\Classes;

use Contao\ArticleModel;
use Contao\FilesModel;
use Contao\StringUtil;

class ClassExtArticle
{
    public function myGetArticle(ArticleModel $objRow): void
    {
      $strAddCss = "";
      $strAddJS = "";

       // ID = $arrCSS[0], Class = $arrCSS[1]
      $arrCSS = StringUtil::deserialize($objRow->cssID, true);
      $cssId = ($arrCSS[0] ? '#' . $arrCSS[0] : '#article-' . $objRow->id);
      
      if ($objRow->backgroundColor) {
        $backgroundColor = '#' . ($objRow->backgroundColor == 'individual' ? $objRow->backgroundHexColor : $objRow->backgroundColor ) ;

      } else {
        $backgroundColor = 'transparent';
      }
     
      if ($objRow->overlayColor) {

        $overlayColor = ($objRow->overlayColor == 'individual' ? $objRow->overlayHexColor : $objRow->overlayColor ) ;
        
        if ( strlen($overlayColor) == 3 ) {
          $rgb_r = hexdec(substr($overlayColor,0,1) . substr($overlayColor,0,1));
          $rgb_g = hexdec(substr($overlayColor,1,1) . substr($overlayColor,1,1));
          $rgb_b = hexdec(substr($overlayColor,2,1) . substr($overlayColor,2,1));
        } elseif ( strlen($overlayColor) == 6 ) {
          $rgb_r = hexdec(substr($overlayColor,0,2));
          $rgb_g = hexdec(substr($overlayColor,2,2));
          $rgb_b = hexdec(substr($overlayColor,4,2));
        } else {
          $rgb_r = 255;
          $rgb_g = 255;
          $rgb_b = 255;
        }

        $overlayColorAlpha = ( $objRow->overlayColorAlpha && $objRow->overlayColorAlpha != 0 ? ( $objRow->overlayColorAlpha / 100 ) : '1' );

        $strOverlayRgbColor = 'rgba('. $rgb_r .', '. $rgb_g .', '. $rgb_b .', '. $overlayColorAlpha .')';

      }

      if ($objRow->addDivider) {
        if ($objRow->dividerTopShape) {
          $dividerTopHexColor = ($objRow->dividerTopHexColor ? $objRow->dividerTopHexColor : 'ffffff' ) ;
          $strDividerTopRgbColor = $this->hex2rgba($dividerTopHexColor, 100);

          $dividerShape = $this->getDividerShape($objRow->dividerTopShape, $strDividerTopRgbColor);

          if ( $objRow->dividerTopBgHexColor ) {
            $dividerTopBgHexColor = $objRow->dividerTopBgHexColor;
            $dividerTopBgAlpha = 100;
          } else {
            $dividerTopBgHexColor = 'ffffff';
            $dividerTopBgAlpha = 0;
          }
          $strDividerTopBgRgbColor = $this->hex2rgba($dividerTopBgHexColor, $dividerTopBgAlpha);

          $strAddCss .= '
          ' . $cssId . ' .divider:before {
          content: \'\';
          background-color: ' . $strDividerTopBgRgbColor . ';
          background-image: url(\'data:image/svg+xml;charset=UTF-8,' . $dividerShape . '\');
          background-repeat: no-repeat;
          background-size: 100%;
          width: 100%;
          height: '.$objRow->dividerTopHeight.'px;
          position: absolute;
          top: 0;
          left: 0;
          } ';

          if ($objRow->dividerTopSwitch == 'vertical') {
            $strAddCss .= '
            ' . $cssId . ' .divider:before {
                transform: rotateY(180deg);
            } '; 
          } elseif ($objRow->dividerTopSwitch == 'horizontal') {
            $strAddCss .= '
            ' . $cssId . ' .divider:before {
                transform: rotateX(180deg);
            } '; 
          } elseif ($objRow->dividerTopSwitch == 'both') {
            $strAddCss .= '
            ' . $cssId . ' .divider:before {
                transform: rotate(180deg);
            } '; 
          } else {
            // Keine Aktion
          }

        }
        if ($objRow->dividerBottomShape) {

          $dividerBottomHexColor = ($objRow->dividerBottomHexColor ? $objRow->dividerBottomHexColor : 'ffffff' ) ;
          $strDividerBottomRgbColor = $this->hex2rgba($dividerBottomHexColor, 100);

          $dividerShape = $this->getDividerShape($objRow->dividerBottomShape, $strDividerBottomRgbColor);

          $dividerBottomBgHexColor = ($objRow->dividerBottomBgHexColor ? $objRow->dividerBottomBgHexColor : 'ffffff' ) ;
          if ( $objRow->dividerBottomBgHexColor ) {
            $dividerBottomBgHexColor = $objRow->dividerBottomBgHexColor;
            $dividerBottomBgAlpha = 100;
          } else {
            $dividerBottomBgHexColor = 'ffffff';
            $dividerBottomBgAlpha = 0;
          }
          $strDividerBottomBgRgbColor = $this->hex2rgba($dividerBottomBgHexColor, $dividerBottomBgAlpha);

          $strAddCss .= '
          ' . $cssId . ' .divider:after {
          content: \'\';
          background-color: ' . $strDividerBottomBgRgbColor . ';
          background-image: url(\'data:image/svg+xml;charset=UTF-8,' . $dividerShape . '\');
          background-repeat: no-repeat;
          background-size: 100%;
          width: 100%;
          height: '.$objRow->dividerBottomHeight.'px;
          position: absolute;
          bottom: 0;
          left: 0;
          } '; 

          if ($objRow->dividerBottomSwitch == 'vertical') {
            $strAddCss .= '
            ' . $cssId . ' .divider:after {
                transform: rotateY(180deg);
            } '; 
          } elseif ($objRow->dividerBottomSwitch == 'horizontal') {
            $strAddCss .= '
            ' . $cssId . ' .divider:after {
                transform: rotateX(180deg);
            } '; 
          } elseif ($objRow->dividerBottomSwitch == 'both') {
            $strAddCss .= '
            ' . $cssId . ' .divider:after {
                transform: rotate(180deg);
            } '; 
          } else {
            // Keine Aktion
          }

        }
      }
      
      if ($objRow->addImage) {

        $strAddCss .= '
        ' . $cssId . ' {
        position: relative;
        background-color: ' . $backgroundColor . ';
        background-image: url(' . FilesModel::findById( $objRow->singleSRC )->path . ');
        background-attachment: ' . ($objRow->parallax == true ? 'fixed' : $objRow->backgroundAttachment) . ';
        background-position: ' . $objRow->backgroundPosition . ';
        background-size:' . $objRow->backgroundSize . ';
        background-repeat:' . $objRow->backgroundRepeat . '; } '; 

        if ($objRow->overlayColor) {
          
          $strAddCss .= '
            ' . $cssId . ':before {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              content: \'\';
              background-color: ' . $strOverlayRgbColor . ';
              z-index: -1;
            }';
        }
        
        if ($objRow->parallax) {
          $strAddJS .= '
            $(document).ready(function(){
              $(\'' . $cssId . '\').parallax({xpos:\'' . '50%' . '\', speedFactor:0.5, outerHeight:false});
            });
          '; 
        }
      } elseif ($objRow->backgroundColor) {
        $strAddCss .= $cssId . '{background-color: ' . $backgroundColor . ';}'; 
      }

      if ($objRow->fullsize) {
        $strAddJS .= '
          $(document).ready(function(){
            $(\'' . $cssId . '\').sizeContent(\'' . StringUtil::decodeEntities( $objRow->fullsizeOffsetElements ) . '\');
            $(window).resize( function () {
              $(\'' . $cssId . '\').sizeContent(\'' . StringUtil::decodeEntities( $objRow->fullsizeOffsetElements ) . '\');
            });
          });
        '; 

        if ($objRow->addFullsizeScroller) {
          $strAddJS .= '
            $(document).ready(function(){
              $(\'' . $cssId . '\').addFullsizeScroller(\'' . $objRow->fullsizeScrollerColor . '\');
              $(\'' . $cssId . ' .fullsizeScroller\').click(function(){
                $(\'' . $cssId . ' .fullsizeScroller\').scrollBeyondFullsize(\'' . $cssId . '\', \'' . StringUtil::decodeEntities( $objRow->scrollOffsetElements ) . '\');
              });
            });
          '; 
        }

				if ($objRow->verticalAlignment) {

					if ($objRow->verticalAlignment == 'flex-start') {
						$verticalAlignment = 'flex-start';
					} elseif ($objRow->verticalAlignment == 'center') {
						$verticalAlignment = 'center';
					} elseif ($objRow->verticalAlignment == 'flex-end') {
						$verticalAlignment = 'flex-end';
					} else {
						$verticalAlignment = 'center';
					}

					$strAddCss .= '
						' . $cssId . ' {
							display: flex;
							align-items: ' . $verticalAlignment . '; 
							justify-content: center; 
							z-index: 0;
						}'; 
				}
			}
			
      if ($objRow->articleHeightMobile && !$objRow->fullsize) {
        $strAddCss .= '
          ' . $cssId . ' {
            min-height: ' . ($objRow->articleHeightMobile ? $objRow->articleHeightMobile . 'px' : 'auto') . '; 
          }';           
      }
      
      if ($objRow->articleHeightDesktop && !$objRow->fullsize) {
        $strAddCss .= '
          @media (min-width: ' . ($objRow->articleHeightBreakpoint ? $objRow->articleHeightBreakpoint : '0')  . 'px) {
            ' . $cssId . ' {
              min-height: ' . ($objRow->articleHeightDesktop ? $objRow->articleHeightDesktop . 'px' : 'auto') . '; 
            }
          }';           
      }
      
      // Add JS to the header
      if ($strAddJS) {
        $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaoextendedarticle/js/tsd_extended_article.js';
        $GLOBALS['TL_HEAD'][] = '<script> ' . $strAddJS . ' </script>'; 
      }
      
      // Add CSS to the header
      if ($strAddCss) {
        $GLOBALS['TL_HEAD'][] = '<style> ' . $strAddCss . ' </style>'; 
      }
    }
  
  
  public function hex2rgba($hexColor, $alpha = 100): string
  {
    if ( strlen($hexColor) == 3 ) {
      $rgb_r = hexdec(substr($hexColor,0,1) . substr($hexColor,0,1));
      $rgb_g = hexdec(substr($hexColor,1,1) . substr($hexColor,1,1));
      $rgb_b = hexdec(substr($hexColor,2,1) . substr($hexColor,2,1));
    } elseif ( strlen($hexColor) == 6 ) {
      $rgb_r = hexdec(substr($hexColor,0,2));
      $rgb_g = hexdec(substr($hexColor,2,2));
      $rgb_b = hexdec(substr($hexColor,4,2));
    } else {
      $rgb_r = 255;
      $rgb_g = 255;
      $rgb_b = 255;
    }
    $alpha = ( $alpha && $alpha > 0.9 ? ( $alpha / 100 ) : $alpha );

    $rgbColor = 'rgba('. $rgb_r .', '. $rgb_g .', '. $rgb_b .', '.$alpha.')';
    
    return $rgbColor;
    
  }
  
  public function getDividerShape($shape, $fillColor): string
  {
    $dividerShapes = array (
      'schraegeAlpha' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 595.28 22.91"><polygon points="595.28 0 0 0 595.28 22.91 595.28 0"  fill="' . $fillColor . '" opacity="0.6"/><polygon points="595.28 0 0 0 595.28 15.91 595.28 0"  fill="' . $fillColor . '" opacity="0.3"/></svg>',
      
      'wellenAlpha' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1200 120"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"  fill="' . $fillColor . '" opacity=".25"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"  fill="' . $fillColor . '" opacity=".5"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"  fill="' . $fillColor . '"></path></svg>',
      
      'dreieck' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1200 120"><path d="M649.97 0L550.03 0 599.91 54.12 649.97 0z" fill="' . $fillColor . '"></path></svg>',
      
      'spitze' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M1200 0L0 0 598.97 114.72 1200 0z" fill="' . $fillColor . '"></path></svg>',

      'spitzeInvers' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 542.96 117.04"><polygon points="542.96 117.04 0 117.04 0 0 270.37 117.04 542.96 0 542.96 117.04" fill="' . $fillColor . '"/></svg>',
      
      'schindeln' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 293.98 5.57"><path d="M205.05,394.47a22.07,22.07,0,0,0,14.7-5.57h-29.4A22.11,22.11,0,0,0,205.05,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M234.45,394.47a22.07,22.07,0,0,0,14.7-5.57h-29.4A22.09,22.09,0,0,0,234.45,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M263.85,394.47a22.09,22.09,0,0,0,14.7-5.57h-29.4A22.09,22.09,0,0,0,263.85,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M293.25,394.47A22.09,22.09,0,0,0,308,388.9h-29.4A22.07,22.07,0,0,0,293.25,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M322.65,394.47a22.06,22.06,0,0,0,14.69-5.57H308A22.07,22.07,0,0,0,322.65,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M352,394.47a22.07,22.07,0,0,0,14.7-5.57h-29.4A22.09,22.09,0,0,0,352,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M381.44,394.47a22.07,22.07,0,0,0,14.7-5.57h-29.4A22.09,22.09,0,0,0,381.44,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M410.84,394.47a22.09,22.09,0,0,0,14.7-5.57h-29.4A22.09,22.09,0,0,0,410.84,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M146.26,394.47A22.09,22.09,0,0,0,161,388.9h-29.4A22.07,22.07,0,0,0,146.26,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/><path d="M175.66,394.47a22.06,22.06,0,0,0,14.69-5.57H161A22.07,22.07,0,0,0,175.66,394.47Z" transform="translate(-131.56 -388.9)" fill="' . $fillColor . '"/></svg>',
      
      'bogen' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 295.39 8.67"><path d="M279.25,394.47c56.66,0,108.35-3.28,147.7-8.67H131.56C170.9,391.19,222.59,394.47,279.25,394.47Z" transform="translate(-131.56 -385.8)" fill="' . $fillColor . '"/></svg>',

      'bogenAsymetrisch' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 285.69 13.5"><path d="M113.19,327.67H398.87S164.38,358.06,113.19,327.67Z" transform="translate(-113.19 -327.67)" fill="' . $fillColor . '"/></svg>',
      
      'schraege' => '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 303.64 15.52"><polygon points="303.64 0 0 0 303.64 15.52 303.64 0" fill="' . $fillColor . '"/></svg>',

      'wellen' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="' . $fillColor . '"/></svg>',
  );

    return $dividerShapes[$shape];
  }
}
