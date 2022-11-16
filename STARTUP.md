# PHP Login Site Installation/Startup instructions

### Thank you for your interest!

## This guide assumes you are using Debian 11 Linux to run and serve all components of the site.

It is not necessary to run any of the following commands as root; only a user with sudo permissions is required.
First things first, let's do a good old-fashioned system upgrade:
- sudo apt upgrade

We'll begin by installing some packages.
- $: sudo apt install curl
- $: sudo apt install nginx
- $: sudo apt install php7.4
- $: sudo apt install php7.4-fpm
- $: sudo apt install php7.4-xml
- $: sudo apt install php7.4-gd
- $: sudo apt install php7.4-curl
- $: sudo apt install php7.4-mysql
- $: sudo apt install php7.4-gnupg

Clone the repository from GitHub into the user's home directory.
- $: cd ~
- $: git clone https://github.com/adamseelye/php-basic-login

Move the folder into /var/www/, change folder ownership.
- $: sudo mv ~/php-basic-login /var/www/
- $: sudo chown -R USER:USER /var/www/php-basic-login

Start nginx, enable on boot:
- $: sudo systemctl enable nginx
- $: sudo systemctl start nginx

Test server connectivity in a browser. If installed locally, http://localhost:80 should work.
(If set up with default settings). If everything goes well, you should see "Welcome to nginx!".

Install MySQL:
- $: sudo apt install gnupg
- $: mkdir -p ~/sources/mysql && cd ~/sources/mysql
- $: wget https://dev.mysql.com/get/mysql-apt-config_0.8.23-1_all.deb
- $: sudo dpkg -i mysql-apt-config*
- $: sudo apt update
- $: sudo apt install mysql-server
- $: mysql_secure_installation

Connect to MySQL instance as root to create a user and grant permissions to database:
- $: mysql -u root -p
- ** To connect to a remote host, use -h option: mysql -u root -p -h IPADDRESS

- mysql> CREATE USER 'USER'@'IPADDRESS' IDENTIFIED BY 'PASSWORD';
- ** substitute with your own credentials but be sure to include single quotes
- mysql> GRANT ALL ON php-basic-login.* TO 'USER'@'IPADDRESS';
- mysql> FLUSH PRIVILEGES;
- mysql> exit
- $: mysql -u USER -p
- mysql> SHOW DATABASES;
- mysql> exit

The server now has database access.
We can create the database and table we need for the site. Refer to the "php-basic-login.sql" file in this repository.
One may run the commands on the command line or execute the file in your favorite MySQL GUI.

Now is time to configure nginx.
There are various settings to configure to make the server more secure; however we will only be focusing
on what is required to get this site working. It is not recommended to run this configuration in a 
production environment. These instructions use VIM but any text editor may be used.

Switching to root will save us some time:
- $: sudo su
- #: cd /etc/nginx
- #: vim nginx.conf

Under the section "Virtual Host Configs", add the line
- include /etc/nginx/sites-enabled/php-basic-login

Add the site configuration:
- #: cd /etc/nginx/sites-available
- #: cp /var/www/php-basic-login/php-basic-login.nginx .
- #: mv php-basic-login.nginx php-basic-login
- #: cd /etc/nginx/sites-enabled
- #: ln -s /etc/nginx/sites-available/php-basic-login /etc/nginx/sites-enabled/php-basic-login

And that should be it!
To test, first navigate to the site in your favorite web browser. Click on the "Sign Up" link.
Enter all relevant information and keep in mind that only valid email address formats may be used.
Once entered, click submit then you'll see a Success message. Click on the "Log In" link, supply
the information, and click Submit. You'll then see a welcome message !
Time to customize!
