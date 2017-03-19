<?php

use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;

config::setRowGrid(10);
// twitter API KEYS
config::setTwitterKey("Jwbtt6crAGxViZ8axaTlVE3ot");
config::setSecretCustomerTwitterKey("7mwf8cq6j5PUJW6iyVpe5wPa4wzL9ZMrBwgwOv5On5q502l50v");

config::setTokenKey('831265185717506049-MiwqVCGK8s7HT7180893BdXN8ICUryP');
config::setSecretTokenKey('ZlaO9n9t4NV635spJTLhfOty8I0TocyPhCm5OzI82W0RI');

config::setDbHost('localhost');
config::setDbDriver('mysql'); //pgsql- mysql
config::setDbName('twitterapp');
config::setDbPort(3306); // 5432- 3306 
config::setDbUser('root');
config::setDbPassword('');
// Esto solo es necesario en caso de necesitar un socket para la DB
config::setDbUnixSocket(null); ///tmp/mysql.sock

if (config::getDbUnixSocket() !== null) {
  config::setDbDsn(
          config::getDbDriver()
          . ':unix_socket=' . config::getDbUnixSocket()
          . ';dbname=' . config::getDbName()
  );
} else {
  config::setDbDsn(
          config::getDbDriver()
          . ':host=' . config::getDbHost()
          . ';port=' . config::getDbPort()
          . ';dbname=' . config::getDbName()
  );
}

config::setPathAbsolute('C:/xampp/htdocs/twitterApp/');
config::setUrlBase('http://twitterApp.com/twitterApp/web/');

config::setScope('dev'); // prod

if (session::getInstance()->hasDefaultCulture() === false) {
  config::setDefaultCulture('es');
} else {
  config::setDefaultCulture(session::getInstance()->getDefaultCulture());
}

config::setIndexFile('index.php');

config::setFormatTimestamp('Y-m-d H:i:s');

config::setHeaderJson('Content-Type: application/json; charset=utf-8');
config::setHeaderXml('Content-Type: application/xml; charset=utf-8');
config::setHeaderHtml('Content-Type: text/html; charset=utf-8');
config::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
config::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
config::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
config::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

config::setCookieNameRememberMe('mvcSiteRememberMe');
config::setCookieNameSite('mvcSite');
config::setCookiePath('/' . config::getIndexFile());
config::setCookieDomain('http://twitterApp.com/twitterApp/');
config::setCookieTime(3600 * 8); // una hora en segundo 3600 y por 8 serían 8 horas

config::setDefaultModule('default');
config::setDefaultAction('index');

config::setDefaultModuleSecurity('shfSecurity');
config::setDefaultActionSecurity('index');

config::setDefaultModulePermission('shfSecurity');
config::setDefaultActionPermission('noPermission');