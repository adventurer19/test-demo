<?php

namespace Drupal\niki_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 *
 *
 * @FieldFormatter(
 *   id = "zen_formatter",
 *   label = @Translation("ZenFormatter"),
 *   field_types = {
 *     "zen_type"
 *   }
 * )
 */
class ZenFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Just a brief description.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    /**
     * @var FieldItemListInterface $item
     */
    foreach ($items as $delta => $item) {

      // Render each element as markup.
      $element[$delta] = [
        '#markup' =>  $item->state_name,
      ];
      $element[$delta+1] = [
        '#markup' =>  $item->state_number,
      ];
    }

    return $element;
  }

//  /**
//   * {@inheritdoc}
//   */
//  public function viewElements(FieldItemListInterface $items, $langcode) {
//    $elements = array();
//    foreach ($items as $delta => $item) {
//      // Render output using snippets_default theme.
//      $source = array(
//        '#theme' => 'snippets_default',
//        '#source_description' => $item->source_description,
//        '#source_code' => $item->source_code,
//      );
//
//      $elements[$delta] = array('#markup' => \Drupal::service('renderer')->render($source));
//    }
//
//    return $elements;
//  }

}
