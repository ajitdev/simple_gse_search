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
    $form['simple_gse_search_cx'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('GSE Search ID'),
      '#default_value' => $config->get('simple_gse_search_cx'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $gse_settings = $this->config('simple_gse_search.settings');

    $gse_settings->set('simple_gse_search_cx', $values['simple_gse_search_cx'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
