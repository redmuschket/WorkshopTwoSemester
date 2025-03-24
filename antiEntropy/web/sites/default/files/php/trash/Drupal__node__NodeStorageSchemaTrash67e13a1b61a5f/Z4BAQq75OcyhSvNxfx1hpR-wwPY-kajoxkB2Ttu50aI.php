<?php

use Drupal\Core\Field\FieldStorageDefinitionInterface;

/**
 * Provides a custom storage schema class for trash-enabled entity types.
 */
class Drupal__node__NodeStorageSchemaTrash67e13a1b61a5f extends \Drupal\node\NodeStorageSchema {

  /**
   * {@inheritdoc}
   */
  protected function getSharedTableFieldSchema(FieldStorageDefinitionInterface $storage_definition, $table_name, array $column_mapping): array {
    $schema = parent::getSharedTableFieldSchema($storage_definition, $table_name, $column_mapping);

    // @todo Add the 'deleted' field to the required indexes.

    return $schema;
  }

}
