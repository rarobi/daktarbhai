<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommonHelpersTest extends TestCase
{
    /**
     * Test if the checkIsAValidDate method works.
     *
     * @return void
     */
    public function testCheckIsAValidDate()
    {
        $this->assertTrue(checkIsAValidDate('2018-02-05'));
        $this->assertFalse(checkIsAValidDate('2018/02-05N'));
    }

    /**
     * Test if the checkIsValidJson method works.
     *
     * @return void
     */
    public function testCheckIsValidJson()
    {
        $validJsonFile = \File::get(storage_path('testData/sample-valid.json'));
        $invalidJsonFile = \File::get(storage_path('testData/sample-invalid.json'));

        $this->assertTrue(checkIsValidJson($validJsonFile));
        $this->assertFalse(checkIsValidJson($invalidJsonFile));
    }

    /**
     * Test if the isEmptyOrNull method perfectly check.
     *
     * @return void
     */
    public function testIsEmptyOrNull()
    {
        $nullValue = null;
        $emptyValue = '';
        $nonEmptyValue1 = ' '; // using a space, this is a non-empty value
        $nonEmptyValue2 = 'Not Empty';

        $this->assertTrue(isEmptyOrNull($nullValue));
        $this->assertTrue(isEmptyOrNull($emptyValue));
        $this->assertFalse(isEmptyOrNull($nonEmptyValue1));
        $this->assertFalse(isEmptyOrNull($nonEmptyValue2));
    }

    /**
     * Test if isValid24HoursFormat method perfectly works.
     */
    public function testIsValid24HoursFormat()
    {
        $this->assertTrue(isValid24HoursFormat('20:32'));
        $this->assertTrue(isValid24HoursFormat('08:32'));

        $this->assertFalse(isValid24HoursFormat('2032'));
        $this->assertFalse(isValid24HoursFormat('10:32 PM'));
    }

    /**
     * Test if isValidAmPmFormat method perfectly works.
     */
    public function testIsValidAmPmFormat()
    {
        $this->assertTrue(isValidAmPmFormat('06:19 AM'));
        $this->assertTrue(isValidAmPmFormat('7:32 AM'));
        $this->assertTrue(isValidAmPmFormat('10:32 PM'));

        $this->assertFalse(isValidAmPmFormat('14:32'));
        $this->assertFalse(isValidAmPmFormat('18:32 AM'));
        $this->assertFalse(isValidAmPmFormat('12:61 PM'));
    }

    /**
     * Test if isValidTime method perfectly works.
     */
    public function testIsValidTime()
    {
        $this->assertTrue(isValidTime('23:28'));
        $this->assertTrue(isValidTime('14:28:05'));
        $this->assertTrue(isValidTime('10:00 AM'));
        $this->assertTrue(isValidTime('12:00 PM'));
        $this->assertTrue(isValidTime('11:59 pm'));

        $this->assertFalse(isValidTime('14:28:75'));
        $this->assertFalse(isValidTime('1847'));
        $this->assertFalse(isValidTime('23:87'));
        $this->assertFalse(isValidTime('25:20'));
        $this->assertFalse(isValidTime('7:40PM'));
        $this->assertFalse(isValidTime('20:00 AM'));
        $this->assertFalse(isValidTime('-10:00 AM'));
        $this->assertFalse(isValidTime('+ 10:00 am'));
        $this->assertFalse(isValidTime('12:152 am'));
        $this->assertFalse(isValidTime('tomorrow'));
    }
}
