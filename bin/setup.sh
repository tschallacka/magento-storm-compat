#!/usr/bin/env bash
echo Dropping database magento_integration_tests and creating an empty replacement
mysql -u root -proot -e "drop database IF EXISTS magento_integration_tests; create database magento_integration_tests;" &&\
echo Moving to integration directory
cd ../../../../dev/tests/integration &&\
echo Removing tmp folder and contents
rm -rf tmp &&\
echo Running phpunit with the rebuilding of the database setting TESTS_CLEANUP set to enabled
echo This command may repeat a few times, as for some reason race conditions exist that break up the copying process.
../../../vendor/bin/phpunit -c ../../../app/code/Tschallacka/StormCompat/tests/integration/phpunit.xml.clear-database
EXITCODE=$?
if [ $EXITCODE -eq 0 ]; then
    exit
fi
echo Race conditions prevented from setup running normally, retrying
rm -rf tmp &&\
echo Running phpunit with the rebuilding of the database setting TESTS_CLEANUP set to enabled
echo This command may repeat a few times, as for some reason race conditions exist that break up the copying process.
../../../vendor/bin/phpunit -c ../../../app/code/Tschallacka/StormCompat/tests/integration/phpunit.xml.clear-database

EXITCODE=$?
if [ $EXITCODE -eq 0 ]; then
    exit
fi
echo Race conditions prevented from setup running normally, retrying
rm -rf tmp &&\
echo Running phpunit with the rebuilding of the database setting TESTS_CLEANUP set to enabled
echo This command may repeat a few times, as for some reason race conditions exist that break up the copying process.
../../../vendor/bin/phpunit -c ../../../app/code/Tschallacka/StormCompat/tests/integration/phpunit.xml.clear-database

EXITCODE=$?
if [ $EXITCODE -eq 0 ]; then
    exit
fi
echo Race conditions prevented from setup running normally, retrying
rm -rf tmp &&\
echo Running phpunit with the rebuilding of the database setting TESTS_CLEANUP set to enabled
echo This command may repeat a few times, as for some reason race conditions exist that break up the copying process.
../../../vendor/bin/phpunit -c ../../../app/code/Tschallacka/StormCompat/tests/integration/phpunit.xml.clear-database

EXITCODE=$?
if [ $EXITCODE -eq 0 ]; then
    exit
fi
echo Race conditions prevented from setup running normally, retrying
rm -rf tmp &&\
echo Running phpunit with the rebuilding of the database setting TESTS_CLEANUP set to enabled
echo This is the last time trying. If this isn\'t working run the command again
../../../vendor/bin/phpunit -c ../../../app/code/Tschallacka/StormCompat/tests/integration/phpunit.xml.clear-database
