DROP SCHEMA IF EXISTS Dow_Jones_DB;
CREATE DATABASE Dow_Jones_DB;
USE Dow_Jones_DB;


# Clients table
CREATE TABLE Clients(
    client_id INT PRIMARY KEY AUTO_INCREMENT,
	client_fname VARCHAR(50),
	client_lname VARCHAR(50),
	password VARCHAR(50);
    address TINYTEXT,
	client_email VARCHAR(50);
    risk_tolerance DOUBLE,
    debts DOUBLE,
    networth DOUBLE,
    profit_percent DOUBLE,
    location TINYTEXT
    );
ALTER TABLE Clients AUTO_INCREMENT = 1001;
# end


# Investors table
CREATE TABLE Investors (
    client_id INT PRIMARY KEY,
	fname TINYTEXT,
    lname TINYTEXT,
    FOREIGN KEY  (client_id) REFERENCES Clients (client_id)
    ON UPDATE CASCADE
);
# end
 
 
# Institutions table
CREATE TABLE Instituitions (
    client_id INT PRIMARY KEY,
	inst_name TINYTEXT,
    area TINYTEXT,
   FOREIGN KEY  (client_id) REFERENCES Clients (client_id)
   ON UPDATE CASCADE
);
# end


# Trading Companies table
CREATE TABLE Companies (
    com_id INT PRIMARY KEY AUTO_INCREMENT,
	com_name TINYTEXT,
    com_type TINYTEXT,
    trade_name CHAR(4) UNIQUE,
    ratings ENUM("AA", "AB", "BB"),
    liq_ratio DOUBLE,
    variability DOUBLE,
    average_returns DOUBLE,
    assets_value DOUBLE,
    debts DOUBLE
);
ALTER TABLE Companies AUTO_INCREMENT = 4001;
# end

 
# Clients' Orders table
CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
	com_id INT,
    order_type ENUM("BUY", "SELL"),
    quantity INT,
    price DOUBLE,
    commission DOUBLE,
    FOREIGN KEY  (client_id) REFERENCES Clients (client_id),
    FOREIGN KEY (com_id) REFERENCES Companies(com_id)
	ON UPDATE CASCADE
);
CREATE INDEX Typed ON Orders(order_type);
CREATE INDEX Quantity ON Orders(quantity);
ALTER TABLE Orders AUTO_INCREMENT = 5001;
# end

 
 # Stock Prices table
CREATE TABLE Stock_Prices (
    stock_id INT PRIMARY KEY AUTO_INCREMENT,
	com_id INT,
    unit_price DOUBLE,
    FOREIGN KEY  (com_id) REFERENCES Companies (com_id)
    ON UPDATE CASCADE
);
ALTER TABLE Stock_Prices AUTO_INCREMENT = 6001;
# end

 
# Filed Orders table
CREATE TABLE Filed (
	order_id INT,
	stock_id INT,
   FOREIGN KEY  (order_id) REFERENCES Orders (order_id),
   FOREIGN KEY  (stock_id) REFERENCES Stock_Prices (stock_id)
);
# end
 
 
 # Client to Company Matching table
CREATE TABLE Company_Match (
	company_id INT,
    client_id INT,
    FOREIGN KEY  (company_id) REFERENCES Companies (com_id),
    FOREIGN KEY  (client_id) REFERENCES Clients (client_id)
    ON UPDATE CASCADE
);
CREATE INDEX Matches ON Company_Match(company_id);
CREATE INDEX Clients ON Company_Match(client_id);
# end


