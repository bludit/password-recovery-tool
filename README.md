# Bludit Password Recovery Tool
This tool allow you to recover the password for the `admin` user.

## How to recover the password
1. Download the file `recovery.php`.
2. Upload to your Bludit installation, on the root folder.
3. Open the file with your browser, for example: `https://example.com/recovery.php`, change the `example.com` for your domain.
4. A new password for the `admin` is generated and displayed on the browser.
5. Log in to the admin panel with the user `admin` and the new password generated.
6. Delete the file `recovery.php` from your Bludit

## [ADVANCED] How to recover the password via the command line
You can execute the php file `recovery.php` via the command line.
```
# Go to the directory where you have installed Bludit
cd /var/html/bludit

# Download the file
curl -o recovery.php https://raw.githubusercontent.com/bludit/password-recovery-tool/master/recovery.php

# Execute the tool
php recovery.php
```

```
Bludit Password Recovery Tool

Username: admin
New password: 80b4092c27471576fbff4fd645328b91

>> Delete this file now, do not keep it on the system <<
```
