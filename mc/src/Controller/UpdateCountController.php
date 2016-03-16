<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\UpdateCountController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class UpdateCountController.
 *
 * @package Drupal\mc\Controller
 */
class UpdateCountController extends ControllerBase {
  /**
   * Updatecounter.
   *
   * @return string
   *   Return Hello string.
   */
  public function updateCounter($nid) {

    // Load the node
    $node = \Drupal\node\Entity\Node::load($nid);

    // Get the field "Counter" from the node.
    $counterField = $node->get('field_counter')->getValue();
    // Get the value of the field.
    $count = $counterField[0]['value'];

    // Get the node title for display
    $titleData = $node->get('title')->getValue();
    $title = $titleData[0]['value'];


    // Output info about the node being updated.
    $content[] = [
      '#type' => 'markup',
      '#markup' => $this->t("Updating node with title: :title", array(':title' => $title)),
      '#prefix' => '<div><h2>',
      '#suffix' => '</h2></div>',
    ];

    $content[] = [
      '#type' => 'markup',
      '#markup' => $this->t("The old value of the Counter field is $count"),
      '#prefix' => '<div><h2>',
      '#suffix' => '</h2></div>',
    ];

    // Increment the value.
    if ($count) {
      $count++;
    } else {
      $count = 1;
    }

    $content[] = [
      '#type' => 'markup',
      '#markup' => $this->t("The new value of the Counter field is $count"),
      '#prefix' => '<div><h2>',
      '#suffix' => '</h2></div>',
    ];
    // Save the new value to the field.
    $node->set('field_counter', $count);

    $node->save();

    return $content;
  }

}
