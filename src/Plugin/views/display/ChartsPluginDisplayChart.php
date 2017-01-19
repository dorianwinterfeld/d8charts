<?php
/**
 * @file
 * Contains the Chart display type (similar to Page, Block, Attachment, etc.)
 */

namespace Drupal\charts\Plugin\views\display;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\display\Attachment;
use Drupal\views\ViewExecutable;

/**
 * Display plugin to attach multiple chart configurations to the same chart.
 *
 * @ingroup views_display_plugins
 *
 * @ViewsDisplay(
 *   id = "chart_extension",
 *   title = @Translation("Chart attachment"),
 *   help = @Translation("Display that produces a chart."),
 *   theme = "views_view_charts",
 *   contextual_links_locations = {""}
 * )
 *
 */

class ChartsPluginDisplayChart extends Attachment  {

    /**
     * {@inheritdoc}
     */
    protected function defineOptions() {
        $options = parent::defineOptions();

        return $options;

    }

    public function execute() {
        return $this->view->render($this->display['id']);
    }

    /**
     * Provide the summary for page options in the views UI.
     *
     * This output is returned as an array.
     * @param $categories
     * @param $options
     */
  public function optionsSummary(&$categories, &$options) {
    // It is very important to call the parent function here:
    parent::optionsSummary($categories, $options);

    $categories['attachment'] = [
      'title' => t('Chart settings'),
      'column' => 'second',
      'build' => [
        '#weight' => -10,
      ],
    ];
    if (!isset($attach_to)) {
        $attach_to = $this->t('Not defined');
    }
    $options['displays'] = array(
        'category' => 'attachment',
        'title' => $this->t('Parent display'),
        'value' => $attach_to,
    );

  }

    /**
     * Provide the default form for setting options.
     * @param $form
     * @param FormStateInterface $form_state
     */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    switch ($form_state->get('section')) {
      case 'displays':
        $form['#title'] .= t('Parent display');

    }
  }

    /**
     * Perform any necessary changes to the form values prior to storage.
     * There is no need for this function to actually store the data.
     * @param $form
     * @param FormStateInterface $form_state
     */
  public function submitOptionsForm(&$form, FormStateInterface $form_state) {
    // It is very important to call the parent function here:
    parent::submitOptionsForm($form, $form_state);

  }

    /**
     * {@inheritdoc}
     */
    public function attachTo(ViewExecutable $view, $display_id, array &$build)
    {
        $displays = $this->getOption('displays');

        if (empty($displays[$display_id])) {
            return;
        }

        if (!$this->access()) {
            return;
        }
    }


}

