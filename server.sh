#!/usr/bin/env bash

printf "Welcome to Web Development Server Edition\n\n"

if
  cd examples;
then
  php -S 127.0.0.1:8000
else {
  echo "Examples directory does not exists.";
  exit 1;
}
fi
