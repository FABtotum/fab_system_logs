#!/bin/bash

if [ -z "$1" ]; then
    ARCHIVE="/tmp/fabui/log_archive.tar.gz"
else
    ARCHIVE=$1
fi

echo $ARCHIVE

dmesg > /tmp/fabui/dmesg.log
lsmod > /tmp/fabui/lsmod.log
lsusb > /tmp/fabui/lsusb.log

tar -jcf $ARCHIVE /mnt/userdata/settings /mnt/userdata/heads /etc /var/log /tmp/fabui/dmesg.log /tmp/fabui/lsmod.log /tmp/fabui/lsusb.log
chmod 0777 $ARCHIVE