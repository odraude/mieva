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
 * @Last Modified by:   odraude
 * @Last Modified time: 2018-03-29 19:01:21
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$coverblockshtml = $OUTPUT->blocks('side-cover');
$hascoverblocks = strpos($coverblockshtml, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$links = [
    'seplogolink' => get_config('theme_mieva', 'seplogolink'),
    'palogolink' => get_config('theme_mieva', 'palogolink'),
    'mievahomepagelink' => get_config('theme_mieva', 'mievahomepagelink'),
    'mievainstaccountlink' => get_config('theme_mieva', 'mievainstaccountlink'),
    'mievarecoverpasswordlink' => get_config('theme_mieva', 'mievarecoverpasswordlink'),
    'mievawhatisitlink' => get_config('theme_mieva', 'mievawhatisitlink'),
    'mievacertifylink' => get_config('theme_mieva', 'mievacertifylink'),
    'mievamycertifylink' => get_config('theme_mieva', 'mievamycertifylink'),
    'mievacenterslocationlink' => get_config('theme_mieva', 'mievacenterslocationlink'),
    'mievalearningmoduleslink' => get_config('theme_mieva', 'mievalearningmoduleslink'),
    'mievasubjectslink' => get_config('theme_mieva', 'mievasubjectslink'),
    'mievacontactlink' => get_config('theme_mieva', 'mievacontactlink'),
    'mievacontactemaillink' => get_config('theme_mieva', 'mievacontactemaillink'),
    'mievasitemaplink' => get_config('theme_mieva', 'mievasitemaplink'),
    'mievaprivacypolicieslink' => get_config('theme_mieva', 'mievaprivacypolicieslink'),
    'mievacreditslink' => get_config('theme_mieva', 'mievacreditslink'),
    'mievafrequentquestionslink' => get_config('theme_mieva', 'mievafrequentquestionslink'),
    'mievahelplink' => get_config('theme_mieva', 'mievahelplink')
];

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'sidecoverblocks' => $coverblockshtml,
    'hascoverblocks' => $hascoverblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'logo_sep' => $OUTPUT->image_url('LogoSep', 'theme'),
    'links' => $links
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;
echo $OUTPUT->render_from_template('theme_mieva/columns2', $templatecontext);