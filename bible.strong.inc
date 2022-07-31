<?php
/**
 * @file
 * Strong's number related functions for Bible module.
 */

function bible_sn($snid, $sn) {
  if (!empty($sn)) {
    $sn_object = \Drupal::database()->select('bible_strongnumber', 'bsn')
      ->fields('bsn')
      ->condition('snid', $snid)
      ->condition('sn', $sn)
      ->execute()
      ->fetch();
    if ($sn_object === NULL) {
      $top_snid = \Drupal::database()->select('bible_sn_list', 'bsnl')
        ->fields('bsnl', array('snid'))
        ->range(0, 1)
        ->execute()
        ->fetchField();
      if (!empty($top_snid) && ($top_snid != $snid)) {
        drupal_goto('bible/sn/' . $snid . '/' . $snid);
      }
      else {
        return t('Strong\'s Number File not imported; Or Strong\'s Number is mistype.');
      }
    }
    if (\Drupal::config('bible.settings')->get('bible_sn_select') === 0) {
      \Drupal::configFactory()->getEditable('bible.settings')->set('bible_sn_select', $snid)->save();
    }
    $sn_content = _bible_sn_replace(\Drupal\Component\Utility\Html::escape($sn_object->content));
    $output = str_replace(
      "\n",
      '<br />',
      t('Strong\'s Number') . '[<b>' . $sn . '</b>]<br />' . $sn_content
    );
    $snselect = \Drupal::config('bible.settings')->get('bible_snsearch_select');
    if ($snselect <> 0) {
      // @FIXME
// l() expects a Url object, created from a route name or external URI.
// $output .= '<hr />[' .
//         l(
//           'Search for all appearance',
//           'bible/snsearch/' . $snselect . '/' . $sn
//         ) .
//         ']';

    }
    return $output;
  }
  elseif (!empty($snid)) {
    drupal_goto('bible/sn/' . \Drupal::config('bible.settings')->get('bible_sn_select') . '/' . $snid);
  }
}

function bible_snajax($sn) {
  $snid = \Drupal::config('bible.settings')->get('bible_sn_select');
  $snlist = \Drupal::database()->select('bible_strongnumber', 'bsn')
    ->fields('bsn')
    ->condition('snid', $snid)
    ->condition('sn', $sn)
    ->execute();
  if ($snobj = $snlist->fetch()) {
    $sndata = $snobj->sn . "\r" . str_replace("\n", '', \Drupal\Component\Utility\Html::escape($snobj->content));
    $sndata = str_replace("\r", '|', $sndata);
    if (strlen($sndata) > 300) {
      $sndata = substr($sndata, 0, 300) . '...';
    }
    print $sndata;
  }
  else {
    print '';
  }
  drupal_exit();
}

function bible_ajax_vcontent($bls) {
  $bid = _bible_get_select_bid();
  print _bible_get_verse_content2($bls, $bid, '@c', '[@v]@c');
  drupal_exit();
}

/**
 * Search Bible for Strong note.
 * BdB: URL is something like: bible/snsearch/20/H1000
 */
function bible_sn_search($bid, $strong_number) {
  $arg3 = \Drupal\Component\Utility\Html::escape(arg(3));
  if (!empty($arg3)) {
    $query = \Drupal::database()->select('bible_context')
      ->fields('bible_context')
      ->condition('bid', $bid)
      ->condition('context', '%<' . strtoupper(arg(3)) . '>%', 'LIKE')
      ->condition('linemark', '*', '<>')
      ->orderBy('vsid');
    $count_query = clone ($query);
    $result_set = $query
      ->extend('PagerDefault')
      ->limit(10)
      ->execute();
    $rows = array();
    foreach ($result_set as $verse){
      $bls = _bible_get_chapter_sname($bid, $verse->book) . ':' . $verse->chapter;
      $context = str_replace('<', '&lt;', $verse->context);
      $context = str_replace(
        '&lt;' . arg(3) . '>',
        '<span class="bible-strong">&lt;' . $arg3 . '></span>',
        $context
      );
      // @FIXME
// l() expects a Url object, created from a route name or external URI.
// $rows[] = array(
//         l(
//           $bls . ':' . $verse->verse,
//           'bible/' . $bid . '/' . $verse->book . '/' . $verse->chapter
//         ),
//         $context,
//       );

    }
    // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_css(drupal_get_path('module', 'bible') . '/bible.css');

    $count = $count_query->execute()
      ->rowCount();
    $output = t('Search in Bible [@bible] for Strong\'s Number [@kw], total found [@count] time(s).', array(
      '@bible' => _bible_get_bible_name($bid),
      '@kw' => $arg3,
      '@count' => $count,
    ));
    $header = array();
    // @FIXME
// theme() has been renamed to _theme() and should NEVER be called directly.
// Calling _theme() directly can alter the expected output and potentially
// introduce security issues (see https://www.drupal.org/node/2195739). You
// should use renderable arrays instead.
// 
// 
// @see https://www.drupal.org/node/2195739
// $output .= theme('table', array('header' => $header, 'rows' => $rows));

    // @FIXME
// theme() has been renamed to _theme() and should NEVER be called directly.
// Calling _theme() directly can alter the expected output and potentially
// introduce security issues (see https://www.drupal.org/node/2195739). You
// should use renderable arrays instead.
// 
// 
// @see https://www.drupal.org/node/2195739
// $output .= theme('pager');

    return $output;
  }
  elseif (!empty($bid)) {
    drupal_goto('bible/sn/' . \Drupal::config('bible.settings')->get('bible_sn_select') . '/' . $bid);
  }
}
