<?php /**
 * @file
 * Contains \Drupal\bible\EventSubscriber\BootSubscriber.
 */

namespace Drupal\bible\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BootSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [KernelEvents::REQUEST => ['onEvent', 0]];
  }

  public function onEvent(\Symfony\Component\HttpKernel\Event\GetResponseEvent $event) {
    global $book_list;
    $book_list = 'GEN|EXO|LEV|NUM|DEU|';
    $book_list .= 'JOS|JUG|RUT|1SM|2SM|1KG|2KG|1CH|2CH|EZR|NEH|TOB|JDT|EST|1MC|2MC|3MC|4MC|';
    $book_list .= 'JOB|PS|PSA|PRO|ECC|SON|WIS|SIR|';
    $book_list .= 'ISA|JER|LAM|BAR|EZE|DAN|';
    $book_list .= 'HOS|JOE|AMO|OBA|JON|MIC|NAH|HAB|ZEP|HAG|ZEC|MAL|';
    $book_list .= 'MAT|MAK|LUK|JHN|';
    $book_list .= 'ACT|';
    $book_list .= 'ROM|1CO|2CO|GAL|EPH|PHL|COL|1TS|2TS|1TM|2TM|TIT|PHM|HEB|';
    $book_list .= 'JAM|';
    $book_list .= '1PE|2PE|';
    $book_list .= '1JN|2JN|3JN|';
    $book_list .= 'JUD|';
    $book_list .= 'REV|';
    $book_list .= '1ES|2ES|EJR|AZA|SUS|BEL|MAN|PSS|ODE';
    global $book_namelist;
    $book_namelist = 'Gen|Genesis;';
    $book_namelist .= 'Exo|Exodus|Exode;';
    $book_namelist .= 'Lev|Leviticus;';
    $book_namelist .= 'Num|Numbers|Nom|Nombres;';
    $book_namelist .= 'Deu|Deuteronomy;';
    $book_namelist .= 'Jos|Josh|Joshua;';
    $book_namelist .= 'Jug|Judges|Jug|Juges;';
    $book_namelist .= 'Rut|Ruth;';
    $book_namelist .= '1 Sam|1 Samuel;';
    $book_namelist .= '2 Sam|2 Samuel;';
    $book_namelist .= '1 Ki|1 Kings|1 Ro|1 Roi|1 Rois;';
    $book_namelist .= '2 Ki|2 Kings|2 Ro|2 Roi|2 Rois;';
    $book_namelist .= '1 Chr|1 Chro|1 Chron|1 Chronicles|1 Chroniques;';
    $book_namelist .= '2 Chr|2 Chro|2 Chron|2 Chronicles|2 Chroniques;';
    $book_namelist .= 'Ezra|Esd|Esdras;';
    $book_namelist .= 'Neh|Nehemiah;';
    $book_namelist .= 'Tob|Tobit|Tobie;';
    $book_namelist .= 'Jdt|Judith;';
    $book_namelist .= 'Est|Esther;';
    $book_namelist .= '1 Mc|1 Maccabees|1 Mac;';
    $book_namelist .= '2 Mc|2 Maccabees|2 Mac;';
    $book_namelist .= '3 Mc|3 Maccabees|3 Mac;';
    $book_namelist .= '4 Mc|4 Maccabees|4 Mac;';
    $book_namelist .= 'Job;';
    $book_namelist .= 'Ps|Psa|Psm|Psalm|Psalms|Psaume|Psaumes;';
    $book_namelist .= 'Psalm 151;';
    $book_namelist .= 'Pro|Prov|Proverbs|Proverbes;';
    $book_namelist .= 'Ecc|Ecclesiastes;';
    $book_namelist .= 'Song|Song of Solomon|Can|Cantique|Cantique des cantiques|Cantique de Salomon;';
    $book_namelist .= 'Wis|Wisdom|Sagesse;';
    $book_namelist .= 'Sir|Sirach|Ecq|Siracide;';
    $book_namelist .= 'Isa|Isaiah|Isaie;';
    $book_namelist .= 'Jer|Jeremiah;';
    $book_namelist .= 'Lam|Lamentations;';
    $book_namelist .= 'Bar|Baruch;';
    $book_namelist .= 'Eze|Ezek|Ezekiel;';
    $book_namelist .= 'Dan|Daniel;';
    $book_namelist .= 'Hos|Hosea;';
    $book_namelist .= 'Joel;';
    $book_namelist .= 'Amo|Amos;';
    $book_namelist .= 'Obad|Obadiah|Abd|Abdi|Abdias;';
    $book_namelist .= 'Jona|Jonah|Jonas;';
    $book_namelist .= 'Mic|Micah;';
    $book_namelist .= 'Nah|Nahum;';
    $book_namelist .= 'Hab|Habakkuk|Habaccuc;';
    $book_namelist .= 'Zep|Zephaniah|Sop|Sophonie;';
    $book_namelist .= 'Hag|Haggai|Agg;';
    $book_namelist .= 'Zec|Zech|Zechariah|Zac|Zacharie;';
    $book_namelist .= 'Mal|Malachi|Malachie;';
    $book_namelist .= 'Mat|Matt|Matthew|Matthieu;';
    $book_namelist .= 'Mar|Mark|Marc;';
    $book_namelist .= 'Luke|Luc;';
    $book_namelist .= 'John|Jn|Jean;';
    $book_namelist .= 'Act|Acts|Actes;';
    $book_namelist .= 'Rom|Romans|Romains;';
    $book_namelist .= '1 Cor|1 Corinthians|1 Corinthiens;';
    $book_namelist .= '2 Cor|2 Corinthians|2 Corinthiens;';
    $book_namelist .= 'Gal|Galatians|Galates;';
    $book_namelist .= 'Eph|Ephesians;';
    $book_namelist .= 'Phi|Phil|Phili|Philippians|Philippiens;';
    $book_namelist .= 'Col|Colossians;';
    $book_namelist .= '1 Thes|1 Thessalonians|1 Thessaloniciens;';
    $book_namelist .= '2 Thes|2 Thessalonians|2 Thessaloniciens;';
    $book_namelist .= '1 Tim|1 Timothy;';
    $book_namelist .= '2 Tim|2 Timothy;';
    $book_namelist .= 'Tit|Titus|Tite;';
    $book_namelist .= 'Phm|Philemon;';
    $book_namelist .= 'Heb|Hebrews;';
    $book_namelist .= 'Jam|James|Jac|Jacques;';
    $book_namelist .= '1 Pet|1 Peter|1 Pi|1 Pie|1 Pierre;';
    $book_namelist .= '2 Pet|2 Peter|2 Pi|2 Pie|2 Pierre;';
    $book_namelist .= '1 John|1 Jn|1 Jean;';
    $book_namelist .= '2 John|2 Jn|2 Jean;';
    $book_namelist .= '3 John|3 Jn|3 Jean;';
    $book_namelist .= 'Jud|Jude;';
    $book_namelist .= 'Rev|Revelation|Apo|Apocalypse;';
    $book_namelist .= '1 Esdras;';
    $book_namelist .= '2 Esdras;';
    $book_namelist .= 'Epistle of Jeremiah;';
    $book_namelist .= 'Prayer of Azariah;';
    $book_namelist .= 'Susanna;';
    $book_namelist .= 'Bel and the Dragon;';
    $book_namelist .= 'Prayer of Manasseh;';
    $book_namelist .= 'Psalm of Solomon;';
    $book_namelist .= 'Odes';
    global $bdtypelist;
    $bdtypelist = [
      'commentary' => t('Commentary'),
      'music' => t('Music'),
      'gallery' => t('Gallery'),
      'refverse' => t('Reference Verse'),
      'dailyread' => t('Daily Reading'),
      'sermon' => t('Sermon'),
      'misc' => t('Other Data'),
    ];
    global $bibledataxml;
    $bibledataxml = isset($_SESSION['bibledataxml']) ? $_SESSION['bibledataxml'] : '';
  }

}
