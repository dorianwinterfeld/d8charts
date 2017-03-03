<?php

/**
 * @file
 * Provides elements for rendering charts and Views integration.
 */

/**
 * Used to define a single axis.
 *
 * Constant used in hook_charts_type_info() to declare chart types with a single
 * axis. For example a pie chart only has a single dimension.
 */
define('CHARTS_SINGLE_AXIS', 'y_only');

/**
 * Used to define a dual axis.
 *
 * Constant used in hook_charts_type_info() to declare chart types with a dual
 * axes. Most charts use this type of data, meaning multiple categories each
 * have multiple values. This type of data is usually represented as a table.
 */
define('CHARTS_DUAL_AXIS', 'xy');

// Store Charts preprocess theme functions in a separate .inc file.
\Drupal::moduleHandler()->loadInclude('charts', 'inc', 'charts.theme');

/**
 * Retrieve a list of all charting libraries available.
 *
 * @see hook_charts_info()
 */
function charts_info() {

  $charts_info = array();
  $chart_modules = Drupal::moduleHandler()->getImplementations('charts_info');
  foreach ($chart_modules as $module) {
    $module_charts_info = Drupal::moduleHandler()
      ->invoke($module, 'charts_info');
    foreach ($module_charts_info as $chart_library => $chart_library_info) {
      $module_charts_info[$chart_library]['module'] = $module;
    }
    $charts_info = array_merge($charts_info, $module_charts_info);
  }
  Drupal::moduleHandler()->alter('charts_info', $charts_info);

  return $charts_info;
}

/**
 * Retrieve a list of all chart types available.
 *
 * @see hook_charts_type_info()
 */
function charts_type_info() {

  $charts_type_info = Drupal::moduleHandler()->invokeAll('charts_type_info');

  foreach ($charts_type_info as $chart_type => $chart_type_info) {
    $charts_type_info[$chart_type] += array(
      'label' => '',
      'axis' => CHARTS_DUAL_AXIS,
      'axis_inverted' => FALSE,
      'stacking' => FALSE,
    );
  }

  Drupal::moduleHandler()->alter('charts_type_info', $charts_type_info);
  return $charts_type_info;
}

/**
 * Retrieve a specific chart type.
 *
 * @param string $chart_type
 * The type of chart selected for display.
 *
 * @return mixed
 * If not false, returns an array of values from charts_charts_type_info.
 */
function charts_get_type($chart_type) {
  $types = charts_type_info();
  return ($types[$chart_type]) ? $types[$chart_type] : FALSE;
}

/**
 * Implements hook_charts_type_info().
 */
function charts_charts_type_info() {
  $chart_types['pie'] = array(
    'label' => t('Pie'),
    'axis' => CHARTS_SINGLE_AXIS,
  );
  $chart_types['bar'] = array(
    'label' => t('Bar'),
    'axis' => CHARTS_DUAL_AXIS,
    'axis_inverted' => TRUE,
    'stacking' => TRUE,
  );
  $chart_types['column'] = array(
    'label' => t('Column'),
    'axis' => CHARTS_DUAL_AXIS,
    'stacking' => TRUE,
  );
  $chart_types['line'] = array(
    'label' => t('Line'),
    'axis' => CHARTS_DUAL_AXIS,
  );
  $chart_types['area'] = array(
    'label' => t('Area'),
    'axis' => CHARTS_DUAL_AXIS,
    'stacking' => TRUE,
  );
  $chart_types['scatter'] = array(
    'label' => t('Scatter'),
    'axis' => CHARTS_DUAL_AXIS,
  );
  return $chart_types;
}

/**
 * Default colors used in all libraries.
 */
function charts_default_colors() {
  return array(
    '#2f7ed8',
    '#0d233a',
    '#8bbc21',
    '#910000',
    '#1aadce',
    '#492970',
    '#f28f43',
    '#77a1e5',
    '#c42525',
    '#a6c96a',
  );
}

/**
 * Recursive function to trim out empty options that aren't used.
 *
 * @param array $array
 * Array may contain empty options.
 */
function charts_trim_array(&$array) {
  foreach ($array as $key => &$value) {
    if (is_array($value)) {
      charts_trim_array($value);
    }
    elseif (is_null($value) || (is_array($value) && count($value) === 0)) {
      unset($array[$key]);
    }
  }
}

/**
 * Recursive function to cast integer values.
 *
 * @param mixed $element
 * Cast options to integers to avoid redundant library fixing problems.
 */
function charts_cast_element_integer_values(&$element) {
  $integer_options = array(
    // Chart options.
    '#title_font_size',
    '#font_size',
    '#legend_title_font_size',
    '#legend_font_size',
    '#width',
    '#height',
    // Axis options.
    '#title_font_size',
    '#labels_font_size',
    '#labels_rotation',
    '#max',
    '#min',
    // Data options.
    '#decimal_count',
  );

  foreach ($element as $property_name => $value) {
    if (is_array($element[$property_name])) {
      charts_cast_element_integer_values($element[$property_name]);
    }
    elseif ($property_name && in_array($property_name, $integer_options)) {
      $element[$property_name] = (is_null($element[$property_name]) || strlen($element[$property_name]) === 0)
        ? NULL : (int) $element[$property_name];
    }
  }
}
