<?php

/**
 * @file
 * Contains \Drupal\mc\CreatePressReleaseService.
 */

namespace Drupal\mc;


/**
 * Class CreatePressReleaseService.
 *
 * @package Drupal\mc
 */
class CreatePressReleaseService implements CreatePressReleaseServiceInterface {
  /**
   * Constructor.
   */
  public function __construct() {
    // Hey Drupal, I want to play with nodes!
    $this->NodeStorage = \Drupal::entityTypeManager()->getStorage('node');
  }

  public function generate($nodeCount = 1) {
    // Iterate the count of the {count} parameter from the route.
    for ($i = 1; $i <= $nodeCount; $i++) {
      // Create an array for the node
      $node_fields = [
        'title' => t('Press Release :i of :nodeCount', [
          ':i' => $i,
          ':nodeCount' => $nodeCount
        ]),
        'body' => 'This is some body text.',
        'status' => 1,
        'type' => 'press_release',
        'promote' => 1,
        'langcode' => 'en',
      ];
      // Create a node object from the array.
      $node = $this->NodeStorage->create($node_fields);
      // Save the node.
      $this->NodeStorage->save($node);

    }
  }
}