# Populate Clients Table
INSERT INTO Clients (address, risk_tolerance, debts, networth, profit_percent, location) VALUES 
 ("Block B Plot 67 New Juaben", 0.20, 0.00, 1450.00, 0.20, "Kumasi"),
 ("Block P Plot 69 Amasaman", 0.10, 599.00, 234900.00, 0.50, "Accra"),
 ("Block F Plot 78 Madina", 0.07, 1200.00, 456000.00, 0.40, "Accra"),
 ("Block R Plot 89 Real Street", 0.02, 0.00, 6700.00, 0.48, "Sunyani"),
 ("Block S Plot 14 Kekele", 0.17, 40.00, 567900.00, 0.60, "Oti"),
 ("Block W Plot 16 Navrongo", 0.30, 690.00, 59560.00, 0.55, "Salaman"),
 ("Block C Plot 25 Koforidua", 0.20, 1002.00, 35800.00, 0.58, "Koforidua"),
 ("Block L Plot 48 Bolgatanga", 0.05, 1300.00, 56000.00, 0.39, "Bolgatanga"),
 ("Block K Plot 19 Asokwa", 0.20, 400.00, 3900, 0.15, "Kumasi"),
 ("Block Z Plot 56 New Atonso", 0.20, 0.00, 45644.00, 0.25, "Kumasi");


#Populate Investors Table 
INSERT INTO Investors (client_id, fname, lname) VALUES
(1009, "Clement", "Darko"),
(1006, "Sofia", "Wood"),
(1010, "Knowledge", "Nunya"),
(1008, "Betsy", "Malm"),
(1007, "Idaya", "Seidu");


#Populate Instituitions Table
INSERT INTO Instituitions (client_id, inst_name, area) VALUES
(1002, "GRIDCO","Electricity"),
(1001, "VANGUARD","Insurance"),
(1004, "Standard Chartered","Banking"),
(1003, "Anglogold","Mining"),
(1005, "McKinsey GH","Consultancy");


#Populate Companies Table
INSERT INTO Companies(com_name, com_type, trade_name, ratings, liq_ratio, variability,
 average_returns, assets_value, debts) VALUES
("FanMilk Limited", "Manufacturing", "FANM", "AA", 0.6, 0.55, 0.3, 1500000.00, 45000.00),
("Cocoa Processing Company", "Manufacturing", "CCPL", "AA", 0.3, 0.58, 0.6, 2540000.00, 15000.00),
("Tullow Oil", "Gas and Oil Production", "TUOL", "AB", 0.5, 0.2, 0.3, 1554000.00, 67000.00),
("Societe Generale", "Banking", "SGCC", "AB", 0.1, 0.05, 0.25, 1640000.00, 128000.00),
("Mazuma Limited", "Fintech", "MZLT", "BB", 0.25, 0.65, 0.85, 1950000.00, 47000.00),
("Kasapreko", "Manufacturing", "KASC", "AA", 0.01, 0.45, 0.67, 7540000.00, 20000.00),
("Kempenski", "Hotel", "KMPH", "AA", 0.02, 0.01, 0.12, 4560000.00, 34600.00),
("Movenpick", "Hotel", "MVPH", "AB", 0.3, 0.2, 0.4, 121000.00, 45750.00),
("Silverbird", "Cinema", "SLVC", "BB", 0.5, 0.2, 0.30, 1240000.00, 55040.00),
("Goil", "Gas and Oil Production", "GOIL", "AB", 0.55, 0.23, 0.30, 17000.00, 45200.00);


#Populate Orders Table
 INSERT INTO Orders(client_id, com_id, order_type, quantity, price, commission) VALUES
 (1003, 4001, "BUY", 1000, 25.00, 0.10),
 (1003, 4001, "SELL", 500, 67.00, 0.05),
 (1006, 4002, "BUY", 800, 15.00, 0.05),
 (1005, 4001, "BUY", 2000, 25.00, 0.10),
 (1005, 4001, "SELL", 1500, 45.00, 0.10),
 (1006, 4002, "SELL", 800, 25.00, 0.05),
 (1004, 4005, "BUY", 1000, 25.00, 0.10),
 (1005, 4005, "BUY", 1000, 25.00, 0.10),
 (1010, 4010, "BUY", 4000, 35.00, 0.10),
 (1010, 4010, "SELL", 1000, 60.00, 0.10);
 
 
 #Populate Stock_Prices Table
