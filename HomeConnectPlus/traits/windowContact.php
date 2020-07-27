<?php

declare(strict_types=1);

class DeviceTraitWindowContact
{
    use HelperBoolDevice;
    use HelperNumberDevice;
    use HelperSetDevice;
    const propertyPrefix = 'WindowContact';

    public static function getColumns()
    {
        return [
            [
                'label' => 'Window state',
                'name'  => self::propertyPrefix . 'StateID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ]
        ];
    }

    public static function getStatus($configuration)
    {
        $boolStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'StateID']);
        $integerStatus = self::getGetNumberCompatibility($configuration[self::propertyPrefix . 'StateID']);
        if ($boolStatus != 'OK' && $integerStatus != 'OK') {
            return 'State: ' . $boolStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Window contact: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'StateID']) ) {
          $type = IPS_GetVariable($configuration[self::propertyPrefix . 'StateID'])['VariableType'];
          $value = GetValue($configuration[self::propertyPrefix . 'StateID']);
          if ($type == 0) {
             $value = $value?"open":"closed";
          } else {
            if ($value == 0) $value = "closed";
            else if ($value == 1) $value = "open";
            else if ($value == 2) $value = "tilted";
          }
            return [
                'state'  =>  $value
            ];
        } else {
            return [];
        }
    }

    public static function doExecute($configuration, $command, $data, $emulateStatus)
    {

    }

    public static function getObjectIDs($configuration)
    {
        return [
            $configuration[self::propertyPrefix . 'StateID']
        ];
    }

    public static function supportedTraits($configuration)
    {
        return [
            'action.devices.traits.WindowContact'
        ];
    }

    public static function supportedCommands()
    {
        return [
        ];
    }

    public static function getAttributes()
    {
        return [
        ];
    }
}
