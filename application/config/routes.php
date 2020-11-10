<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home/(:any)'] = 'home/$1';

// Default Route, can use id before to next segment or URL
$route['id/list'] = 'todo';
$route['id/timeline'] = 'home';
$route['id/project'] = 'home';
$route['id/myproject'] = 'home';
$route['id/user'] = 'home';
$route['id/detail'] = 'home/detail';

// API
$route['api/getdata'] = 'api/get';
$route['api/getproject'] = 'api/project';
$route['api/postdata'] = 'api/postTable';
$route['api/getrule'] = 'api/rule';
$route['api/getparticipant'] = 'api/participant';

// process
$route['join/project'] = 'process/join_project';
$route['project/insert'] = 'process/insert_project';
$route['project/delete'] = 'process/delete_project';
$route['participant/insert'] = 'process/insert_participant';
$route['rule/insert'] = 'process/insert_rule';

// Datatables
$route['datatable/table/(:segment)'] = 'datatable/loadtable/$1';

// Access User Scalable
$route['useraccess/project'] = 'access/user_project';
$route['useraccess/position'] = 'access/user_position';

// Dumping
$route['to/dump/(:any)'] = 'process/table_dump/$1';
