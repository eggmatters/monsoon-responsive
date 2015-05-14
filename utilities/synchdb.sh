#!/usr/bin/env bash

DIR=$(pwd)/schemas


fetch() {
  local SCHEMA=$(ls -lt $DIR | awk '{print $9}')
	echo "copying $SCHEMA to db"
	backup
	$(mysql -u wordpress -pwordpress < $SCHEMA) 
}

get() {
	mysqldump -u wordpress -pwordpress wordpress wp_postmeta wp_posts wp_term_relationships wp_terms wp_term_taxonomy > $DIR/wp_db_$(date +%F).sql
}

backup() {
	mysqldump -u wordpress -pwordpress wordpress > $(pwd)/backups/$(whoami)_$(date +%F).db.sql.bak
}

usage() {
 echo "$0 [ copy | push | backup ]"
}

run() {
	echo "parsing $1"
	case "$1" in
		*copy)
			git commit -m "Scripted commit $(date +%F) synching db for fetch" -a
			git pull origin master
			fetch
	    ;;
	  *push)
			git commit -m "Scripted commit $(date +%F) synching db for pull" -a
			git push origin master
	    get
	    ;;
		*backup)
			backup
			;;
	  *)
		  usage
      ;;
	esac
}

run $1

