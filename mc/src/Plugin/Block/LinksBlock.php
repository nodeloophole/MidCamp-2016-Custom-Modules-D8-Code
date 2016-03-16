<?php

/**
 * @file
 * Contains \Drupal\mc\Plugin\Block\LinksBlock.
 */

namespace Drupal\mc\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a 'LinksBlock' block.
 *
 * @Block(
 *  id = "links_block",
 *  admin_label = @Translation("MidCamp Links"),
 * )
 */
class LinksBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    // Creating a simple block to hold links used during the session demo.
    $build = [];

    $items = [];
    $items[] = Link::fromTextAndUrl('HTML Table', Url::fromRoute('mc.table_controller_generateTable'))->toString();
    $items[] = Link::fromTextAndUrl('Lists', Url::fromRoute('mc.list_controller_generateLists'))->toString();
    $items[] = Link::fromTextAndUrl('Links', Url::fromRoute('mc.link_controller_generateLinks'))->toString();
    $items[] = Link::fromTextAndUrl('Create Nodes', Url::fromUri('base:mc/create-press/10'))->toString();
    $items[] = Link::fromTextAndUrl('Edit Node nid:1', Url::fromUri('base:mc/counter/1'))->toString();
    $items[] = Link::fromTextAndUrl('Edit Node nid:2', Url::fromUri('base:mc/counter/2'))->toString();
    $items[] = Link::fromTextAndUrl('Edit Node nid:10', Url::fromUri('base:mc/counter/10'))->toString();
    $items[] = Link::fromTextAndUrl('Query for Nodes', Url::fromRoute('mc.query_nodes_controller_count3'))->toString();
    $items[] = Link::fromTextAndUrl('View Results', Url::fromRoute('mc.get_node_ids_of_view_result'))->toString();

    $build[] =  [
      '#theme' => 'item_list',
      '#items' => $items,
      '#list_type' => 'ul',
    ];


    return $build;
  }

}
