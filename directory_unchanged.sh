#!/bin/bash

# Build a string of file names that
# should be pruned a find operation
prune=""
for var in "$@";
do
  item="-name $var"
  if [ -n "$prune" ]; then
    item="-o $item"
  fi
  prune="$prune $item"
done
# Print all files found in the current directory
# pruning any file names that were passed as arguments
find . $prune -prune -o -type f -print
