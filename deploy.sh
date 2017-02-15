#!/usr/bin/env bash

SOURCE=./src/main/webapp
BASE=/var/www/hosts
TEST=conferencetitle.zvan.net-beta/htdocs
PROD=conferencetitle.zvan.net/htdocs

git pull --rebase
UPDATE="$(git log | head -1)"
echo "Update version:  ${UPDATE}"

if [ "$1" == pr ]; then
  echo "Production!"
  rsync -av "${SOURCE}"/ "${BASE}"/"${PROD}"/
else
  echo "Testing!"
  echo "For production use: '$0 pr'"
  rsync -av "${SOURCE}"/ "${BASE}"/"${TEST}"/
fi
