CREATE DATABASE IF NOT EXISTS challengephp;
CREATE DATABASE IF NOT EXISTS challengephp_testing;

grant all privileges on challengephp.* to 'hernan'@'%';
grant all privileges on challengephp_testing.* to 'hernan'@'%';

flush privileges;