INSERT INTO Stock_Prices (com_id, unit_price) VALUES
(4001, 25.00),
(4001, 67.00),
(4001, 45.00),
(4002, 15.00),
(4002, 25.00),
(4005, 23.00),
(4006, 5.00),
(4006, 15.00),
(4006, 35.00),
(4006, 60.00),
(4001, 10.00);


#Populate Filed Orders Table
INSERT INTO Filed (order_id, stock_id) VALUES
(5001, 6001),
(5002, 6002),
(5004, 6003),
(5003, 6004),
(5006, 6005),
(5009, 6009),
(5010, 6010);


#Populate Company_Match Table
INSERT INTO Company_Match (company_id, client_id) VALUES
(4001, 1001),
(4002, 1005),
(4003, 1008),
(4007, 1002),
(4010, 1006);

# The company needs to calculate the total income from commissions charged. As such, it was to
# determine quantities of ordered stocks that should be charged at specific rates after a period. However, each
# commission can be charged on an order if and only if the order has been filed.
# To query our database for this information, we create a view by joining the orders and the filed orders table
# in order to determine  the orders that have been successfully filled.
# From there we can query the view to determine quantities of stocks to be charged at specific
# rates. 

# QUERY 1
CREATE VIEW Commission_Estimations AS 
SELECT Orders.order_id, Orders.quantity, Orders.price, Orders.commission
FROM Orders
INNER JOIN Filed ON Orders.order_id= Filed.order_id;

SELECT SUM(quantity * commission * price) AS Commission
FROM Commission_Estimations;


# QUERY 2
# The brokerage would want to determine the top 5 companies that had a lot of orders from clients.
SELECT (Orders.quantity * Orders.Price) AS Amount_of_Stocks_Bought, Companies.com_name AS Companies
FROM Orders
INNER JOIN Companies ON Orders.com_id = Companies.com_id
WHERE Orders.order_type = "BUY"
GROUP BY com_name
ORDER BY Amount_of_Stocks_Bought DESC;


#QUERY 3
# Determine the net amount of buy and sale orders in a period. An important KPI to the company is determining
# the average total return on investment for its clients. To arrive at that value, Doe James needs to calculate
# the total amount of filed orders for buys or sales.
CREATE VIEW ROI AS
SELECT Orders.order_id, Orders.quantity, Orders.order_type, Orders.price,
(quantity * price) AS Amount
FROM Orders
INNER JOIN Filed ON Orders.order_id= Filed.order_id;

SELECT order_type AS Orders, SUM(Amount) AS Net_Amount
FROM ROI
GROUP BY order_type;


# QUERY 4
# In the investment world, Doe James can be at the top by accessing information about market trends almost
# instantly. As such, it wants to determine the trends of stock price changes for all its companies.
SELECT Companies.com_name AS Companies, Stock_Prices.unit_price AS Stock_Per_Price
FROM Stock_Prices
JOIN Companies ON Stock_Prices.com_id = Companies.com_id
ORDER BY Companies.com_name;

# QUERY 5
# An integral part of thhe firm its ability to give expert advice on investments that suits the needs of its clients. 
# Therefore, not only does it want to keep track of the financial details of companies but also to use these details
# to match its clients' financial details
SELECT Companies.com_id AS Company_ID, Clients.client_id AS Client_ID,
Companies.average_returns AS Companies_Average_Returns, Clients.profit_percent AS Client_Expected_Returns,
Companies.variability AS Variability, Clients.risk_tolerance AS Client_Risk_Tolerance
FROM Company_Match
JOIN Companies ON Companies.com_id = Company_Match.company_id
JOIN Clients ON Clients.client_id = Company_Match.client_id;


# QUERY 6
# Instituitions require that once an order has been filled
# the respective an invoice containing their net payment be sent to them immediately. 
# Therefore, we need to query the table
# to indentify clients' whose orders where filed successfully.
SELECT Instituitions.inst_name AS Institutions, Orders.order_type AS Order_Type,
(Orders.quantity * Orders.price) AS Net_Payment
FROM Orders
INNER JOIN Filed ON Orders.order_id= Filed.order_id
INNER JOIN Instituitions ON Orders.client_id = Instituitions.client_id;

















 