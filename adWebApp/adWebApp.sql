create database adWebApp;
use adWebApp;

CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    username NVARCHAR(50) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL,
    role NVARCHAR(50) NOT NULL CHECK (role IN ('DBA', 'SecurityManager', 'ContractManager'))
);

INSERT INTO users (username, password, role) VALUES 
('AdminUser', HASHBYTES('SHA2_256', 'your_password'), 'DBA'),
('SecurityManagerUser', HASHBYTES('SHA2_256', 'your_password'), 'SecurityManager'),
('ContractManagerUser', HASHBYTES('SHA2_256', 'your_password'), 'ContractManager');
