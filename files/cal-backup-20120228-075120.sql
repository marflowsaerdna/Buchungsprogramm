DROP TABLE wvf_categories;

CREATE TABLE `wvf_categories` (
  `category_id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(40) NOT NULL default '',
  `sequence` int(2) NOT NULL default '1',
  `rpeat` tinyint(1) unsigned NOT NULL default '0',
  `public` tinyint(1) unsigned NOT NULL default '1',
  `color` varchar(10) default NULL,
  `background` varchar(10) default NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO wvf_categories VALUES("1","Holiday","2","4","1","","","0");
INSERT INTO wvf_categories VALUES("0","Bootsausfahrt","0","0","1","","","0");
INSERT INTO wvf_categories VALUES("2","Reminder","1","0","1","","","0");
INSERT INTO wvf_categories VALUES("9","Arbeitseinsatz","0","0","1","#000000","#FFFFFF","-1");

DROP TABLE wvf_event_users;

CREATE TABLE `wvf_event_users` (
  `event_id` int(11) default NULL,
  `event_date` date default NULL,
  `user_id` int(11) default NULL,
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO wvf_event_users VALUES("143","0000-00-00","13");
INSERT INTO wvf_event_users VALUES("153","2012-02-15","13");
INSERT INTO wvf_event_users VALUES("53","2011-12-06","9");
INSERT INTO wvf_event_users VALUES("113","2012-01-09","10");
INSERT INTO wvf_event_users VALUES("37","2011-11-30","7");
INSERT INTO wvf_event_users VALUES("37","0000-00-00","5");
INSERT INTO wvf_event_users VALUES("37","2011-11-30","8");
INSERT INTO wvf_event_users VALUES("37","2011-11-30","9");
INSERT INTO wvf_event_users VALUES("53","2011-12-06","4");
INSERT INTO wvf_event_users VALUES("46","0000-00-00","5");
INSERT INTO wvf_event_users VALUES("56","2011-12-15","9");
INSERT INTO wvf_event_users VALUES("58","2011-12-20","8");
INSERT INTO wvf_event_users VALUES("59","2011-12-20","5");
INSERT INTO wvf_event_users VALUES("59","2011-12-20","10");
INSERT INTO wvf_event_users VALUES("57","2011-12-20","4");
INSERT INTO wvf_event_users VALUES("104","2011-12-09","9");
INSERT INTO wvf_event_users VALUES("56","0000-00-00","5");
INSERT INTO wvf_event_users VALUES("116","2012-01-07","10");
INSERT INTO wvf_event_users VALUES("116","2012-01-07","5");
INSERT INTO wvf_event_users VALUES("116","2012-01-07","8");
INSERT INTO wvf_event_users VALUES("113","2012-01-09","7");
INSERT INTO wvf_event_users VALUES("118","2012-01-05","11");
INSERT INTO wvf_event_users VALUES("118","2012-01-05","8");
INSERT INTO wvf_event_users VALUES("151","2012-02-22","14");
INSERT INTO wvf_event_users VALUES("151","2012-02-22","14");
INSERT INTO wvf_event_users VALUES("149","0000-00-00","3");
INSERT INTO wvf_event_users VALUES("152","2012-02-29","13");
INSERT INTO wvf_event_users VALUES("146","2012-02-09","8");
INSERT INTO wvf_event_users VALUES("152","2012-02-29","12");
INSERT INTO wvf_event_users VALUES("152","2012-02-29","8");
INSERT INTO wvf_event_users VALUES("146","2012-02-09","7");
INSERT INTO wvf_event_users VALUES("144","0000-00-00","3");
INSERT INTO wvf_event_users VALUES("135","0000-00-00","5");
INSERT INTO wvf_event_users VALUES("135","2012-01-04","11");
INSERT INTO wvf_event_users VALUES("135","2012-01-04","3");
INSERT INTO wvf_event_users VALUES("135","2012-01-04","8");
INSERT INTO wvf_event_users VALUES("146","2012-02-09","12");
INSERT INTO wvf_event_users VALUES("153","2012-02-15","12");
INSERT INTO wvf_event_users VALUES("104","0000-00-00","3");
INSERT INTO wvf_event_users VALUES("143","2012-02-24","3");
INSERT INTO wvf_event_users VALUES("155","2012-02-26","11");
INSERT INTO wvf_event_users VALUES("140","2012-01-18","11");
INSERT INTO wvf_event_users VALUES("139","2012-01-18","13");
INSERT INTO wvf_event_users VALUES("136","2012-01-25","5");
INSERT INTO wvf_event_users VALUES("136","2012-01-25","12");
INSERT INTO wvf_event_users VALUES("129","0000-00-00","5");
INSERT INTO wvf_event_users VALUES("122","2011-12-16","8");
INSERT INTO wvf_event_users VALUES("132","0000-00-00","3");
INSERT INTO wvf_event_users VALUES("134","2012-01-03","13");
INSERT INTO wvf_event_users VALUES("155","2012-02-26","13");
INSERT INTO wvf_event_users VALUES("124","2012-01-13","9");
INSERT INTO wvf_event_users VALUES("124","2012-01-13","11");
INSERT INTO wvf_event_users VALUES("126","2012-01-12","13");
INSERT INTO wvf_event_users VALUES("126","2012-01-12","8");
INSERT INTO wvf_event_users VALUES("138","2012-01-20","12");
INSERT INTO wvf_event_users VALUES("129","2012-01-11","13");
INSERT INTO wvf_event_users VALUES("129","2012-01-11","8");

DROP TABLE wvf_events;

CREATE TABLE `wvf_events` (
  `event_id` int(8) unsigned NOT NULL auto_increment,
  `title` varchar(64) default NULL,
  `category_id` int(2) NOT NULL default '0',
  `resource_id` int(4) unsigned NOT NULL default '1',
  `description` text,
  `venue` varchar(64) default NULL,
  `owner_id` int(6) unsigned default NULL,
  `editor` varchar(32) NOT NULL default '',
  `private` tinyint(1) unsigned NOT NULL default '0',
  `s_date` date default NULL,
  `e_date` date NOT NULL default '9999-00-00',
  `x_dates` text,
  `s_time` time default NULL,
  `e_time` time NOT NULL default '99:00:00',
  `r_type` tinyint(1) unsigned NOT NULL default '0',
  `r_interval` tinyint(1) unsigned NOT NULL default '0',
  `r_period` tinyint(1) unsigned NOT NULL default '0',
  `r_until` date NOT NULL default '9999-00-00',
  `notify` tinyint(1) NOT NULL default '-1',
  `not_mail` varchar(255) default NULL,
  `a_date` date NOT NULL default '9999-00-00',
  `m_date` date NOT NULL default '9999-00-00',
  `status` tinyint(1) NOT NULL default '0',
  `e_cost` decimal(11,0) default NULL,
  `free` binary(1) default '0',
  PRIMARY KEY  (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

INSERT INTO wvf_events VALUES("1","MeineErsteReservierung","0","1","","","2","admin","1","2011-11-17","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","wolfram.andreas@freenet.de","2011-11-11","2011-11-30","-1","","0");
INSERT INTO wvf_events VALUES("2","MeineZweiteReservierung","0","1","","","2","","0","2011-11-17","9999-01-01","","12:00:00","18:00:00","0","0","0","9999-01-01","-1","wolfram.andreas@freenet.de","2011-11-11","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("3","Ausleihe","0","1","","","2","","0","2011-11-17","9999-01-01","","18:00:00","20:00:00","0","0","0","9999-01-01","-1","wolfram.andreas@freenet.de","2011-11-11","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("4","Ausflug","0","1","","","2","","0","2011-11-22","2011-11-24","","08:00:00","22:00:00","0","0","0","9999-01-01","-1","wolfram.andreas@freenet.de","2011-11-11","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("0","Reformation Day","2","0","","","2","","0","2012-10-31","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-11-11","2011-11-30","-1","","0");
INSERT INTO wvf_events VALUES("23","Sonntagsausflug","0","1","","","3","AndreasW","1","2011-11-29","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-24","2011-12-03","0","","0");
INSERT INTO wvf_events VALUES("24","Mittwochsregatta","0","1","","","3","","0","2011-11-30","9999-01-01","","09:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("25","Mittwochsregatta","0","1","","","3","","0","2011-11-30","9999-01-01","","09:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("26","Mittwochsregatta","0","1","","","3","","0","2011-11-30","9999-01-01","","09:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("27","Mittwochsregatta","0","2","","","3","AndreasW","0","2011-11-30","9999-01-01","","09:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","0","","0");
INSERT INTO wvf_events VALUES("28","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("29","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("30","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("31","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("32","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("33","Dickschifftermin","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","-1","","0");
INSERT INTO wvf_events VALUES("34","Dickschifftermin","0","3","","","3","AndreasW","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-25","2011-11-25","0","","0");
INSERT INTO wvf_events VALUES("35","Test725_725","0","1","","","1","Ã¶ffentliche Ansicht","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1"," ","2011-11-25","2011-11-29","-1","","0");
INSERT INTO wvf_events VALUES("36","Regatta","0","4","Dies ist ein Kommentar.","","3","AndreasW","0","2011-11-30","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-29","2011-11-29","-1","","0");
INSERT INTO wvf_events VALUES("37","Familienausfahrt","0","1","","","3","AndreasW","0","2011-11-30","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-29","2011-12-08","0","","0");
INSERT INTO wvf_events VALUES("38","Paralleltermin","0","3","","","3","","0","2011-11-30","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-11-30","2011-11-30","-1","","0");
INSERT INTO wvf_events VALUES("39","Neuer Titel von mir gemacht","0","1","","","3","","0","2011-11-30","9999-01-01","","12:00:00","18:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-01","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("40","Ein anderes Schiff","0","4","","","3","","0","2011-12-05","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-03","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("41","Dickschifftermin","0","3","sehr windig","","3","AndreasW","0","2011-12-06","9999-01-01","","13:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-03","2011-12-03","-1","","0");
INSERT INTO wvf_events VALUES("42","skldfjÃ¶aldjflksd","0","3","","","3","AndreasW","0","2011-12-06","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-03","2011-12-03","-1","","0");
INSERT INTO wvf_events VALUES("43","khjkhhkjhkjhj","0","1","","","1","Ã¶ffentliche Ansicht","0","2011-12-06","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-03","2011-12-05","-1","","0");
INSERT INTO wvf_events VALUES("44","xcfasdfasdfsd","0","2","","","3","","0","2011-12-05","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-03","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("45","Dickschifftermin","0","3","","","3","","0","2011-12-07","9999-01-01","","09:00:00","18:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-04","2011-12-04","-1","","0");
INSERT INTO wvf_events VALUES("46","Dickschifftermin","0","1","","","3","","0","2011-12-07","9999-01-01","","09:00:00","18:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-04","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("47","BlaBla","0","3","","","3","AndreasW","0","2011-12-13","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-04","2011-12-04","-1","","0");
INSERT INTO wvf_events VALUES("48","BlaBla","0","3","","","3","AndreasW","0","2011-12-13","9999-01-01","","12:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-04","2011-12-04","0","","0");
INSERT INTO wvf_events VALUES("49","ZyklischerTermin","0","3","","","3","","0","2011-12-14","9999-01-01","","12:00:00","17:00:00","1","1","2","2011-12-28","-1","wolfram.andreas2@freenet.de","2011-12-04","2011-12-28","-1","","0");
INSERT INTO wvf_events VALUES("50","Donnerstagstermin","0","3","","","5","","0","2011-12-08","9999-01-01","","12:00:00","18:00:00","0","0","0","9999-01-01","-1","stefan.leben@zf.com","2011-12-05","2011-12-05","-1","","0");
INSERT INTO wvf_events VALUES("51","JedenMontagDesMonats","0","1","","","5","","0","2011-12-08","9999-01-01","","00:00:00","23:59:00","2","1","1","2012-02-29","-1","stefan.leben@zf.com","2011-12-05","2011-12-28","-1","","0");
INSERT INTO wvf_events VALUES("52","Jeden2MontagDesMonats","0","1","","","5","","0","2012-01-02","9999-01-01","","00:00:00","23:59:00","2","2","1","2012-02-29","-1","stefan.leben@zf.com","2011-12-05","2011-12-28","-1","","0");
INSERT INTO wvf_events VALUES("53","Regatta in Immenstaad","0","1","","","5","StefanL","0","2011-12-06","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","stefan.leben@zf.com","2011-12-05","2011-12-05","0","","0");
INSERT INTO wvf_events VALUES("54","Laserfahrt","0","2","","","4","","0","2011-12-12","9999-01-01","","12:00:00","14:00:00","0","0","0","9999-01-01","-1","hans.franz@email.de","2011-12-06","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("56","Test mit Eventtype","0","1","","","3","","0","2011-12-15","9999-01-01","","13:00:00","17:00:00","0","0","0","9999-01-01","-1","wolfram.andreas2@freenet.de","2011-12-15","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("57","Zeittest","0","1","","","3","AndreasW","0","2011-12-20","9999-01-01","","13:15:00","16:00:00","0","0","0","9999-01-01","-1","andreas.wolfram@weisserhai.net16.net","2011-12-15","2011-12-15","0","","0");
INSERT INTO wvf_events VALUES("58","ZweiTermine an einem Tag","0","1","","","3","","0","2011-12-20","9999-01-01","","09:00:00","12:00:00","0","0","0","9999-01-01","-1","andreas.wolfram@weisserhai.net16.net","2011-12-15","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("59","Termin am gleichen Tag, anderes Schiff","0","4","","","3","AndreasW","0","2011-12-20","9999-01-01","","03:00:00","20:00:00","0","0","0","9999-01-01","-1","andreas.wolfram@weisserhai.net16.net","2011-12-15","2012-01-01","0","","0");
INSERT INTO wvf_events VALUES("102","Pfingstmontag","1","0","","","2","","0","2012-05-28","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("101","Fronleichnam","1","0","","","2","","0","2012-06-07","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("100","Silvester","2","0","","","2","","0","2012-12-31","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("85","Tag der Arbeit","1","0","","","2","","0","2012-05-01","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("86","Ostersonntag","1","0","","","2","","0","2012-04-08","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("87","1. Advent","2","0","","","2","","0","2012-12-02","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("88","Allerheiligen","1","1","","","2","admin","0","2011-11-01","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-19","2011-12-28","0","","0");
INSERT INTO wvf_events VALUES("89","1. Weihnachtstag","1","1","","","2","admin","0","2011-12-25","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-19","2011-12-28","0","","0");
INSERT INTO wvf_events VALUES("90","Pfingstsonntag","1","0","","","2","","0","2012-05-27","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("91","Karfreitag","1","0","","","2","","0","2012-04-06","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("92","Christi Himmelfahrt","1","0","","","2","","0","2012-05-17","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("93","Neujahr","1","0","","","2","admin","0","2011-01-01","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-19","2011-12-27","0","","0");
INSERT INTO wvf_events VALUES("94","Heiligabend","1","1","not an official holiday","","2","admin","0","2011-12-24","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-19","2011-12-28","0","","0");
INSERT INTO wvf_events VALUES("95","Tag der Deutschen Einheit","1","0","","","2","","0","2012-10-03","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("96","Heilige Drei Könige","1","1","","","2","admin","0","2012-01-06","9999-00-00","","00:00:00","23:59:00","1","1","4","9999-00-00","-1","admin@weisserhai.net16.net","2011-12-19","2012-01-15","0","","0");
INSERT INTO wvf_events VALUES("97","2. Weihnachtstag","1","0","","","2","","0","2011-12-26","9999-01-01","","00:00:00","23:59:00","1","1","4","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("103","Test","0","1","","","3","","0","2011-12-20","9999-01-01","","18:00:00","22:00:00","0","0","0","9999-01-01","-1","andreas.wolfram@weisserhai.net16.net","2011-12-20","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("99","Ostermontag","1","0","","","2","","0","2012-04-09","9999-01-01","","00:00:00","23:59:00","0","0","0","9999-01-01","-1","","2011-12-19","2011-12-19","0","","0");
INSERT INTO wvf_events VALUES("104","Mit KAtegorie","0","1","","","2","","0","2011-12-09","9999-01-01","","10:00:00","18:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-26","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("105","WVF Hauptversammlung","0","1","","","2","admin","0","2012-03-10","9999-01-01","","20:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-27","2011-12-28","-1","","0");
INSERT INTO wvf_events VALUES("106","WVF Hauptversammlung","2","1","","","2","","0","2012-03-10","9999-01-01","","20:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("107","Ansegeln","2","1","","","2","","0","2012-05-27","9999-01-01","","12:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("108","Stadtmeisterschaft FN","2","1","","","2","","0","2012-06-06","9999-01-01","","19:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("109","Seehasenkorso","2","1","","","2","","0","2012-07-14","9999-01-01","","17:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("110","Clubregatta","2","1","","","2","","0","2012-07-21","9999-01-01","","13:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("111","Absegeln","2","1","","","2","","0","2012-09-15","9999-01-01","","10:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("112","Nikolausfeier","2","1","","","2","","0","2012-12-08","9999-01-01","","19:00:00","23:00:00","0","0","0","9999-01-01","-1","admin@weisserhai.net16.net","2011-12-28","9999-01-01","0","","0");
INSERT INTO wvf_events VALUES("113","DerErste2012","0","1","","","3","AndreasW","0","2012-01-09","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-02","2012-01-15","0","","0");
INSERT INTO wvf_events VALUES("114","DerZweite2012","0","4","","","2","admin","0","2012-01-03","2012-01-07",";2012-01-04","18:00:00","22:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-02","2012-01-15","-1","","0");
INSERT INTO wvf_events VALUES("115","Dreikönigsfahrt","0","1","","","2","admin","0","2012-01-14","2012-01-15",";2012-01-07","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-02","2012-01-15","-1","","0");
INSERT INTO wvf_events VALUES("116","Dreikönigsfahrt","0","1","","","2","admin","1","2012-01-07","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-02","2012-01-08","0","31","0");
INSERT INTO wvf_events VALUES("118","Test2","0","1","","","3","AndreasW","0","2012-01-05","9999-00-00","","08:00:00","18:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-04","2012-01-04","0","","0");
INSERT INTO wvf_events VALUES("119","Dreikönigsfahrt","0","1","","","2","admin","0","2012-01-06","2012-01-08","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-08","2012-01-08","-1","","0");
INSERT INTO wvf_events VALUES("120","Ein Termin in der Zukunft","0","1","","","3","AndreasW","0","2012-01-13","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","-1","","0");
INSERT INTO wvf_events VALUES("121","Ein Termin in der Zukunft","0","1","","","3","","0","2012-01-13","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","-1","","0");
INSERT INTO wvf_events VALUES("122","alsdjfgklasjdgkljd","0","1","","","2","admin","0","2011-12-16","9999-00-00","","05:00:00","13:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-15","0","","0");
INSERT INTO wvf_events VALUES("123","Fehler1","0","1","","","3","","0","2012-01-20","9999-00-00","","10:00:00","17:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","-1","","0");
INSERT INTO wvf_events VALUES("124","Test3","0","4","","","3","AndreasW","0","2012-01-13","9999-00-00","","09:00:00","17:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","0","","0");
INSERT INTO wvf_events VALUES("125","Test5","0","1","","","3","","0","2012-01-19","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","-1","","0");
INSERT INTO wvf_events VALUES("126","Test6","0","1","","","3","AndreasW","0","2012-01-12","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","0","","0");
INSERT INTO wvf_events VALUES("127","Test7","0","1","","","3","","0","2012-01-26","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","-1","","0");
INSERT INTO wvf_events VALUES("128","Test7","0","1","","","3","AndreasW","0","2012-01-18","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-15","-1","","0");
INSERT INTO wvf_events VALUES("129","Test7","0","1","","","3","AndreasW","0","2012-01-11","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-09","0","","0");
INSERT INTO wvf_events VALUES("130","Test8","0","1","","","0","","0","2012-01-19","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-09","2012-01-16","0","","f");
INSERT INTO wvf_events VALUES("131","Test8","0","1","","","2","","0","2012-01-27","2012-01-29","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-01-10","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("132","Template","0","1","","","2","","0","2012-01-26","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-01-10","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("133","Test9","0","1","","","3","AndreasW","0","2012-01-02","9999-00-00","","03:00:00","07:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-10","2012-01-11","0","","0");
INSERT INTO wvf_events VALUES("134","Test10","0","1","","","3","AndreasW","0","2012-01-03","2012-01-04","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-10","2012-01-11","0","","0");
INSERT INTO wvf_events VALUES("135","DerZweite2012","0","4","","","2","","0","2012-01-04","9999-00-00","","18:00:00","22:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-11","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("136","Test11","0","1","","","2","admin","0","2012-01-25","9999-00-00","","01:00:00","23:45:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-01-11","2012-01-25","0","","1");
INSERT INTO wvf_events VALUES("137","ghkjgjkgjkgj","0","1","","","3","","0","2011-12-08","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-15","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("138","Übernahmetest","0","1","","","5","5","0","2012-01-20","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-01-17","2012-01-19","0","","0");
INSERT INTO wvf_events VALUES("139","Uebernahmetest","0","1","","","0","","0","2012-01-18","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","stefan.leben@zf.com","2012-01-19","2012-01-19","0","","f");
INSERT INTO wvf_events VALUES("140","TestÜbernahme","0","1","","","3","AndreasW","0","2012-01-18","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","stefan.leben@zf.com","2012-01-19","2012-01-19","0","","1");
INSERT INTO wvf_events VALUES("141","Seehasenkorso","0","1","","","3","AndreasW","0","2012-01-31","9999-00-00","","13:00:00","18:00:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-01-19","2012-02-06","0","","0");
INSERT INTO wvf_events VALUES("142","uitiutuziuzt","0","1","","","2","admin","0","2012-01-23","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-01-25","2012-01-25","0","","1");
INSERT INTO wvf_events VALUES("143","Einwassern","0","4","wer hilft mit ?","","7","","0","2012-02-24","9999-00-00","","10:00:00","14:00:00","0","0","0","9999-00-00","-1","rkhjakob@web.de","2012-01-30","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("144","Einwassern Lucky Ducky Arbeitstermin","0","4","Es werden vier Leute zum Einwassern benötigt.<br />Bitte eintragen.","","7","AndreasW","0","2012-01-27","9999-00-00","","08:00:00","12:00:00","0","0","0","9999-00-00","-1","rkhjakob@web.de","2012-01-22","2012-01-31","0","","0");
INSERT INTO wvf_events VALUES("145","asdasdfsadf","0","1","","","13","","0","2012-02-15","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","U.Lenk@gmx.de","2012-02-03","2012-02-03","-1","","0");
INSERT INTO wvf_events VALUES("146","TestenObDasLoeschengeht","0","1","","","3","AndreasW","0","2012-02-09","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-06","2012-02-16","0","","0");
INSERT INTO wvf_events VALUES("147","NeuerTerminMitLöschen","0","1","","","3","","0","2012-02-16","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-08","2012-02-08","-1","","0");
INSERT INTO wvf_events VALUES("148","Neu","0","1","","","3","AndreasW","0","2012-02-16","9999-00-00","","07:00:00","12:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-08","2012-02-15","0","","0");
INSERT INTO wvf_events VALUES("149","Arbeitseinsatz Unterwasserschiff schleifen","0","1","","","7","","0","2012-02-17","9999-00-00","","12:00:00","99:00:00","0","0","0","9999-00-00","-1","rkhjakob@web.de","2012-02-14","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("150","Regatta","0","1","","","2","","0","2012-02-23","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-02-14","9999-00-00","0","","1");
INSERT INTO wvf_events VALUES("151","Es fahren Gäste mit","0","1","","","3","admin","1","2012-02-22","9999-00-00","","09:00:00","17:00:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-14","2012-02-18","0","","1");
INSERT INTO wvf_events VALUES("152","TestFür Übernahme","0","1","","","3","AndreasW","0","2012-02-29","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","admin@weisserhai.net16.net","2012-02-15","2012-02-15","0","","0");
INSERT INTO wvf_events VALUES("153","Test","0","1","","","3","AndreasW","0","2012-02-15","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-16","2012-02-16","0","","0");
INSERT INTO wvf_events VALUES("154","Titel","0","1","","","3","","0","2012-02-28","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-16","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("155","TestNeu","0","1","","","3","","0","2012-02-26","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-18","9999-00-00","0","","0");
INSERT INTO wvf_events VALUES("156","Osterausfahrt mit Osterhase","0","1","","","9","","0","2012-04-08","2012-04-09","","10:00:00","18:00:00","0","0","0","9999-00-00","-1","petra.feucht@t-online.de","2012-02-21","9999-00-00","0","","1");
INSERT INTO wvf_events VALUES("161","LöschenTest","0","1","","","3","","0","2012-03-02","9999-00-00","","00:00:00","23:59:00","0","0","0","9999-00-00","-1","andreas.wolfram@weisserhai.net16.net","2012-02-21","9999-00-00","0","","0");

DROP TABLE wvf_resources;

CREATE TABLE `wvf_resources` (
  `resource_id` int(4) unsigned NOT NULL auto_increment,
  `name` varchar(40) NOT NULL default '',
  `sequence` int(2) unsigned NOT NULL default '1',
  `teamsize_min` int(11) NOT NULL,
  `teamsize_max` int(11) NOT NULL,
  `rpeat` tinyint(1) unsigned NOT NULL default '0',
  `public` tinyint(1) unsigned NOT NULL default '1',
  `color` varchar(10) default NULL,
  `background` varchar(10) default NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`resource_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO wvf_resources VALUES("1","Weisser Hai","0","2","6","0","1","#000000","#FF9000","0");
INSERT INTO wvf_resources VALUES("2","Laser","2","1","1","0","1","#000000","#5555FF","0");
INSERT INTO wvf_resources VALUES("3","Dickschiff","0","2","8","0","1","#009900","#AAAAAA","-1");
INSERT INTO wvf_resources VALUES("4","Lucky Ducky","1","2","6","0","1","#FF0000","#FFD9A8","0");
INSERT INTO wvf_resources VALUES("5","Feiertag","0","0","0","4","1","#000000","#FFFFFF","-1");
INSERT INTO wvf_resources VALUES("6","MeinSchiff","0","1","3","0","1","#0000CC","#FFFFFF","-1");
INSERT INTO wvf_resources VALUES("0","keine Resource","0","0","0","0","1","","","-1");

DROP TABLE wvf_users;

CREATE TABLE `wvf_users` (
  `user_id` int(6) unsigned NOT NULL auto_increment,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `familyname` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `temp_password` varchar(32) default NULL,
  `email` varchar(64) NOT NULL default '',
  `sedit` tinyint(1) unsigned NOT NULL default '0',
  `privs` tinyint(1) unsigned NOT NULL default '0',
  `login_0` date NOT NULL default '9999-00-00',
  `login_1` date NOT NULL default '9999-00-00',
  `login_cnt` int(8) NOT NULL default '0',
  `language` varchar(32) default NULL,
  `color` varchar(10) default NULL,
  `status` enum('active','deleted') NOT NULL default 'active',
  `BSP_date` date default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO wvf_users VALUES("1","WVF intern","","","","","","","0","1","9999-01-01","9999-01-01","0","deutsch","","active","");
INSERT INTO wvf_users VALUES("2","admin","21232f297a57a5a743894a0e4a801fc3","Administrator","","","","admin@weisserhai.net16.net","1","3","2011-11-11","2012-02-28","180","deutsch","#FFBBBB","active","");
INSERT INTO wvf_users VALUES("3","AndreasW","fc9417223b29f7abec802785c5222883","Andreas","Wolfram","01736209231","10e2549df8717692ace37c2bb78989a4","andreas.wolfram@weisserhai.net16.net","0","2","2011-11-14","2012-02-26","182","deutsch","#C0E0D0","active","2009-02-20");
INSERT INTO wvf_users VALUES("4","HansF","f2a0ffe83ec8d44f2be4b624b0f47dde","Hans","Franz","0815 4711","","hans.franz@email.de","0","2","2011-12-06","2011-12-07","4","deutsch","#BBFFBB","deleted","");
INSERT INTO wvf_users VALUES("5","StefanL","2e970e822e1a8834203d06abb60f59ec","Stefan","Leben","7541 954984","","stefan.leben@zf.com","0","2","2011-11-24","2012-02-20","25","deutsch","#BBFFBB","active","2011-02-01");
INSERT INTO wvf_users VALUES("6","GudulaD","69bbaa3e1fbe6ab4dc878a12ff6cf075","Gudula","Dieckmann","000000000000","","G.Dieckmann@gmx.de","0","2","2012-02-19","2012-02-28","5","deutsch","#BBFFBB","active","");
INSERT INTO wvf_users VALUES("7","RalfJ","3cca634013591eb51173fb6207572e37","Ralf","Jakob","00000","","rkhjakob@web.de","0","3","2012-01-30","2012-02-14","3","deutsch","#BBFFBB","active","");
INSERT INTO wvf_users VALUES("8","HeidiG","3e41d67d5461196c3e784fb6549f7763","Heidi","Galle","017624758419","","heidi.galle@gmx.de","0","2","2011-12-06","2012-01-05","3","deutsch","#BBFFBB","active","");
INSERT INTO wvf_users VALUES("9","PetraF","6ad61cf51456e20a2b6d8db294314de8","Petra","Feucht","01736536535","","petra.feucht@t-online.de","0","3","2011-12-06","2011-12-06","1","deutsch","#FF77FF","active","");
INSERT INTO wvf_users VALUES("10","PhillipR","156026b915cc509747f78f749fdd0005","Phillip","Ries","","","Phillipr@email.de","0","2","9999-01-01","9999-01-01","0","deutsch","#BBFFBB","active","");
INSERT INTO wvf_users VALUES("11","OliverH","97cd6411ce7d4adb6ba0653e615fb7e8","Oliver","Haller","017617900897","","oliver.haller@t-online.de","1","3","9999-00-00","9999-00-00","0","deutsch","#BBFFBB","active","");
INSERT INTO wvf_users VALUES("12","NikolJ","4b9fde484bd35d239e876a5c1e238960","Nikol","Just","07544 742218","","doktores.just@t-online.de","0","3","9999-00-00","9999-00-00","0","deutsch","#FF77FF","active","2010-10-18");
INSERT INTO wvf_users VALUES("13","KarinL","463a7c51cec7c5fc861db63fe467c456","Karin","Lenk","015226423297","","U.Lenk@gmx.de","0","2","2012-02-03","2012-02-26","3","deutsch","#99FF99","active","2021-03-20");
INSERT INTO wvf_users VALUES("14","Gast1","3c5da1bf82d1d59f15c8a4cbf3686ea2","Gast","","","","gast@weisserhai.net16.net","0","0","9999-00-00","9999-00-00","0","deutsch","","active","");
INSERT INTO wvf_users VALUES("15","Gast2","3c5da1bf82d1d59f15c8a4cbf3686ea2","Gast","","","","gast@weisserhai.net16.net","0","0","9999-00-00","9999-00-00","0","deutsch","","active","");

DROP TABLE wvf_users_resources;

CREATE TABLE `wvf_users_resources` (
  `user_id` int(11) default NULL,
  `resource_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO wvf_users_resources VALUES("10","1");
INSERT INTO wvf_users_resources VALUES("3","4");
INSERT INTO wvf_users_resources VALUES("3","1");
INSERT INTO wvf_users_resources VALUES("9","1");
INSERT INTO wvf_users_resources VALUES("7","1");
INSERT INTO wvf_users_resources VALUES("7","4");
INSERT INTO wvf_users_resources VALUES("8","4");
INSERT INTO wvf_users_resources VALUES("5","1");
INSERT INTO wvf_users_resources VALUES("10","4");
INSERT INTO wvf_users_resources VALUES("10","2");
INSERT INTO wvf_users_resources VALUES("11","1");
INSERT INTO wvf_users_resources VALUES("11","4");
INSERT INTO wvf_users_resources VALUES("11","2");
INSERT INTO wvf_users_resources VALUES("12","1");
INSERT INTO wvf_users_resources VALUES("5","2");
INSERT INTO wvf_users_resources VALUES("6","1");

