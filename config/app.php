<?php

define('ROOT', realpath(__DIR__.'/../'));
const APP_ENV = 'local';

const APP = ROOT.'/app';
const VIEWS = ROOT.'/app/Views';
const CONTROLLERS = ROOT.'/app/Controllers';
const MODELS = ROOT.'/app/Models';
const CONFIG = ROOT.'/config';
const CORE = ROOT.'/core';
const EXT = '.php';
const APPNAME = 'Great Shopaholic';
const SLOGAN = "Let's Build Cool Site";
const LOGS = ROOT.'/logs';
define('DB_CONFIG_FILE', CONFIG.'/db.php');
define('ROUTES', require CONFIG.'/routes'.EXT);

const SESSION_PREFIX = 'shop_';

// Cookie defines
define( 'COOKIE_TIMEOUT', (52*7*60*60) ); //cookies set to a year by default

// current time
if( !defined( 'TIME_NOW' ) ) define( 'TIME_NOW', time() );