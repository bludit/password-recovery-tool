# Bludit Password Recovery Tool
With this tool you can recovery the password of the user `admin`.

## How to recovery the password
- Download the file `recovery.php`.
- Upload to your Bludit installation, on the root folder.
- Open the file with your browser, the url is like this `https://example.com/recovery.php`, change the `example.com` for your domain.
- A new password for the `admin` is generated and displayed on the browser.
- Log in to the admin panel with the user `admin` and the new password generated.
- Delete the file `recovery.php` from your Bludit

## [EXPERT] How to recovery the password via the command line
You can execute the php file `recovery.php` via the command line.
```
# go to the directory where you have installed Bludit
cd /var/html/bludit
curl -o recovery.php
php recovery.php

```