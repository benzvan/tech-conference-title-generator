#!/usr/bin/env bash
TARGET=/var/www/hosts/conferencetitle.zvan.net/htdocs/
cp -r * "${TARGET}"
rm "${TARGET}"/$0
