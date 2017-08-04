<?php

namespace Drupal\simple_gse_search\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides an 'Google CSE Search' block.
 *
 * @Block(
 *   id = "simple_gse_search_block",
 *   admin_label = @Translation("Simple GSE Search Block"),
 *   category = @Translation("Search"),
 * )
 */
class GSESearchFormBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\simple_gse_search\Form\SearchForm');
    return $form;
  }

}