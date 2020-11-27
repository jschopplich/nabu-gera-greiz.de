#!/bin/bash
host="russel.uberspace.de"
echo $host
echo -n "Enter username: "
read username
ssh -tt $username@$host "\
  cd /var/www/virtual/$username/sites/nabu-gera-greiz.de; \
  git pull; \
  npm i; \
  npm run build; \
  rm -rf storage/cache/nabu-gera-greiz.de; \
"
