<?php

namespace Magmell\Contao\Validation\Hooks;

use Contao\Widget;
use IBAN;

class ValidatorIbanHook
{
    /**
     * @param string $regexp
     * @param mixed $input
     * @param Widget $objWidget
     * @return bool
     */
    public function addCustomRegexp($regexp, $input, $objWidget)
    {
        if ('iban' !== $regexp)
        {
            return false;
        }

        $objIBAN = new IBAN($input);
        if ($objIBAN->Verify())
        {
            return true;
        }

        $objWidget->addError('IBAN ungültig.');
        return false;
    }
}
