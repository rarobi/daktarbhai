<?php

namespace App\Services;

/**
 * Class CustomDropdowns
 * @package App\Services\Macros
 */
trait CustomDropdowns
{
    /**
     * @param  $name
     * @param  null     $selected
     * @param  array    $options
     * @return string
     */
    public function selectTreatmentType($name, $selected = null, $options = array())
    {
        $list = [
            ''    => 'Select One...',
            'Bridges'                 => 'Bridges',
            'Crowns'                  => 'Crowns',
            'Fillings'                => 'Fillings',
            'Root canal treatment'    => 'Root canal treatment',
            'Scale and polish'        => 'Scale and polish',
            'Braces'                  => 'Braces',
            'Wisdom tooth removal'    => 'Wisdom tooth removal',
            'Dental implants'         => 'Dental implants',
            'Dentures or false teeth' => 'Dentures or false teeth',
        ];

        return $this->select($name, $list, $selected, $options);
    }

    /**
     * @param  $name
     * @param  null     $selected
     * @param  array    $options
     * @return string
     */
    public function selectBloodGroup($name, $selected = null, $options = array())
    {
        $list = [
            ''      => 'Select One...',
            'A+'    => 'A+',
            'A-'    => 'A-',
            'B+'    => 'B+',
            'B-'    => 'B-',
            'O+'    => 'O+',
            'O-'    => 'O-',
            'AB+'   => 'AB+',
            'AB-'   => 'AB-',
        ];

        return $this->select($name, $list, $selected, $options);
    }

    /**
     * @param $name
     * @param null $selected
     * @param array $options
     * @return mixed
     */
    public function selectMaritalStatus($name, $selected = null, $options = array())
    {
        $list = [
            ''          => 'Select One...',
            'Married'   => 'Married',
            'Unmarried' => 'Unmarried',
        ];

        return $this->select($name, $list, $selected, $options);
    }

    /**
     * @param $name
     * @param null $selected
     * @param array $options
     * @return mixed
     */
    public function selectUrineCustomValue($name, $selected = null, $options = array())
    {
        $list = [
            ''       => 'Select an Option',
            'nill'   => 'Nill',
            'trace'  => 'Trace',
            '(+)'    => '(+)',
            '(++)'   => '(++)',
            '(+++)'  => '(+++)',
            'plenty' => 'Plenty'
        ];

        return $this->select($name, $list, $selected, $options);
    }
}