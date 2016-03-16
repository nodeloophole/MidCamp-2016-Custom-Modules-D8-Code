<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\ViewResultController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\views\Views;

/**
 * Class ViewResultController.
 *
 * @package Drupal\mc\Controller
 */
class ViewResultController extends ControllerBase {
  /**
   * Latestpressreleases.
   *
   * @return string
   *   Return Hello string.
   */
  public function latestPressReleases() {
    // Load the view
    $view = Views::getView('latest_press_releases');
    // Execute the view
    $view->execute('page_1');

    // Make an item list of out the nids of the results
    $items = [];
    foreach ($view->result as $result) {
      $items[] = $result->nid;
    }

    // Build a render array for an item list.
    $content[] = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => t('Nodes in this Views result'),
    ];

    return $content;
  }

}
