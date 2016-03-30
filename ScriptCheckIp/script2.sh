#!/bin/bash
touch host.txt
touch ip.txt
hostname > host.txt
ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}' > ip.txt

#############################
file_host=host.txt
while read  -r line
do
  hostname=$line
done < "$file_host"

echo "$hostname"
##############################

file_ip=ip.txt
while read -r line
do
  ipname=$line
done < "$file_ip"

echo "$ipname"
#############################

mysql -h 10.16.68.150 -u root -p12345678 iptest << EOF
update save set ip_number='$ipname' where host_name='$hostname' ;
EOF





