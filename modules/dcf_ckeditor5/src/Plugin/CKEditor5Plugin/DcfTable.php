<?php

namespace Drupal\dcf_ckeditor5\Plugin\CKEditor5Plugin;

use Drupal\ckeditor5\Plugin\CKEditor5PluginDefault;
use Drupal\ckeditor5\Plugin\CKEditor5PluginInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "DCF Table" plugin.
 *
 * @CKEditor5Plugin(
 *   id = "dcf_table",
 *   label = @Translation("DCF Table")
 * )
 */
class DcfTable extends CKEditor5PluginDefault implements CKEditor5PluginInterface {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    $module_path = \Drupal::service('extension.list.module')->getPath('dcf_ckeditor5');
    return $module_path . '/js/plugin/dcf_table/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function isEnabled(Editor $editor) {
    $settings = $editor->getSettings();
    if (isset($settings['plugins']['dcf_base']['enabled_plugins']['dcf_table'])
      && $settings['plugins']['dcf_base']['enabled_plugins']['dcf_table'] != '0'
      ) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
