<?php
/**
 * User: sasik
 * Date: 3/25/16
 * Time: 4:22 PM
 */

namespace App\View;


use Illuminate\Pagination\BootstrapThreePresenter;
use Illuminate\Support\HtmlString;

class MyBootstrapThreePresenter extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        if ($this->hasPages()) {
            return new HtmlString(sprintf(
                '<ul class="pagination pagination-lg">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            ));
        }

        return '';
    }

}