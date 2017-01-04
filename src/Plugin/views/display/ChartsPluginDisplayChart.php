<?php
/**
 * @file
 * Contains the Chart display type (similar to Page, Block, Attachment, etc.)
 */

namespace Drupal\charts\Plugin\views\display;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\display\DisplayPluginBase;

/**
 * Display plugin to attach multiple chart configurations to the same chart.
 *
 * @ingroup views_display_plugins
 *
 * @ViewsDisplay(
 *   id = "chart",
 *   title = @Translation("Chart display"),
 *   help = @Translation("Display that produces a chart."),
 *   theme = "views_view_charts",
 *   contextual_links_locations = {""}
 * )
 *
 */

class ChartsPluginDisplayChart extends DisplayPluginBase  {
  function getType() {
    return 'chart';
  }

  /**
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    // Overrides of standard options.
    $options['style_plugin']['default'] = 'chart_extension';
    $options['row_plugin']['default'] = 'fields';
    $options['defaults']['default']['style_plugin'] = FALSE;
    $options['defaults']['default']['style_options'] = FALSE;
    $options['defaults']['default']['row_plugin'] = FALSE;
    $options['defaults']['default']['row_options'] = FALSE;

    $options['parent_display'] = array('default' => '');
    $options['inherit_yaxis'] = array('default' => '1');

//    from Attachment.php
//    $options['displays'] = array('default' => array());
//    $options['attachment_position'] = array('default' => 'before');
//    $options['inherit_arguments'] = array('default' => TRUE);
//    $options['inherit_exposed_filters'] = array('default' => FALSE);
//    $options['inherit_pager'] = array('default' => FALSE);
//    $options['render_pager'] = array('default' => FALSE);


    return $options;
  }

//  /**
//   * @return array|null
//   */
//  public function execute() {
//    $element = $this->view->render();
//    return $element;
//  }

  /**
   * Provide the summary for page options in the views UI.
   *
   * This output is returned as an array.
   */
  public function optionsSummary(&$categories, &$options) {
    // It is very important to call the parent function here:
    parent::optionsSummary($categories, $options);

    $categories['chart'] = [
      'title' => t('Chart settings'),
      'column' => 'second',
      'build' => [
        '#weight' => -10,
      ],
    ];

    $parent_title = NULL;
    $parent_display = $this->getOption('parent_display');
    if (!empty($this->display[$parent_display])) {
      $parent_title = $this->display[$parent_display]->display_title;
      /**
       * @todo: figure out what check_plain($this->display[$parent_display]->display_title;) should be
       **/
    }
    $options['parent_display'] = [
      'category' => 'chart',
      'title' => t('Combine with parent chart'),
      'value' => $parent_title ? $parent_title : t('None'),
    ];
    $options['inherit_yaxis'] = [
      'category' => 'chart',
      'title' => t('Axis settings'),
      'value' => $this->options['inherit_yaxis'] ? t('Use primary Y-axis') : t('Create secondary axis'),
    ];

  }

  /**
   * Provide the default form for setting options.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    switch ($form_state->get('section')) {
      case 'parent_display':
        $form['#title'] .= t('Parent display');

        // Filter down the list of displays to include only those that use
        // the chart display style.
        $display_options = array();
        if (!empty($display_name)) {
          foreach ($this->display as $display_name => $display) {
            if ($display->handler->options['style_plugin'] === 'chart' && $display_name !== $this->view->current_display) {
              $display_options[$display_name] = $display->display_title;
            }
          }
        }
        $form['parent_display'] = array(
          '#title' => t('Parent display'),
          '#type' => 'select',
          '#options' => $display_options,
          '#empty_option' => t('- None - '),
          '#required' => TRUE,
          '#default_value' => $this->options['parent_display'],
          '#description' => t('Select a parent display onto which this chart will be overlaid. Only other displays using a "Chart" format are included here. This option may be used to create charts with several series of data or to create combination charts.'),
        );
        break;
      case 'inherit_yaxis':
        $form['#title'] .= t('Axis settings');
        $form['inherit_yaxis'] = array(
          '#title' => t('Y-Axis settings'),
          '#type' => 'radios',
          '#options' => array(
            1 => t('Inherit primary of parent display'),
            0 => t('Create a secondary axis'),
          ),
          '#default_value' => $this->options['inherit_yaxis'],
          '#description' => t('In most charts, the X and Y axis from the parent display are both shared with each attached child chart. However, if this chart is going to use a different unit of measurement, a secondary axis may be added on the opposite side of the normal Y-axis.'),
        );
        break;

    }
  }

  /**
   * Perform any necessary changes to the form values prior to storage.
   * There is no need for this function to actually store the data.
   */
  public function submitOptionsForm(&$form, FormStateInterface $form_state) {
    // It is very important to call the parent function here:
    parent::submitOptionsForm($form, $form_state);
    $section = $form_state->get('section');
    switch ($section) {
      case 'parent_display':
        $form_state->setValue($section, array_filter($form_state->getValue($section)));
      break;
      case 'inherit_yaxis':
      $this->setOption($section, $form_state->getValue($section));
      break;
    }
  }
}

