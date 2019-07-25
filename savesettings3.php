/*
 * MIT License
 * 
 * Copyright (c) 2019 Roman Danilov
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 */

<?php

// $_POST = json_decode(file_get_contents('php://input'), true);

$servername = $_POST['servername']; // your host(server) name
$dbname = $_POST['dbname'];  // your database name
$username = $_POST['username'];  // your username
$password = $_POST['password'];  // your password


$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error . "\nservername: " . $servername . "\ndbname:" . $dbname . "\nusername:" . $username . "\npassword: " . $password);
} 


$table = "CREATE TABLE IF NOT EXISTS `events` (
`idd` int NOT NULL AUTO_INCREMENT PRIMARY KEY,

`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`name_text` varchar(255) NOT NULL,
`name_html` varchar(255) NOT NULL,

`description_text` TEXT NOT NULL,
`description_html` TEXT NOT NULL,

`id` varchar(100) NOT NULL,
`url` varchar(500) NOT NULL,
`vanity_url` varchar(255),

`start_local` varchar(50),
`start_timezone` varchar(255),
`start_utc` varchar(50),

`end_local` varchar(50),
`end_timezone` varchar(255),
`end_utc`  varchar(50),

`organization_id` varchar(100) NOT NULL,
`created` varchar(50),
`changed` varchar(50),
`capacity` varchar(255),
`capacity_is_custom` varchar(255),
`status` varchar(50),
`currency` varchar(20),
`listed` varchar(10),
`shareable` varchar(10),
`online_event`  varchar(10),
`tx_time_limit` int ,
`hide_start_date` varchar(10),
`hide_end_date` varchar(10),
`locale` varchar(10),
`is_locked` varchar(10),
`privacy_setting` varchar(20),
`is_series` varchar(10),
`is_series_parent` varchar(10),
`is_reserved_seating` varchar(10),
`show_pick_a_seat` varchar(10),
`show_seatmap_thumbnail` varchar(10),
`show_colors_in_seatmap_thumbnail` varchar(10),
`source` varchar(50),
`is_free` varchar(10),
`version` varchar(10),
`logo_id` varchar(255),
`organizer_id` 	varchar(255),
`venue_id` varchar(255),
`category_id` varchar(255),
`subcategory_id` varchar(255),
`format_id` varchar(100),
`resource_uri` varchar(255),

`logo_crop_mask_top_left_x` int,
`logo_crop_mask_top_left_y` int,

`logo_crop_mask_width` int,
`logo_crop_mask_height` int,

`logo_original_url` TEXT,
`logo_original_width` int,
`logo_original_height` int,

`logo_ids` varchar(255),
`logo_url` TEXT,
`logo_aspect_ratio` varchar(50),
`logo_edge_color` varchar(50),
`logo_edge_color_set` varchar(10),

`organizer_description_text` TEXT,
`organizer_description_html` TEXT,
`organizer_long_description_text` TEXT,
`organizer_long_description_html` TEXT,

`organizer_logo_crop_mask` 	varchar(255),
`organizer_logo_original` varchar (255),

`organizer_logo_id` varchar (255),
`organizer_logo_url` varchar (255),
`organizer_logo_aspect_ratio` varchar (255),
`organizer_logo_edge_color` varchar (255),
`organizer_logo_edge_color_set` varchar (255),

`organizer_resource_uri` varchar (255),
`organizer_name` varchar (255),
`organizer_url` varchar (255),
`organizer_vanity_url` varchar (255),
`organizer_num_past_events` varchar (255),
`organizer_num_future_events` varchar (255),
`organizer_twitter` varchar (255),
`organizer_facebook` varchar (255),

`venue_address_address_1`varchar (255),
`venue_address_address_2`varchar (255),
`venue_address_city`varchar (255),
`venue_address_region`varchar (255),
`venue_address_postal_code`varchar (255),
`venue_address_country`varchar (255),
`venue_address_latitude`varchar (255),
`venue_address_longitude`varchar (255),
`venue_address_localized_address_display`varchar (255),
`venue_address_localized_area_display`varchar (255),
`venue_address_localized_multi_line_address_display`varchar (255),

`venue_resource_uri`varchar (255),
`venue_age_restriction`varchar (255),
`venue_capacity`varchar (255),
`venue_name`varchar (255),
`venue_latitude`varchar (255),
`venue_longitude`varchar (255)

)";


$addresstable = "CREATE TABLE IF NOT EXISTS `address` (
`idd` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`organizer_description_text` TEXT,
`organizer_description_html` TEXT,
`organizer_long_description_text` TEXT,
`organizer_long_description_html` TEXT,

`start_local` varchar(50),
`start_timezone` varchar(255),
`start_utc` varchar(50),

`end_local` varchar(50),
`end_timezone` varchar(255),
`end_utc`  varchar(50),

`organizer_logo_crop_mask` 	varchar(255),
`organizer_logo_original` varchar (255),

`organizer_logo_id` varchar (255),
`organizer_logo_url` varchar (255),
`organizer_logo_aspect_ratio` varchar (255),
`organizer_logo_edge_color` varchar (255),
`organizer_logo_edge_color_set` varchar (255),

`organizer_resource_uri` varchar (255),
`organizer_id` varchar (255),
`organizer_name` varchar (255),
`organizer_url` varchar (255),
`organizer_vanity_url` varchar (255),
`organizer_num_past_events` varchar (255),
`organizer_num_future_events` varchar (255),
`organizer_twitter` varchar (255),
`organizer_facebook` varchar (255),

`venue_address_address_1`varchar (255),
`venue_address_address_2`varchar (255),
`venue_address_city`varchar (255),
`venue_address_region`varchar (255),
`venue_address_postal_code`varchar (255),
`venue_address_country`varchar (255),
`venue_address_latitude`varchar (255),
`venue_address_longitude`varchar (255),
`venue_address_localized_address_display`varchar (255),
`venue_address_localized_area_display`varchar (255),
`venue_address_localized_multi_line_address_display`varchar (255),

`venue_resource_uri`varchar (255),
`venue_id`varchar (255),
`venue_age_restriction`varchar (255),
`venue_capacity`varchar (255),
`venue_name`varchar (255),
`venue_latitude`varchar (255),
`venue_longitude`varchar (255)
)";

		
if ($conn->query($table) === TRUE && $conn->query($addresstable) === TRUE) {

	// $data = mysqli_real_escape_string($conn, $_POST['data']);
$name_text = mysqli_real_escape_string($conn, $_POST['name_text']);
$name_html = mysqli_real_escape_string($conn, $_POST['name_html']);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$description_text = mysqli_real_escape_string($conn, $_POST['description_text']);
$description_html = mysqli_real_escape_string($conn, $_POST['description_html']);
$url = mysqli_real_escape_string($conn, $_POST['url']);
$vanity_url = mysqli_real_escape_string($conn, $_POST['vanity_url']);
$start_local = mysqli_real_escape_string($conn, $_POST['start_local']);
$start_timezone = mysqli_real_escape_string($conn, $_POST['start_timezone']);
$start_utc = mysqli_real_escape_string($conn, $_POST['start_utc']);
$end_local = mysqli_real_escape_string($conn, $_POST['end_local']);
$end_timezone = mysqli_real_escape_string($conn, $_POST['end_timezone']);
$end_utc = mysqli_real_escape_string($conn, $_POST['end_utc']);
$organization_id = mysqli_real_escape_string($conn, $_POST['organization_id']);
$created = mysqli_real_escape_string($conn, $_POST['created']);
$changed = mysqli_real_escape_string($conn, $_POST['changed']);
$capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
$capacity_is_custom = mysqli_real_escape_string($conn, $_POST['capacity_is_custom']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$currency = mysqli_real_escape_string($conn, $_POST['currency']);
$listed = mysqli_real_escape_string($conn, $_POST['listed']);
$shareable = mysqli_real_escape_string($conn, $_POST['shareable']);
$online_event = mysqli_real_escape_string($conn, $_POST['online_event']);
$tx_time_limit = mysqli_real_escape_string($conn, $_POST['tx_time_limit']);
$hide_start_date = mysqli_real_escape_string($conn, $_POST['hide_start_date']);
$hide_end_date = mysqli_real_escape_string($conn, $_POST['hide_end_date']);
$locale = mysqli_real_escape_string($conn, $_POST['locale']);
$is_locked = mysqli_real_escape_string($conn, $_POST['is_locked']);
$privacy_setting = mysqli_real_escape_string($conn, $_POST['privacy_setting']);
$is_series = mysqli_real_escape_string($conn, $_POST['is_series']);
$is_series_parent = mysqli_real_escape_string($conn, $_POST['is_series_parent']);
$is_reserved_seating = mysqli_real_escape_string($conn, $_POST['is_reserved_seating']);
$show_pick_a_seat = mysqli_real_escape_string($conn, $_POST['show_pick_a_seat']);
$show_seatmap_thumbnail = mysqli_real_escape_string($conn, $_POST['show_seatmap_thumbnail']);
$show_colors_in_seatmap_thumbnail = mysqli_real_escape_string($conn, $_POST['show_colors_in_seatmap_thumbnail']);
$source = mysqli_real_escape_string($conn, $_POST['source']);
$is_free = mysqli_real_escape_string($conn, $_POST['is_free']);
$version = mysqli_real_escape_string($conn, $_POST['version']);

$logo_id = mysqli_real_escape_string($conn, $_POST['logo_id']);
$organizer_id = mysqli_real_escape_string($conn, $_POST['organizer_id']);
$venue_id = mysqli_real_escape_string($conn, $_POST['venue_id']);
$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
$subcategory_id = mysqli_real_escape_string($conn, $_POST['subcategory_id']);
$format_id = mysqli_real_escape_string($conn, $_POST['format_id']);
$resource_uri = mysqli_real_escape_string($conn, $_POST['resource_uri']);

$logo_crop_mask_top_left_x = mysqli_real_escape_string($conn, $_POST['logo_crop_mask_top_left_x']);
$logo_crop_mask_top_left_y = mysqli_real_escape_string($conn, $_POST['logo_crop_mask_top_left_y']);
$logo_crop_mask_width = mysqli_real_escape_string($conn, $_POST['logo_crop_mask_width']);
$logo_crop_mask_height = mysqli_real_escape_string($conn, $_POST['logo_crop_mask_height']);
$logo_original_url = mysqli_real_escape_string($conn, $_POST['logo_original_url']);
$logo_original_width = mysqli_real_escape_string($conn, $_POST['logo_original_width']);
$logo_original_height = mysqli_real_escape_string($conn, $_POST['logo_original_height']);
$logo_ids = mysqli_real_escape_string($conn, $_POST['logo_ids']);
$logo_url = mysqli_real_escape_string($conn, $_POST['logo_url']);
$logo_aspect_ratio = mysqli_real_escape_string($conn, $_POST['logo_aspect_ratio']);
$logo_edge_color = mysqli_real_escape_string($conn, $_POST['logo_edge_color']);
$logo_edge_color_set = mysqli_real_escape_string($conn, $_POST['logo_edge_color_set']);

$organizer_description_text = mysqli_real_escape_string($conn, $_POST['organizer_description_text']);
$organizer_description_html = mysqli_real_escape_string($conn, $_POST['organizer_description_html']);
$organizer_long_description_text = mysqli_real_escape_string($conn, $_POST['organizer_long_description_text']);
$organizer_long_description_html = mysqli_real_escape_string($conn, $_POST['organizer_long_description_html']);
$organizer_logo_crop_mask = mysqli_real_escape_string($conn, $_POST['	organizer_logo_crop_mask	']);
$organizer_logo_original = mysqli_real_escape_string($conn, $_POST['organizer_logo_original']);
$organizer_logo_id = mysqli_real_escape_string($conn, $_POST['organizer_logo_id']);
$organizer_logo_url = mysqli_real_escape_string($conn, $_POST['organizer_logo_url']);
$organizer_logo_aspect_ratio = mysqli_real_escape_string($conn, $_POST['organizer_logo_aspect_ratio']);
$organizer_logo_edge_color = mysqli_real_escape_string($conn, $_POST['organizer_logo_edge_color']);
$organizer_logo_edge_color_set = mysqli_real_escape_string($conn, $_POST['organizer_logo_edge_color_set']);
$organizer_resource_uri = mysqli_real_escape_string($conn, $_POST['organizer_resource_uri']);

$organizer_name = mysqli_real_escape_string($conn, $_POST['organizer_name']);
$organizer_url = mysqli_real_escape_string($conn, $_POST['organizer_url']);
$organizer_vanity_url = mysqli_real_escape_string($conn, $_POST['organizer_vanity_url']);
$organizer_num_past_events = mysqli_real_escape_string($conn, $_POST['organizer_num_past_events']);
$organizer_num_future_events = mysqli_real_escape_string($conn, $_POST['organizer_num_future_events']);
$organizer_twitter = mysqli_real_escape_string($conn, $_POST['organizer_twitter']);
$organizer_facebook = mysqli_real_escape_string($conn, $_POST['organizer_facebook']);

$venue_address_address_1 = mysqli_real_escape_string($conn, $_POST['venue_address_address_1']);
$venue_address_address_2 = mysqli_real_escape_string($conn, $_POST['venue_address_address_2']);
$venue_address_city = mysqli_real_escape_string($conn, $_POST['venue_address_city']);
$venue_address_region = mysqli_real_escape_string($conn, $_POST['venue_address_region']);
$venue_address_postal_code = mysqli_real_escape_string($conn, $_POST['venue_address_postal_code']);
$venue_address_country = mysqli_real_escape_string($conn, $_POST['venue_address_country']);
$venue_address_latitude = mysqli_real_escape_string($conn, $_POST['venue_address_latitude']);
$venue_address_longitude = mysqli_real_escape_string($conn, $_POST['venue_address_longitude']);
$venue_address_localized_address_display = mysqli_real_escape_string($conn, $_POST['venue_address_localized_address_display']);
$venue_address_localized_area_display = mysqli_real_escape_string($conn, $_POST['venue_address_localized_area_display']);
$venue_address_localized_multi_line_address_display = mysqli_real_escape_string($conn, $_POST['venue_address_localized_multi_line_address_display']);
$venue_resource_uri = mysqli_real_escape_string($conn, $_POST['venue_resource_uri']);

$venue_age_restriction = mysqli_real_escape_string($conn, $_POST['venue_age_restriction']);
$venue_capacity = mysqli_real_escape_string($conn, $_POST['venue_capacity']);
$venue_name = mysqli_real_escape_string($conn, $_POST['venue_name']);
$venue_latitude = mysqli_real_escape_string($conn, $_POST['venue_latitude']);
$venue_longitude = mysqli_real_escape_string($conn, $_POST['venue_longitude']);


$sql = "INSERT INTO events ( date, name_text, name_html,  id, description_text, description_html, url, vanity_url, start_local, start_timezone, start_utc, end_local, end_timezone, end_utc, organization_id, created, changed, capacity, capacity_is_custom, status, currency, listed, shareable, online_event, tx_time_limit, hide_start_date, hide_end_date, locale, is_locked, privacy_setting, is_series, is_series_parent, is_reserved_seating, show_pick_a_seat, show_seatmap_thumbnail, show_colors_in_seatmap_thumbnail, source, is_free, version, logo_id, organizer_id, venue_id, category_id, subcategory_id, format_id, resource_uri, logo_crop_mask_top_left_x, logo_crop_mask_top_left_y, logo_crop_mask_width, logo_crop_mask_height, logo_original_url, logo_original_width, logo_original_height, logo_ids, logo_url, logo_aspect_ratio, logo_edge_color, logo_edge_color_set, organizer_description_text, organizer_description_html, organizer_long_description_text, organizer_long_description_html, organizer_logo_crop_mask, organizer_logo_original, organizer_logo_id, organizer_logo_url, organizer_logo_aspect_ratio, organizer_logo_edge_color, organizer_logo_edge_color_set, organizer_resource_uri, organizer_name, organizer_url, organizer_vanity_url, organizer_num_past_events, organizer_num_future_events, organizer_twitter, organizer_facebook, venue_address_address_1, venue_address_address_2, venue_address_city, venue_address_region, venue_address_postal_code, venue_address_country, venue_address_latitude, venue_address_longitude, venue_address_localized_address_display, venue_address_localized_area_display, venue_address_localized_multi_line_address_display, venue_resource_uri,  venue_age_restriction, venue_capacity, venue_name, venue_latitude, venue_longitude)
VALUES (CURDATE(),  '$name_text', '$name_html', '$id', '$description_text', '$description_html', '$url', '$vanity_url', '$start_local', '$start_timezone', '$start_utc', '$end_local', '$end_timezone', '$end_utc', '$organization_id', '$created', '$changed', '$capacity', '$capacity_is_custom', '$status', '$currency', '$listed', '$shareable', '$online_event', '$tx_time_limit', '$hide_start_date', '$hide_end_date', '$locale', '$is_locked', '$privacy_setting', '$is_series', '$is_series_parent', '$is_reserved_seating', '$show_pick_a_seat', '$show_seatmap_thumbnail', '$show_colors_in_seatmap_thumbnail', '$source', '$is_free', '$version', '$logo_id', '$organizer_id', '$venue_id', '$category_id', '$subcategory_id', '$format_id', '$resource_uri', '$logo_crop_mask_top_left_x', '$logo_crop_mask_top_left_y', '$logo_crop_mask_width', '$logo_crop_mask_height', '$logo_original_url', '$logo_original_width', '$logo_original_height', '$logo_ids', '$logo_url', '$logo_aspect_ratio', '$logo_edge_color', '$logo_edge_color_set', '$organizer_description_text', '$organizer_description_html', '$organizer_long_description_text', '$organizer_long_description_html', '$organizer_logo_crop_mask	', '$organizer_logo_original', '$organizer_logo_id', '$organizer_logo_url', '$organizer_logo_aspect_ratio', '$organizer_logo_edge_color', '$organizer_logo_edge_color_set', '$organizer_resource_uri', '$organizer_name', '$organizer_url', '$organizer_vanity_url', '$organizer_num_past_events', '$organizer_num_future_events', '$organizer_twitter', '$organizer_facebook', '$venue_address_address_1', '$venue_address_address_2', '$venue_address_city', '$venue_address_region', '$venue_address_postal_code', '$venue_address_country', '$venue_address_latitude', '$venue_address_longitude', '$venue_address_localized_address_display', '$venue_address_localized_area_display', '$venue_address_localized_multi_line_address_display', '$venue_resource_uri', '$venue_age_restriction', '$venue_capacity', '$venue_name', '$venue_latitude', '$venue_longitude') ON DUPLICATE KEY UPDATE    
date=CURDATE(),  name_text='$name_text', name_html='$name_html', id='$id', description_text='$description_text', description_html='$description_html', url='$url', vanity_url='$vanity_url', start_local='$start_local', start_timezone='$start_timezone', start_utc='$start_utc', end_local='$end_local', end_timezone='$end_timezone', end_utc='$end_utc', organization_id='$organization_id', created='$created', changed='$changed', capacity='$capacity', capacity_is_custom='$capacity_is_custom', status='$status', currency='$currency', listed='$listed', shareable='$shareable', online_event='$online_event', tx_time_limit='$tx_time_limit', hide_start_date='$hide_start_date', hide_end_date='$hide_end_date', locale='$locale', is_locked='$is_locked', privacy_setting='$privacy_setting', is_series='$is_series', is_series_parent='$is_series_parent', is_reserved_seating='$is_reserved_seating', show_pick_a_seat='$show_pick_a_seat', show_seatmap_thumbnail='$show_seatmap_thumbnail', show_colors_in_seatmap_thumbnail='$show_colors_in_seatmap_thumbnail', source='$source', is_free='$is_free', version='$version', logo_id='$logo_id', organizer_id='$organizer_id', venue_id='$venue_id', category_id='$category_id', subcategory_id='$subcategory_id', format_id='$format_id', resource_uri='$resource_uri', logo_crop_mask_top_left_x='$logo_crop_mask_top_left_x', logo_crop_mask_top_left_y='$logo_crop_mask_top_left_y', logo_crop_mask_width='$logo_crop_mask_width', logo_crop_mask_height='$logo_crop_mask_height', logo_original_url='$logo_original_url', logo_original_width='$logo_original_width', logo_original_height='$logo_original_height', logo_ids='$logo_ids', logo_url='$logo_url', logo_aspect_ratio='$logo_aspect_ratio', logo_edge_color='$logo_edge_color', logo_edge_color_set='$logo_edge_color_set', 
organizer_description_text='$organizer_description_text', organizer_description_html='$organizer_description_html', organizer_long_description_text='$organizer_long_description_text', organizer_long_description_html='$organizer_long_description_html', organizer_logo_crop_mask='$organizer_logo_crop_mask', organizer_logo_original='$organizer_logo_original', organizer_logo_id='$organizer_logo_id', organizer_logo_url='$organizer_logo_url', organizer_logo_aspect_ratio='$organizer_logo_aspect_ratio', organizer_logo_edge_color='$organizer_logo_edge_color', organizer_logo_edge_color_set='$organizer_logo_edge_color_set', organizer_resource_uri='$organizer_resource_uri', organizer_name='$organizer_name', organizer_url='$organizer_url', organizer_vanity_url='$organizer_vanity_url', organizer_num_past_events='$organizer_num_past_events', organizer_num_future_events='$organizer_num_future_events', organizer_twitter='$organizer_twitter', organizer_facebook='$organizer_facebook', venue_address_address_1='$venue_address_address_1', venue_address_address_2='$venue_address_address_2', venue_address_city='$venue_address_city', venue_address_region='$venue_address_region', venue_address_postal_code='$venue_address_postal_code', venue_address_country='$venue_address_country', venue_address_latitude='$venue_address_latitude', venue_address_longitude='$venue_address_longitude', venue_address_localized_address_display='$venue_address_localized_address_display', venue_address_localized_area_display='$venue_address_localized_area_display', venue_address_localized_multi_line_address_display='$venue_address_localized_multi_line_address_display', venue_resource_uri='$venue_resource_uri', venue_age_restriction='$venue_age_restriction', venue_capacity='$venue_capacity', venue_name='$venue_name', venue_latitude='$venue_latitude', venue_longitude='$venue_longitude'";



$sql2 = "INSERT INTO address ( date, organizer_description_text, organizer_description_html, organizer_long_description_text, organizer_long_description_html, start_local, start_timezone, start_utc, end_local, end_timezone, end_utc, organizer_logo_crop_mask, organizer_logo_original, organizer_logo_id, organizer_logo_url, organizer_logo_aspect_ratio, organizer_logo_edge_color, organizer_logo_edge_color_set, organizer_resource_uri, organizer_id, organizer_name, organizer_url, organizer_vanity_url, organizer_num_past_events, organizer_num_future_events, organizer_twitter, organizer_facebook, venue_address_address_1, venue_address_address_2, venue_address_city, venue_address_region, venue_address_postal_code, venue_address_country, venue_address_latitude, venue_address_longitude, venue_address_localized_address_display, venue_address_localized_area_display, venue_address_localized_multi_line_address_display, venue_resource_uri, venue_id, venue_age_restriction, venue_capacity, venue_name, venue_latitude, venue_longitude)
VALUES (CURDATE(),  '$organizer_description_text', '$organizer_description_html', '$organizer_long_description_text', '$organizer_long_description_html', '$start_local', '$start_timezone', '$start_utc', '$end_local', '$end_timezone', '$end_utc',  '$organizer_logo_crop_mask', '$organizer_logo_original', '$organizer_logo_id', '$organizer_logo_url', '$organizer_logo_aspect_ratio', '$organizer_logo_edge_color', '$organizer_logo_edge_color_set', '$organizer_resource_uri', '$organizer_id', '$organizer_name', '$organizer_url', '$organizer_vanity_url', '$organizer_num_past_events', '$organizer_num_future_events', '$organizer_twitter', '$organizer_facebook', '$venue_address_address_1', '$venue_address_address_2', '$venue_address_city', '$venue_address_region', '$venue_address_postal_code', '$venue_address_country', '$venue_address_latitude', '$venue_address_longitude', '$venue_address_localized_address_display', '$venue_address_localized_area_display', '$venue_address_localized_multi_line_address_display', '$venue_resource_uri', '$venue_id', '$venue_age_restriction', '$venue_capacity', '$venue_name', '$venue_latitude', '$venue_longitude') ON DUPLICATE KEY UPDATE    
date=CURDATE(),  organizer_description_text='$organizer_description_text', organizer_description_html='$organizer_description_html', organizer_long_description_text='$organizer_long_description_text', organizer_long_description_html='$organizer_long_description_html', start_local='$start_local', start_timezone='$start_timezone', start_utc='$start_utc', end_local='$end_local', end_timezone='$end_timezone', end_utc='$end_utc', organizer_logo_crop_mask='$organizer_logo_crop_mask', organizer_logo_original='$organizer_logo_original', organizer_logo_id='$organizer_logo_id', organizer_logo_url='$organizer_logo_url', organizer_logo_aspect_ratio='$organizer_logo_aspect_ratio', organizer_logo_edge_color='$organizer_logo_edge_color', organizer_logo_edge_color_set='$organizer_logo_edge_color_set', organizer_resource_uri='$organizer_resource_uri', organizer_id='$organizer_id', organizer_name='$organizer_name', organizer_url='$organizer_url', organizer_vanity_url='$organizer_vanity_url', organizer_num_past_events='$organizer_num_past_events', organizer_num_future_events='$organizer_num_future_events', organizer_twitter='$organizer_twitter', organizer_facebook='$organizer_facebook', venue_address_address_1='$venue_address_address_1', venue_address_address_2='$venue_address_address_2', venue_address_city='$venue_address_city', venue_address_region='$venue_address_region', venue_address_postal_code='$venue_address_postal_code', venue_address_country='$venue_address_country', venue_address_latitude='$venue_address_latitude', venue_address_longitude='$venue_address_longitude', venue_address_localized_address_display='$venue_address_localized_address_display', venue_address_localized_area_display='$venue_address_localized_area_display', venue_address_localized_multi_line_address_display='$venue_address_localized_multi_line_address_display', venue_resource_uri='$venue_resource_uri', venue_id='$venue_id', venue_age_restriction='$venue_age_restriction', venue_capacity='$venue_capacity', venue_name='$venue_name', venue_latitude='$venue_latitude', venue_longitude='$venue_longitude'";

	if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
	    echo "Page saved!";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}  else {
	    echo "Error: " . $table . "<br>" . $conn->error;
	}

$conn->close();

?>
