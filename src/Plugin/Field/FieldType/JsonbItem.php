<?php

/**
 * @file
 * Contains \Drupal\jsonb\Plugin\Field\FieldType\JsonbItem.
 */

namespace Drupal\jsonb\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'jsonb' field type.
 *
 * @FieldType(
 *   id = "jsonb",
 *   label = @Translation("JSONB"),
 *   description = @Translation("This field stores a JSON object or an array of JSON objects."),
 *   category = @Translation("Document"),
 *   default_widget = "jsonb_textarea",
 *   default_formatter = "jsonb_default"
 * )
 */
class JsonbItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'jsonb',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('JSONB value'));

    return $properties;
  }
}
