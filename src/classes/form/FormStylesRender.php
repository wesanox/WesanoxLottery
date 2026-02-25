<?php

namespace ProcessWire;

class FormStylesRender extends WesanoxLottery
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->formSubmitStyle();
    }


    /**
     * @return void
     */
    private function formSubmitStyle(): void
    {
        $this->forms->addHookAfter('InputfieldSubmit::render', function($e) {
            $e->return = str_replace("type='submit'", ' class="btn btn-primary" type="submit"', $e->return);
        });
    }
}