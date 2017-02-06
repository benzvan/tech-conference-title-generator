#!/usr/bin/env bash

SOURCE=./content
BASE=/var/www/hosts
TEST=conferencetitle.zvan.net-beta
PROD=conferencetitle.zvan.net

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
