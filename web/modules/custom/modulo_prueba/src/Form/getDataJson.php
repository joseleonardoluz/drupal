<?php

namespace Drupal\modulo_prueba\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class getDataJson.
 */
class getDataJson extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'modulo_prueba.getdatajson',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'get_data_json';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('modulo_prueba.getdatajson');
    $form['ingrese_la_direccion_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Ingrese la direccion URL'),
      '#description' => $this->t('Ingrese la URL de donde se desea obtener los datos'),
      '#default_value' => $config->get('ingrese_la_direccion_url'),
    ];
  
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('modulo_prueba.getdatajson')
      ->set('ingrese_la_direccion_url', $form_state->getValue('ingrese_la_direccion_url'))
      ->set('agregar', $form_state->getValue('agregar'))
      ->save();
  }

}
