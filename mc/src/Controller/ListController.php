<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\ListController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ListController.
 *
 * @package Drupal\mc\Controller
 */
class ListController extends ControllerBase {
  /**
   * Generatelists.
   *
   * @return string
   *   Return Hello string.
   */
  public function generateLists() {
    // List one - simple flat list.
    $fruits = [
      'Apple',
      'Banana',
      'Fig',
      'Mango',
      'Orange'
    ];
    // Create the item list as a render array.
    $content[] = [
      '#theme' => 'item_list',
      '#items' => $fruits,
      '#title' => t('Some Fruits'),
      '#list_type' => 'ol',
      '#attributes' => [
        'class' => ['class-1', 'class-2']
      ]
    ];

    // Create a nested item list
    $apples = [
      'Gala',
      'Fuji',
      'Golden Delicious',
    ];

    $fruits = [
      [
        '#markup' => 'Apple',
        'children' => $apples,
      ],

      'Banana',
      'Fig',
      'Mango',
      'Orange',
    ];

    // Create the item list as a render array.
    $content[] = [
      '#theme' => 'item_list',
      '#items' => $fruits,
      '#title' => t('Some Fruits - Apples are nested items'),
      '#list_type' => 'ol',
      '#attributes' => [
        'class' => ['class-1', 'class-2']
      ]
    ];


    return $content;
  }

}
