<?php

namespace Drupal\simple_gse_search\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'simple_gse_search_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return ['simple_gse_search.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('simple_gse_search.settings');
    $url = \Drupal\Core\Url::fromUri('https://www.google.com/cse');
    $cse_link = \Drupal::l(t('https://www.google.com/cse'), $url);
    $form['cx'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Google Custom Search Engine ID'),
      '#description' => $this->t('Get your custom search engine ID from %search_engine', ['%search_engine' => $cse_link]),
      '#default_value' => $config->get('cx'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $gse_settings = $this->config('simple_gse_search.settings');

    $gse_settings->set('cx', $values['cx'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
