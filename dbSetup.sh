#!/bin/bash
#################################################################################################
#                                                                                               #
#       Author: Sobitha Samaranayake                                                            #
#                                                                                               $
#       Purpose: Set base directory for the Basic Framework                                     #
#                                                                                               #
################################################################################################

# prompt the user to enter base directory
tput clear
tput cup 1 10
echo "This script defines the base directory for the application"

tput cup 5 10
echo "Enter Your Netid:"
tput cup 5 30
read netid #read input netid

tput cup 7 10
echo "Enter Directory Name for the Your Application WRT Your html_cs366 Folder:"
tput cup 7 85
echo "/"
tput cup 7 86
read base  #read base directory

sed -i  's,HOME_DIR,'cs366/$netid/$base',g' .htaccess index.php assets/js/script.js


sed -i 's/database_name/cs366-2167_'$netid'/' .config.php

tput cup 10 10
echo "Base directory has been set to $base"

# define database
tput cup 11 10
echo "Databse is set to cs366-2167_$netid"



tput cup 16 10
echo "Enter  password for database user $netid:"
tput cup 16 55
read -s passwd # read password for the  database

sed -i 's/database_user/'$netid'/' .config.php
sed -i 's/database_pwd/'$passwd'/' .config.php

# change file permissions to 644
find ./ -type f -exec chmod 664 {} \;
find ./ -type d -exec chmod 751 {} \;
chmod +x setup.sh setfilepermissions.sh

tput clear
tput cup 5 10
echo "Congratulations! You should be able to use the framework"
tput cup 7 0
