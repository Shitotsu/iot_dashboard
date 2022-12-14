#!/bin/bash
/sbin/mosquitto_passwd -b /etc/mosquitto/shadows.txt $1 $2
