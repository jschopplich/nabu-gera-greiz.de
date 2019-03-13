<?php

// image (box) tag
kirbytext::$tags['image-box-old'] = array(
  'attr' => array(
    'width',
    'height',
    'alt',
    'text',
    'title',
    'class',
      'position',
      'layout',
    'imgclass',
    'linkclass',
    'caption',
    'link',
    'target',
    'popup',
    'rel'
  ),
  'html' => function($tag) {

    $url     = (strpos($tag->attr('image-box-old'), '/') === false) ? $tag->attr('image-box-old') : 'images/' . $tag->attr('image-box-old');
    $alt     = $tag->attr('alt');
    $title   = $tag->attr('title');
    $link    = $tag->attr('link');
    $caption = $tag->attr('caption');
    $target  = $tag->attr('target');
    $file    = $tag->file($url);

    // use the file url if available and otherwise the given url
    $url = $file ? $file->url() : url($url);

    // alt is just an alternative for text
    //if($text = $tag->attr('text')) $alt = $text;

    // try to get the title from the image object and use it as alt text
    if($file) {

      if(empty($alt) and $file->alt() != '') {
        $alt = $file->alt();
      }

      if(empty($title) and $file->title() != '') {
        $title = $file->title();
      }

    }

    // at least some accessibility for the image
    if(empty($alt)) $alt = ' ';

    // link builder
    $_link = function($image) use($tag, $url, $link, $file) {

      //if(empty($link)) return $image;

      // build the href for the link
      /*
      if($link == 'self') {
        $href = $url;
      } else if($file and $link == $file->filename()) {
        $href = $file->url();
      } else if($tag->file($link)) {
        $href = $tag->file($link)->url();
      } else {
        $href = $link;
      }
      */

      $href = $url;

      return html::a(url($href), $image, array(
        'rel'    => $tag->attr('rel'),
        'class'  => $tag->attr('linkclass'),
        'title'  => $tag->attr('title'),
        'target' => $tag->target()
      ));

    };

    // image+thumb builder
    $_image = function($class) use($tag, $url, $alt, $title, $file) {

      $width = $tag->attr('width') ?: c::get('kirbytext.image-box.width');

      if(pathinfo($url, PATHINFO_EXTENSION) === 'jpg' and $file->exists()) {
        if($file->width() <= c::get('kirbytext.image.max-width')) $width = null;
      }

      if($tag->attr('layout') == 'vertical') $width = '220';
      if($tag->attr('layout') == 'custom') $width = null;

      if(!empty($width)) {

        $_thumb = thumb($file, array(
          'driver' => c::get('thumbs.driver', 'gd'),
          'root'   => kirby()->roots()->thumbs(),
          'width'  => $width
        ));

        return html::img($_thumb->url(), array(
          'class'       => $class,
          'title'       => $title,
          'alt'         => $alt
        ));
 
      } else {
        return html::img($url, array(
          'class'       => $class,
          'title'       => $title,
          'alt'         => $alt
        ));
      }

    };

    $classes_fig = $tag->attr('class') . ' magnific-popup';
    $classes_img = $tag->attr('imgclass') . ' lazyload';

    if($tag->attr('position') == 'centered') {
      $classes_fig .= ' box has-text-centered';
    } elseif($tag->attr('position') == 'left') {
      $classes_fig .= ' box is-pulled-left';
    } else {
      $classes_fig .= ' box is-pulled-right';
    }

    if($tag->attr('layout') == 'vertical') $classes_fig .= ' vertical';
    if($tag->attr('layout') == 'custom') $classes_fig .= ' custom';

    $image  = $_link($_image($classes_img));
    $figure = new Brick('figure');
    $figure->addClass($classes_fig);
    $figure->append($image);

    $caption = $tag->attr('text');
    if(!empty($caption)) {
      $figure->append('<figcaption><p>' . html($caption) . '</p></figcaption>');
    }

    return $figure;

  }
);
