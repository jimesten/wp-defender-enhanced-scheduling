<?php
/*
Plugin Name: WP Defender Enhanced Schedule
Plugin URI: http://goodlookmke.com/wp-defender-enhanced-schedule
Description: Adds 2 and 4 hour intervals for malware scanning
Author: Jim Esten, based on feedback from WPMUDEV
Version: 1.0
Author URI: http://goodlookmke.com
*/
// register some new schedules
add_filter( 'cron_schedules', function( $schedules ){
if( ! isset( $schedules['2hourly'] ) ){
$schedules['2hourly'] = array(
'interval' => 2 * HOUR_IN_SECONDS,
'display' => __( 'Two Hourly' ),
);
}
if( ! isset( $schedules['4hourly'] ) ){
$schedules['4hourly'] = array(
'interval' => 4 * HOUR_IN_SECONDS,
'display' => __( 'Four Hourly' ),
);
}
return $schedules;
} );
// custom event interval
add_filter( 'schedule_event', function( $event ){
if( 'scanReportCron' === $event->hook ){
$event->schedule = '4hourly';
$event->interval = 4 * HOUR_IN_SECONDS;
}
return $event;
});
?>