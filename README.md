# tubes_iot

A brief description of what this project does and who it's for

## How to - SETUP

* Download and Install Laragon : https://laragon.org/download/index.html
* Go To C:\laragon\bin\apache\httpd-X.X.XX-win64-VS16\conf\
* Open httpd.conf and search for <Directory "C:/laragon/www">
* Alter it into these text below

```txt
  <Directory "C:/laragon/www">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks Includes ExecCGI

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Require all granted
    </Directory>

    <Directory "C:/laragon/www/tubes_iot">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
```
* Make sure theres is no "Require all denied" in the httpd.conf.
* If exist, change it to "Require all granted".

## How to - CLONE
* Please clone the git-hub repo into C:\laragon\www directory, otherwise the program can't run properly.

## How to - Connect DB
HOST : williamsuryawijaya.my.id
DB : williams_mp_dashboard
USERNAME : williams_mp_dashboard
PASS : ask me

* Import the Connection.php file each time you need to do something with database on the model.

## File Name Formating
Please follow file name format as follows
* view : kebab-case
* mode : PascalCase
* controller : PascalCase