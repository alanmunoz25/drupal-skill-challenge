<?php

namespace Drupal\event_config\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['event_config.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'event_config_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('event_config.settings');

    $form['background_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Background color'),
      '#description' => $this->t('Enter a valid CSS color.'),
      '#default_value' => $config->get('background_color'),
    ];

    $form['card_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Card color'),
      '#description' => $this->t('Enter a valid CSS color.'),
      '#default_value' => $config->get('card_color'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Validate color fields.
    $background_color = $form_state->getValue('background_color');
    $card_color = $form_state->getValue('card_color');

    if (!preg_match('/^#[a-f0-9]{6}$/i', $background_color)) {
      $form_state->setErrorByName('background_color', $this->t('Enter a valid CSS color for the background.'));
    }

    if (!preg_match('/^#[a-f0-9]{6}$/i', $card_color)) {
      $form_state->setErrorByName('card_color', $this->t('Enter a valid CSS color for the card.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('event_config.settings')
      ->set('background_color', $form_state->getValue('background_color'))
      ->set('card_color', $form_state->getValue('card_color'))
      ->save();
    \Drupal::state()->set('event_config.background_color', $form_state->getValue('background_color'));
    \Drupal::state()->set('event_config.card_color', $form_state->getValue('card_color'));

    parent::submitForm($form, $form_state);
  }

}
