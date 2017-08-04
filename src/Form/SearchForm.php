<?php

namespace Drupal\simple_gse_search\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SearchForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'simple_gse_search_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['s'] = [
      '#type' => 'textfield',
      '#title' => t('Search'),
      '#default_value' => isset($_GET['s']) ? $_GET['s'] : '',
      '#attributes' => ['placeholder' => 'Search site...', 'class' => ['SearchForm-input']],
      '#theme_wrappers' => [],
      '#size' => NULL,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'go',
      '#name' => '',
      '#attributes' => ['class' => ['SearchForm-submit']],
    ];

    $form['#attributes'] = ['class' => ['SearchForm']];
    $form['#action'] = 'search';
    $form['#method'] = 'get';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Intentionally leave this empty.
  }

}
