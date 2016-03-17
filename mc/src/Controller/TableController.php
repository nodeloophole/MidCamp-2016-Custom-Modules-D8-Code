<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\TableController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class TableController.
 *
 * @package Drupal\mc\Controller
 */
class TableController extends ControllerBase {
  /**
   * Generatetable.
   *
   * @return string
   *   Return Hello string.
   */
  public function generateTable() {
    // Header
    $header = [
     ['data' => t('Item')],
     ['data' => t('Classification')],
    ];

    // Rows
    $rows = [];

    $rows[] = [
      t('Apple'),
      t('Fruit'),
    ];

    $rows[] = [
      t('Eggplant'),
      t('Vegetable'),
    ];

    $rows[] = [
      t('Pear'),
      t('Fruit'),
    ];

    $rows[] = [
      t('Mushroom'),
      t('Fungus'),
    ];

    // Create the table as a render array.
    $content[] = [
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    ];

    return $content;
  }

}
