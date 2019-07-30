#!/usr/bin/env sh
set -e;

# Install this hook using next command: `make git-hooks`

if ! make test; then
  echo;
  echo "  Error: Fast tests failed. Double check tests sources, and then repeat your last command.";
  echo "         For skipping - use \"git ... --no-verify\" argument";
  echo;
  exit 1;
fi;
