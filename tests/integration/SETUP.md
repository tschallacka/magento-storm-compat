## Setup of integration testing.

The integration test needs to be run from the dev/tests/integration directory.
The php unit test needs to be run from this directory where this file resides.
Clear out the tmp folder for best success rates.
When executed from the plugin root the command becomes:

```bash
mysql -u root -proot -e "drop database magento_integration_tests; create database magento_integration_tests;" &&\
cd ../../../../dev/tests/integration &&\ 
rm -rf tmp &&\
../../../vendor/bin/phpunit -c ../../../app/code/BigBridge/ShippingLogic/tests/integration/phpunit.xml.clear-database
```

or use the composer script.

```bash
compser run-script integration_setup
```

*This command needs to be executed from a proper shell the first time when setting the TESTS_CLEANUP to enabled to re-generate the database.
When run from a php storm run configuration it doesn't work properly.*

This command is also stored in composer.json    
Run from the plugin root directory:

```bash
composer run-script integration
```

# setup

Change the username and password and test database name in instal-config-mysql.php  
Change the the plugins that should be disabled in config-global.php  
edit dev/tests/integration/framework/Magento/TestFramework/Application.php

Change `copyGlobalConfigFile()` to

```php
/**
* Copies global configuration file from the tests folder (see TESTS_GLOBAL_CONFIG_FILE)
*
* @return void
*/
private function copyGlobalConfigFile()
{
    $targetFile = $this->_configDir . '/config.php';
    copy($this->globalConfigFile, $targetFile);
    $targetFile = $this->_configDir . '/config.local.php';
    copy($this->globalConfigFile, $targetFile);
}
```

Change `getDbInstance()` to

```php
/**
* Retrieve the database adapter instance.
*
* @return \Magento\TestFramework\Db\AbstractDb
*/
public function getDbInstance()
{
    if (null === $this->_db) {
    
        $installConfig = $this->getInstallConfig();
        $host = $installConfig['db-host'];
        $user = $installConfig['db-user'];
        $password = $installConfig['db-password'];
        $dbName = $installConfig['db-name'];
        
        $this->_db = new Db\Mysql(
            $host,
            $user,
            $password,
            $dbName,
            $this->getTempDir(),
            $this->_shell
        );
    }

    return $this->_db;
}
```
