--Create tables for the strong entities--
CREATE TABLE IF NOT EXISTS venue (
  venue_name varchar(30) NOT NULL,
  address varchar(30) NOT NULL,
  capacity int(11) NOT NULL,
  PRIMARY KEY(venue_name)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tickets (
  ticket_id int(11) NOT NULL AUTO_INCREMENT,
  price decimal(10,0) NOT NULL,
  is_sold tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY(ticket_id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS shows (
  date_played date NOT NULL,
  doors_open time NOT NULL,
  venue_name varchar(30) NOT NULL,
  INDEX(date_played, doors_open),
  PRIMARY KEY(date_played, doors_open,venue_name),
  FOREIGN KEY(venue_name) REFERENCES venue(venue_name) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS performer(
  performer_name varchar(50) NOT NULL,
  number_of_members int NOT NULL,
  genre varchar(30) NOT NULL,
  year_founded int NOT NULL,
  PRIMARY KEY(performer_name)
);

CREATE TABLE IF NOT EXISTS tour(
  tour_name varchar(50) NOT NULL,
  tour_manager_first_name varchar(30),
  tour_manager_last_name varchar(30),
  date_started date NOT NULL,
  date_ended date NOT NULL,
  CHECK(date_ended >= date_started),
  PRIMARY KEY(tour_name)
);

CREATE TABLE IF NOT EXISTS location(
	zip_code varchar(5) NOT NULL,
	state varchar(15) NOT NULL,
	city  varchar(30) NOT NULL,
	PRIMARY KEY(zip_code)
);

--Create tables for the relationships--

CREATE TABLE IF NOT EXISTS sells (
  ticket_id int(11) NOT NULL,
  date_played date NOT NULL,
  doors_open time NOT NULL,
  venue_name varchar(30) NOT NULL,
  PRIMARY KEY(ticket_id),
  FOREIGN KEY(ticket_id) REFERENCES tickets(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(venue_name, date_played, doors_open) REFERENCES shows(venue_name, date_played, doors_open) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS go_on(
	performer_name varchar(50) NOT NULL,
	tour_name varchar(50) NOT NULL,
	PRIMARY KEY(performer_name, tour_name),
	FOREIGN KEY(performer_name) REFERENCES performer(performer_name) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(tour_name) REFERENCES tour(tour_name) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS play(
  performer_name varchar(50) NOT NULL,
  date_played date NOT NULL,
  doors_open time NOT NULL,
  venue_name varchar(30) NOT NULL,
  PRIMARY KEY(performer_name, date_played, doors_open, venue_name),
  FOREIGN KEY(performer_name) REFERENCES performer(performer_name) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(venue_name, date_played, doors_open) REFERENCES shows(venue_name, date_played, doors_open) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS contain(
  tour_name varchar(50) NOT NULL,
  date_played date NOT NULL,
  doors_open time NOT NULL,
  venue_name varchar(30) NOT NULL,
  PRIMARY KEY(tour_name, date_played, doors_open, venue_name),
  FOREIGN KEY(tour_name) REFERENCES tour(tour_name) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(venue_name, date_played, doors_open) REFERENCES shows(venue_name, date_played, doors_open) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS is_in(
	venue_name varchar(50),
	zip_code varchar(5),
	PRIMARY KEY(venue_name),
	FOREIGN KEY(venue_name) REFERENCES venue(venue_name) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(zip_code) REFERENCES location(zip_code) ON DELETE CASCADE ON UPDATE CASCADE
);

--Insert some data into our database--

--Entities--
INSERT INTO venue VALUES ('The Verizon Center', 'The Downtown Mall', 500);
INSERT INTO venue VALUES ('The Jefferson', 'The Downtown Mall', 3);

INSERT INTO performer VALUES ('Drake', 1, 'Rap', 1995);
INSERT INTO performer VALUES ('Kanye West', 1, 'Rap', 1990);
INSERT INTO performer VALUES ('The ChainSmokers', 2, 'Pop', 2008);

INSERT INTO location VALUES ('22903', "Virginia", "Charlottesville");
INSERT INTO location VALUES ('22904', "Virginia", "Charlottesville");

INSERT INTO tour VALUES('More Life Tour', 'Aubrey', 'Graham', '20170412', '20170431');
INSERT INTO tour VALUES('Life of Pablo', 'Jim', 'Scott', '20170412', '20170331');
--Should be invalid--
INSERT INTO tour VALUES('Graduation', 'Jim', 'Scott', '20170412', '20170331');

INSERT INTO tickets VALUES(NULL, 120, 0);
INSERT INTO tickets VALUES(NULL, 120, 1);
INSERT INTO tickets VALUES(NULL, 120, 0);
INSERT INTO tickets VALUES(NULL, 120, 0);
INSERT INTO tickets VALUES(NULL, 180, 0);
INSERT INTO tickets VALUES(NULL, 180, 1);
INSERT INTO tickets VALUES(NULL, 180, 0);
INSERT INTO tickets VALUES(NULL, 180, 1);

INSERT INTO shows VALUES('20170322', '23:13:00', 'The Verizon Center');
INSERT INTO shows VALUES('20170412', '23:13:00', 'The Jefferson');

--Relationships--
INSERT INTO is_in VALUES('The Verizon Center', '22903');
INSERT INTO is_in VALUES('The Jefferson', '22904');

INSERT INTO contain VALUES('More Life Tour', '20170322', '23:13:00', 'The Verizon Center');

INSERT INTO go_on VALUES('Drake', 'More Life Tour');
INSERT INTO go_on VALUES('Kanye West', 'Life of Pablo');

INSERT INTO play VALUES('Drake', '20170322', '23:13:00', 'The Verizon Center');
INSERT INTO play VALUES('Kanye West', '20170412', '23:13:00', 'The Jefferson');

INSERT INTO sells VALUES(3, '20170322', '23:13:00', 'The Verizon Center');
INSERT INTO sells VALUES(4, '20170322', '23:13:00', 'The Verizon Center');
INSERT INTO sells VALUES(5, '20170322', '23:13:00', 'The Verizon Center');
INSERT INTO sells VALUES(6, '20170322', '23:13:00', 'The Verizon Center');
INSERT INTO sells VALUES(7, '20170412', '23:13:00', 'The Jefferson');
INSERT INTO sells VALUES(8, '20170412', '23:13:00', 'The Jefferson');
INSERT INTO sells VALUES(9, '20170412', '23:13:00', 'The Jefferson');
INSERT INTO sells VALUES(10, '20170412', '23:13:00', 'The Jefferson');


--Useful Queries--
SELECT * FROM performer NATURAL JOIN play NATURAL JOIN shows NATURAL JOIN venue NATURAL JOIN is_in NATURAL JOIN location;

--Trigger Definitions--
CREATE TRIGGER `check_Num_Tickets` BEFORE INSERT ON `sells`
 FOR EACH ROW BEGIN
    DECLARE ven_capacity INT;
    DECLARE tickets_sold INT;
  SELECT capacity FROM venue WHERE venue_name = new.venue_name INTO ven_capacity;
  SELECT COUNT(*) FROM tickets NATURAL JOIN sells NATURAL JOIN shows WHERE shows.date_played = new.date_played AND shows.doors_open = new.doors_open AND shows.venue_name = new.venue_name INTO tickets_sold;
  if ven_capacity <= tickets_sold then
        signal sqlstate '45000' set message_text = 'Trying to overbook venue';
    end if;
END

CREATE TRIGGER `check_Dates` BEFORE INSERT ON `tour`
 FOR EACH ROW BEGIN
  if new.date_started > new.date_ended then
        signal sqlstate '45000' set message_text = "Invalid date entries";
    end if;
END

--Stored Procedure Definitions--
CREATE DEFINER=`cs4750s17bhg5yd`@`%` PROCEDURE `Get_Number_of_Tickets`(IN `date_played` DATE, IN `doors_open` TIME, IN `venue_name` VARCHAR(50), OUT `num_tickets` INT)
    READS SQL DATA
BEGIN
  
  SELECT COUNT(*) FROM tickets NATURAL JOIN sells NATURAL JOIN shows WHERE shows.date_played = date_played AND shows.doors_open = doors_open AND shows.venue_name = venue_name INTO num_tickets; 

  SELECT num_tickets;
END

CREATE DEFINER=`cs4750s17bhg5yd`@`%` PROCEDURE `Get_Percent_Tickets_Sold`(IN `date_played` DATE, IN `doors_open` TIME, IN `venue_name` VARCHAR(50), IN `percent_tickets` FLOAT)
    NO SQL
BEGIN
  DECLARE not_sold decimal;
  DECLARE sold decimal;
  SET not_sold = 0;
  SET sold = 0;
  SELECT COUNT(*) FROM tickets NATURAL JOIN sells NATURAL JOIN shows WHERE shows.date_played = date_played AND shows.doors_open = doors_open AND shows.venue_name = venue_name AND tickets.is_sold = 1 INTO sold; 

  SELECT COUNT(*) FROM tickets NATURAL JOIN sells NATURAL JOIN shows WHERE shows.date_played = date_played AND shows.doors_open = doors_open AND shows.venue_name = venue_name AND tickets.is_sold = 0 INTO not_sold; 
  SET percent_tickets = sold/(sold+not_sold);
  SELECT percent_tickets;
END