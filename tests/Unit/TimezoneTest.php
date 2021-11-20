<?php

namespace Neo\Core\Tests\Unit;

use Neo\Core\Models\Master\Timezone;
use Neo\Core\Tests\TestCase;

class TimezoneTest extends TestCase
{
    /** @test */
    public function a_timezone_has_value_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('Dateline Standard Time', $timezone->value);
    }

    /** @test */
    public function a_timezone_has_abbr_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('DST', $timezone->abbr);
    }

    /** @test */
    public function a_timezone_has_offset_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('-12', $timezone->offset);
    }

    /** @test */
    public function a_timezone_has_isdst_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('0', $timezone->isdst);
    }

    /** @test */
    public function a_timezone_has_text_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('(UTC-12:00) International Date Line West', $timezone->text);
    }

    /** @test */
    public function a_timezone_has_utc_attribute()
    {
        $this->seed('Neo\Core\Seeds\TimeZoneTableSeeder');
        $timezone = Timezone::first();

        $this->assertEquals('Etc/GMT+12', $timezone->utc);
    }

}