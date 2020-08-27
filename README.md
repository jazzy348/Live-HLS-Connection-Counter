# Live-HLS-Connection-Counter
A VERY basic way using Redis and PHP to count how many connections you have a HLS / MPeg Dashlive stream. There are probably MUCH better ways of doing this but I found this to be the simpliest and easiest.

This can be used as a load balancer, count the connections on each edge server and have your ingest direct traffic to the least used server, but for now it will just be used for counting connections on a single host.

The setup requires two webservers, one that users connect to and one that serves the HLS files.

The webserver users connect to needs to allow for mod_rewrite otherwise it will not work. Other requirements are PHP 7.x with php-curl, and php-redis
