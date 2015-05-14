#!/usr/bin/env bash

DIR=$(pwd)/schemas

fetch() {
	SCHEMA=$(echo -n $(ls -lt $DIR | awk '{print $9}'))
	echo "copying $DIR/$SCHEMA to db"
	backup
	$(mysql -u wordpress -pwordpress wordpress < $DIR/$SCHEMA) 
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
	case "$1" in
		*copy)
			fetch
	    ;;
	  *push)
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

