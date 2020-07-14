<?php

declare(strict_types=1);

trait HelperBoolDevice
{
    private static function getBoolCompatibility($variableID)
    {
        if (!IPS_VariableExists($variableID)) {
            return 'Missing';
        }

        $targetVariable = IPS_GetVariable($variableID);

        if ($targetVariable['VariableType'] != 0 /* Boolean */) {
            return 'Bool required';
        }

        return 'OK';
    }

    private static function getBoolValue($variableID)
    {
        $targetVariable = IPS_GetVariable($variableID);

        $value = GetValue($variableID);

        return $value;
    }
}
