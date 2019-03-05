<?php

namespace Drupal\modulo_prueba\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'getDataJson' block.
 *
 * @Block(
 *  id = "get_data_json",
 *  admin_label = @Translation("Representacion de la información obtenida en una URL"),
 * )
 */
class getDataJson extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
          ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['entrada_de_la_url_que_tiene_los_'] = [
      '#type' => 'url',
      '#title' => $this->t('Entrada de la URL que tiene los datos'),
      '#default_value' => $this->configuration['entrada_de_la_url_que_tiene_los_'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['entrada_de_la_url_que_tiene_los_'] = $form_state->getValue('entrada_de_la_url_que_tiene_los_');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['get_data_json_entrada_de_la_url_que_tiene_los_']['#markup'] = '<p>' . $this->configuration['entrada_de_la_url_que_tiene_los_'] . '</p>';

    return $build;
  }

}
