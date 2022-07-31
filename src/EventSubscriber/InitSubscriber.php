<?php /**
 * @file
 * Contains \Drupal\bible\EventSubscriber\InitSubscriber.
 */

namespace Drupal\bible\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\EventDispatcher\EventSubscriberInterface;

class InitSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [KernelEvents::REQUEST => ['onEvent', 0]];
  }

  public function onEvent() {
    $path = drupal_get_path('module', 'bible');
    global $base_path, $imagedir, $base_url;
    $imagedir = $base_path . $path . '/images/';
    drupal_add_js(['baseurl' => $base_url . '/'], [
      'type' => 'setting',
      'scope' => JS_DEFAULT,
    ]);
    drupal_add_js(['bibleimgurl' => $imagedir], [
      'type' => 'setting',
      'scope' => JS_DEFAULT,
    ]);
  }

}
