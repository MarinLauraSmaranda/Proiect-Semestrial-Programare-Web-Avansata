CREATE DATABASE todos;

USE todos;

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  active TINYINT(1) NOT NULL
);

INSERT INTO users (username, password, active) VALUES
  ('marielu', PASSWORD('password1'), 1),
  ('marialu', PASSWORD('password2'), 1);

CREATE TABLE todos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_user INT UNSIGNED NOT NULL,
  task VARCHAR(255) NOT NULL,
  completed TINYINT(1) NOT NULL
);

INSERT INTO todos (id_user, task, completed) VALUES
  (1, 'Buy groceries', 0),
  (1, 'Wash the car', 0),
  (2, 'Pay the bills', 0);

CREATE TABLE events (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_user INT UNSIGNED NOT NULL,
  event VARCHAR(255) NOT NULL,
  completed TINYINT(1) NOT NULL
);

INSERT INTO events (id_user, event, completed) VALUES
  (1, 'Meeting', 0),
  (1, 'Concert', 0),
  (2, 'Reunion 10 years', 0);