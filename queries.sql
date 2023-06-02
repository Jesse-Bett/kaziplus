-- create the new database for the app
CREATE DATABASE kazi_app;  

use kazi_app;


-- Creating the Employee table
CREATE TABLE Employee (
    eid int NOT NULL AUTO_INCREMENT,
    first_name varchar(10),
    last_name varchar(10) NOT NULL,
    phone int(12),
    email varchar(55),
    password varchar(55),
    PRIMARY KEY (eid)
);


-- Creating the Projects table
CREATE TABLE Projects (
    pid int NOT NULL AUTO_INCREMENT,
    project_name varchar(55),
    start_date date,
    end_date date,
    PRIMARY KEY (pid)
);


-- Creating the Task table
CREATE TABLE Task (
    tid int NOT NULL AUTO_INCREMENT,
    eid int,
    pid int ,
    date_done date,
    task varchar(55),
    time_taken int,  -- in hours 
    comments varchar(255),
    PRIMARY KEY (tid),
    FOREIGN KEY (eid) REFERENCES Employee(eid),
    FOREIGN KEY (pid) REFERENCES Projects(pid)
);



 -- Inserting data into the Employee table
INSERT INTO Employee (first_name, last_name, phone, email, password) 
VALUES
('Pep', 'Guardiola', 0799878934,'pep@gmail.com',MD5('trebble123')),
('Harry','Kane', 0726893456,'harrykane@gmail.com',MD5('harryscores')),
('Erling','Haaland', 0749877934,'braut@gmail.com',MD5('goldenboot'));



-- Inserting data into the Projects table
INSERT INTO Projects (project_name, start_date, end_date)
VALUES
('Ukulima Web App', '2021-01-01', '2021-01-31'),
('Faulu E-Commerce', '2021-02-01', '2021-02-28'),
('Kazi+ Anroid App', '2021-03-01', '2021-03-31');
