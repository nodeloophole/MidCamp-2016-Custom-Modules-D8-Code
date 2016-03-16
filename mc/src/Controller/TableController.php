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
    $header = array(
      array('data' => t('Item')),
      array('data' => t('Classification')),
    );

    // Rows
    $rows = array();

    $rows[] = array(
      t('Apple'),
      t('Fruit'),
    );

    $rows[] = array(
      t('Eggplant'),
      t('Vegetable'),
    );

    $rows[] = array(
      t('Pear'),
      t('Fruit'),
    );

    $rows[] = array(
      t('Mushroom'),
      t('Fungus'),
    );

    // Create the table as a render array.
    $content[] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    );

    return $content;
  }

}
