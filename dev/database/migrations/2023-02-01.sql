/* Since we used a starter project for this and the specified directions were to create table users We need to rename our users table to admin_users */
RENAME TABLE users TO admin_users;


/* New users table */

CREATE TABLE users (
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255),
    `email` VARCHAR(255),
    `employee_id` VARCHAR(20)
);