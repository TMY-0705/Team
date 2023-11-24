CREATE TABLE IF NOT EXISTS Accounts (
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    account_name VARCHAR(32) NOT NULL,
    account_email VARCHAR(128) NOT NULL,
    account_pass VARCHAR(128) NOT NULL,
    account_postal CHAR(7) NOT NULL,
    account_addr_main VARCHAR(128) NOT NULL,
    account_addr_detail VARCHAR(128) NOT NULL,
    account_addr_building VARCHAR(128) NOT NULL
);

CREATE TABLE IF NOT EXISTS Categories (
	category_id INT AUTO_INCREMENT PRIMARY KEY,
	category_name VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Products (
	product_id INTEGER AUTO_INCREMENT PRIMARY KEY,
	product_name VARCHAR(128) NOT NULL,
	product_price INT NOT NULL,
	product_stock INT NOT NULL,
	product_image VARCHAR(128) NOT NULL,
	product_maker VARCHAR(128) NOT NULL,
	category_id INT NOT NULL,
	FOREIGN KEY (category_id) REFERENCES Categories (category_id)
);

CREATE TABLE IF NOT EXISTS Histories (
	history_id INT AUTO_INCREMENT PRIMARY KEY,
	account_id INT NOT NULL,
	history_date INT NOT NULL,
	FOREIGN KEY (account_id) REFERENCES Accounts (account_id)
);

CREATE TABLE IF NOT EXISTS Histories_detail (
	history_id INT NOT NULL,
	product_id INT NOT NULL,
	history_detail_amount INT NOT NULL,
	history_detail_rate INT NOT NULL DEFAULT 0,
	FOREIGN KEY (history_id) REFERENCES Histories (history_id),
	FOREIGN KEY (product_id) REFERENCES Products (product_id)
);

CREATE TABLE IF NOT EXISTS Carts (
	card_id INT AUTO_INCREMENT PRIMARY KEY,
	account_id INT NOT NULL,
	product_id INT NOT NULL,
	FOREIGN KEY (account_id) REFERENCES Accounts (account_id),
	FOREIGN KEY (product_id) REFERENCES Products (product_id)
);