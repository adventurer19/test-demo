<?php

namespace Drupal\niki_fields\Plugin\Field\FieldWidget;


use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of widget.
 *
 * @FieldWidget(
 *   id = "zen_widget",
 *   label = @Translation("SPS list widget"),
 *   field_types = {
 *     "zen_type"
 *   }
 * )
 */


class ZenWidget extends WidgetBase {


  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);
    $element['rows']['#description'] = $this->t('Text editors (like CKEditor) may override this setting.');
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['state_name'] = array(
      '#title' => $this->t('name'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->value_name) ? $items[$delta]->value_name : NULL,
    );
    $element['state_number'] = array(
      '#title' => $this->t('number'),
      '#type' => 'number',
      '#default_value' => isset($items[$delta]->value_number) ? $items[$delta]->value_number : NULL,
    );

    return $element;
  }

//  /**
//   * Validate the color text field.
//   */
  public function validate($element, FormStateInterface $form_state) {

    $a = 1;
  }
//    $value = $element['#value'];
//    if (strlen($value) == 0) {
//      $form_state->setValueForElement($element, '');
//      return;
//    }
//    if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
//      $form_state->setError($element, t("Color must be a 6-digit hexadecimal value, suitable for CSS."));
//    }
//  }

}
