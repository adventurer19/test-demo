<?php

namespace Drupal\niki_fields\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of custom list.
 *
 * @FieldType(
 *   id = "zen_type",
 *   label = @Translation ("zen type"),
 *   description = @Translation ("Custom fieldtype implementing psudo list."),
 *   default_widget = "zen_widget",
 *   default_formatter = "zen_formatter"
 *   )
 */


class ZenList extends FieldItemBase {

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value_name'] = DataDefinition::create('string')->setLabel(t('name'));
    $properties['value_number'] = DataDefinition::create('string')->setLabel(t('number'));

    return $properties;

  }

  public static function schema(FieldStorageDefinitionInterface $field_definition) {
      return [
        'description' => 'State table containing name and number',
        'columns' => [
          'state_name' => [
            'type' => 'varchar',
            'length' => 256,
          ],
          'state_number' => [
            'type' => 'int',
            'unsigned' => TRUE,
            'not null' => TRUE,
          ],
//          'primary key' => ['state_number'],
        ]
      ];
  }

  /**
 * {@inheritdoc}
 */
  public function isEmpty() {
    $value = [];
    $value['name'] =  $this->get('value_name')->getValue() ?? '';
    $value['number'] =  $this->get('value_number')->getValue() ?? '';
    return $value;
  }


}
