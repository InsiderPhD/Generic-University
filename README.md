# Generic University
 Generic University's IT department are excited to release their new tool so students can see all their grades online! Although still under construction some hacker has used Sublist3r and found it despite it being under construction. Thankfully Generic University have a bug bounty program and `*.genericuniversity.ac.uk` is in scope, no one seems to have noticed this under construction tool yet so get out there are find those bugs!

## Vulnerable API
This is a Laravel App which I've used for several demos which is vulnerable to a number of vulnerabilities on the OWASP API top 10. This is not a CTF, the bugs are quite clear and not hidden, however I suspect this will be a useful demo!

### Vulnerabilities
Find out more about the [OWASP API Top 10](https://owasp.org/www-project-api-security/)
- API1:2019 Broken Object Level Authorization
- API2:2019 Broken User Authentication
- API3:2019 Excessive Data Exposure
- API5:2019 Broken Function Level Authorization
- API6:2019 Mass Assignment
- API7:2019 Security Misconfiguration

### Your Goals
1) Find the emails of the administrator
2) Brute force the API to find new endpoints
3) Find out what grades everyone got in a class
4) Edit someone's grade
5) Make an account
6) Access the GraphQL API
7) Change another account's password
8) Login to your account
9) Access admin API
10) Find out what vulnerabilities the IT admins have ignored
11) Make your account an admin
12) Access the admin control panel
13) Fire a blind XSS in the admin control panel and validate with your new admin account
14) Delete everything
15) Restore everything

### Docker **NEW**
Thanks to busk3r, you can setup Generic University using docker. Simply [install Docker](https://www.docker.com) and [follow the commands from the docker page](https://hub.docker.com/r/busk3r/genericuniversity). Thank you!

### Inital Setup
You will need to setup PHP, a webserver and a database suitable for laravel, you can use something like XAMPP on windows, or set it up yourself, [to these requirements](https://laravel.com/docs/7.x/installation#server-requirements). You can google to find manual setup instructions, @kofler86 has contributed a [setup guide for Kali Linux](https://github.com/InsiderPhD/Generic-University/blob/master/KaliSetup.md).

1. Clone `git clone https://github.com/InsiderPhD/Generic-University/`
2. run `composer update`
4. Change the `.env`
5. run `php artisan migrate`
6. run `php artisan db:seed`
