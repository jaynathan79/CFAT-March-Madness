CREATE TABLE ncaa.`users` (
    userid int(11) NOT NULL auto_increment,
    useremail varchar(50) NOT NULL default '',
    displayname varchar(50) NOT NULL default '',
    password varchar(50) NOT NULL default '',
    userlevel int(11) NOT NULL default '0',
    paid int(1) NOT NULL default '0' comment '0 = no, 1 = yes',
    supportedcharity varchar(100) NOT NULL default '',
    PRIMARY KEY  (userid)
);


alter table users add (`amtpaid` int(11) NOT NULL DEFAULT 0);

alter table users add (
    address_state varchar(20) NOT NULL DEFAULT '',
    payment_date DATETIME NULL,
    payment_gross DECIMAL(19,4) NOT NULL DEFAULT 0.00,
    first_name VARCHAR(25) NOT NULL DEFAULT '',
    last_name VARCHAR(25) NOT NULL DEFAULT ''
);

alter table users add (`resetpwdnextlogon` INT(1) NOT NULL DEFAULT '0' COMMENT '1 means pwd has been generated and needs to be reset by user at next logon' );
