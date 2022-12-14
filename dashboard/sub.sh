#!/bin/bash
/sbin/mosquitto_sub -h localhost -t /$1 -u $2 -p $3
