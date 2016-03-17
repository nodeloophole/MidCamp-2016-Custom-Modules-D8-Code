<?php

/**
 * @file
 * Contains \Drupal\mc\Controller\QueryNodesController.
 */

namespace Drupal\mc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Class QueryNodesController.
 *
 * @package Drupal\mc\Controller
 */
class QueryNodesController extends ControllerBase {
  /**
   * Count3.
   *
   * @return string
   *   Return Hello string.
   */
  public function count3() {
    // Start the entity query. Look for press release nodes that have
    // more than 3 in the 'field_counter' field.
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'press_release')
      ->condition('field_counter', 3, '>')
      ->condition('status', 1);
    // Execute the query
    $result = $query->execute();

    // Load the node(s)
    $nodes = \Drupal\node\Entity\Node::loadMultiple(array_keys($result));

    // Create an item list with the node(s) from the query result
    $items = [];
    foreach ($nodes as $node) {
      // Get the $nid
      $nidData = $node->get('nid')->getValue();
      $nid = $nidData[0]['value'];

      // Get the title
      $titleData = $node->get('title')->getValue();
      $title = $titleData[0]['value'];

      // Get the URL for this node from its route.
      $url = Url::fromRoute('entity.node.canonical', ['node' => $nid]);

      // Create a link to the node.
      $link = Link::fromTextAndUrl($title, $url)->toString();
      $items[] = $link;
    }

    // Create an item list as a render array
    $content[] = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => t("Press Releases with Counter > 3")
    ];

    return $content;
  }

}
