<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * File containing tests for database backups.
 *
 * @package     local_deleteteacherbackups
 * @category    test
 * @copyright   2020 Tia <tia@techiasolutions.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// For installation and usage of PHPUnit within Moodle please read:
// https://docs.moodle.org/dev/PHPUnit
//
// Documentation for writing PHPUnit tests for Moodle can be found here:
// https://docs.moodle.org/dev/PHPUnit_integration
// https://docs.moodle.org/dev/Writing_PHPUnit_tests
//
// The official PHPUnit homepage is at:
// https://phpunit.de

/**
 * The database backups test class.
 *
 * @package    local_deleteteacherbackups
 * @copyright  2020 Tia <tia@techiasolutions.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_deleteteacherbackups_databasebackups_testcase extends advanced_testcase {
    /**
     * Get database backups.
     *
     * @return void
     * @throws dml_exception
     */
    public function test_getbackups(): void {
        global $DB;

        $maxdays = 30;
        $backups = $this->databasebackups->getbackups($maxdays);

        $this->assertIsArray($backups);
    }

    /**
     * Delete database backups.
     *
     * @return void
     * @throws dml_exception
     */
    public function test_deletebackups(): void {
        $this->resetAfterTest();

        $testhash = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $deleted = $this->databasebackups->deletebackups($testhash);

        $this->assertTrue($deleted);
    }

    /**
     * Setup data call.
     *
     * @return void
     */
    public function setUp(): void {
        $this->databasebackups = new databasebackups();
    }

    /**
     * Tears down the data call.
     *
     * @return void
     */
    public function tearDown(): void {
        $this->databasebackups = null;
    }

}
