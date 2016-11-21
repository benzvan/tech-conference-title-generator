#!/usr/bin/env bash
TARGET=$1
cp -r * "${TARGET}"
rm "${TARGET}"/$0
