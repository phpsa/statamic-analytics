<?php

namespace Phpsa\StatamicAnalytics\FieldType;

use Statamic\Entries\Entry;
use Statamic\Fields\Fieldtype;

use function PHPUnit\Framework\isInstanceOf;

class GaPageStatsFieldType extends Fieldtype
{
    protected $selectable = false;
    protected static $title = 'Google Analytics Stats';
    protected static $handle = 'ga_page_stats_field';

  /**
   * The blank/default value
   *
   * @return array
   */
    public function blank()
    {
        return null;
    }

  /**
   * Pre-process the data before it gets sent to the publish page
   *
   * @param mixed $data
   * @return array|mixed
   */
    public function preProcess($data)
    {

        return [
            'title' => "testing",
            'entry' => ($this->field()->parent() instanceof Entry) ? $this->field()->parent()->id() : ''
        ];
    }

  /**
   * Process the data before it gets saved
   *
   * @param mixed $data
   * @return array|mixed
   */
    public function process($data)
    {
        return null;
    }
}
