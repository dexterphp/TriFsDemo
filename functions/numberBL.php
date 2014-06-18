<?php
namespace ThirdFrameStudios\phoneChecker;

class PhoneNumberChecker
{
    public function convertNumber($number)
    {
        $operatorPrefix = substr($number, 0, 2);
        $userPhoneNumber = substr($number, 2, 8);

        $operatorName = $this->getMobileOperator($operatorPrefix);

        return $operatorName.", 386, ".
               $operatorPrefix.$userPhoneNumber.', SI';	//Static data like 386 and SI at the end.
    }

    private function getMobileOperator($operatorPrefix)
    {
        if ($operatorPrefix == '30' || $operatorPrefix == '40' || $operatorPrefix == '68') {
            $return = 'Si.mobil';
        }
        elseif ($operatorPrefix == '31' || $operatorPrefix == '41' ||
                $operatorPrefix == '51' || $operatorPrefix == '71') {
            $return = 'Mobitel';
        }
        elseif ($operatorPrefix == '70') {
            $return = 'Tušmobil';
        }
        elseif ($operatorPrefix == '64') {
            $return = 'T-2';
        } else {
            $return = 'Neznan operater';
        }

        return $return;
    }
}
