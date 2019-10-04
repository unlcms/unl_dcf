<?php

namespace Drupal\dcf_lazyload\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form to configure DCF Lazy Loading.
 */
class Settings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dcf_lazyload_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'dcf_lazyload.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dcf_lazyload.settings');

    $form['assets_source'] = [
      '#type' => 'select',
      '#title' => $this->t('Assets Source'),
      '#options' => [
        'module' => 'DCF Lazy Loading module',
        'external' => 'Externally loaded',
      ],
      '#default_value' => $config->get('assets_source'),
      '#description' => $this->t('The CSS and Javascript needed for DCF Lazy Loading can be loaded externally (e.g. as part of a DCF-based theme) or they can be loaded from files that ship with the DCF Lazy Loading module.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $settings = $this->config('dcf_lazyload.settings');
    $settings->set('assets_source', $values['assets_source']);
    $settings->save();

    parent::submitForm($form, $form_state);
  }

}
