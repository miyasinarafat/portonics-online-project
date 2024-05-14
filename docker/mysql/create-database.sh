#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS portonics_online_project;
    GRANT ALL PRIVILEGES ON \`portonics_online_project%\`.* TO '$MYSQL_USER'@'%';
EOSQL
