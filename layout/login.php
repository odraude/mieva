<?php

// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Mi EVA.
 *
 * @package    theme_mieva
 * @Author:    Eduardo Camarillo
 * @Date:      2018-03-02 22:21:42
 * @Last Modified by:	Eduardo Camarillo
 * @Last Modified time:	2018-03-05 23:17:31
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'logo_sep' => $OUTPUT->image_url('LogoSep', 'theme'),
    'logos_prepabier' => $OUTPUT->image_url('LogosPREPabier', 'theme')
];

echo $OUTPUT->render_from_template('theme_mieva/login', $templatecontext);
