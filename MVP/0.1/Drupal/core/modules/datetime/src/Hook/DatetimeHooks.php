<?php

namespace Drupal\datetime\Hook;

use Drupal\Core\Url;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for datetime.
 */
class DatetimeHooks {

  /**
   * Implements hook_help().
   */
  #[Hook('help')]
  public function help($route_name, RouteMatchInterface $route_match) {
    switch ($route_name) {
      case 'help.page.datetime':
        $output = '';
        $output .= '<h2>' . t('About') . '</h2>';
        $output .= '<p>' . t('The Datetime module provides a Date field that stores dates and times. It also provides the Form API elements <em>datetime</em> and <em>datelist</em> for use in programming modules. See the <a href=":field">Field module help</a> and the <a href=":field_ui">Field UI module help</a> pages for general information on fields and how to create and manage them. For more information, see the <a href=":datetime_do">online documentation for the Datetime module</a>.', [
          ':field' => Url::fromRoute('help.page', [
            'name' => 'field',
          ])->toString(),
          ':field_ui' => \Drupal::moduleHandler()->moduleExists('field_ui') ? Url::fromRoute('help.page', [
            'name' => 'field_ui',
          ])->toString() : '#',
          ':datetime_do' => 'https://www.drupal.org/documentation/modules/datetime',
        ]) . '</p>';
        $output .= '<h2>' . t('Uses') . '</h2>';
        $output .= '<dl>';
        $output .= '<dt>' . t('Managing and displaying date fields') . '</dt>';
        $output .= '<dd>' . t('The <em>settings</em> and the <em>display</em> of the Date field can be configured separately. See the <a href=":field_ui">Field UI help</a> for more information on how to manage fields and their display.', [
          ':field_ui' => \Drupal::moduleHandler()->moduleExists('field_ui') ? Url::fromRoute('help.page', [
            'name' => 'field_ui',
          ])->toString() : '#',
        ]) . '</dd>';
        $output .= '<dt>' . t('Displaying dates') . '</dt>';
        $output .= '<dd>' . t('Dates can be displayed using the <em>Plain</em> or the <em>Default</em> formatter. The <em>Plain</em> formatter displays the date in the <a href="http://en.wikipedia.org/wiki/ISO_8601">ISO 8601</a> format. If you choose the <em>Default</em> formatter, you can choose a format from a predefined list that can be managed on the <a href=":date_format_list">Date and time formats</a> page.', [
          ':date_format_list' => Url::fromRoute('entity.date_format.collection')->toString(),
        ]) . '</dd>';
        $output .= '</dl>';
        return $output;
    }
  }

}
