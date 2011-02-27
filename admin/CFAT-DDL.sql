CREATE TABLE ncaa.`users` (
    userid int(11) NOT NULL auto_increment,
    useremail varchar(50) NOT NULL default '',
    password varchar(50) NOT NULL default '',
    userlevel int(11) NOT NULL default '0',
    paid int(1) NOT NULL default '0' comment '0 = no, 1 = yes',
    supportedcharity varchar(100) NOT NULL default '',
    PRIMARY KEY  (userid)
)