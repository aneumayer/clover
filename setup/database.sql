CREATE DATABASE clover
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci
;

USE clover;

CREATE TABLE clover (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    public_id CHAR(4) NOT NULL,
    created_at DATETIME NOT NULL,
    UNIQUE INDEX (public_id)
);

CREATE TABLE deed (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    clover_id INTEGER,
    act VARCHAR(1000),
    recipient VARCHAR(255),
    age SMALLINT(2),
    location VARCHAR(1000),
    affect VARCHAR(1000),
    created_at DATETIME NOT NULL,
    FOREIGN KEY (clover_id) REFERENCES clover(id)
);

--- Be sure to change 'new_password' to something else
CREATE USER 'clover'@'%' IDENTIFIED BY 'new_password';
GRANT ALL PRIVILEGES ON clover.* TO 'clover'@'%' WITH GRANT OPTION;
