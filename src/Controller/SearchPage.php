<?php

namespace Drupal\simple_gse_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SearchPage extends ControllerBase {
  protected $searchConfig;

  public function __construct($config) {
    $this->searchConfig = $config->get('simple_gse_search.settings');
  }

  public static function create(ContainerInterface $containerInterface) {
    $config = $containerInterface->get('config.factory');
    return new static($config);
  }

  /**
   * Function responsible for returning the search results page.
   */
  function displaySearchResults() {
    // Display the results returned by Google.
    return [
      '#type' => 'html_tag',
      '#tag' => 'gcse:searchresults-only',
      '#attributes' => [
        'queryParameterName' => "s",
        'linktarget' => '_parent'
      ],
      '#value' => 'Please make sure javascript is enabled to see the search results.',
      '#attached' => [
        'library' => ['simple_gse_search/search'],
        'drupalSettings' => [
          'simple_gse_search' => [
            'cx' => $this->searchConfig->get('cx'),
          ]
        ]
      ],
    ];
  }
}
