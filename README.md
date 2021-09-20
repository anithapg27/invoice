# invoice

This application uses following database and tables.After creating database and tables we can add db details in config.php file,we can run the application.
First page is an order listing page.At the top of this page,there is a button for creating new invoice.After adding invoice details on this page,we can generate invoice by clicking on 'Generate Invoice' button.

we can also import database by using provided invoice.sql file .

create database and tables
create database `invoice`
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` bigint(20) NOT NULL AUTO_INCREMENT,
  `ordeDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customerName` varchar(250) NOT NULL,
  `customerAddress` longtext NOT NULL,
  `totalTax` decimal(15,2) NOT NULL,
  `subtotalWithoutTax` decimal(10,2) NOT NULL,
  `subtotalWithTax` decimal(10,2) NOT NULL,
  `discountType` varchar(50) NOT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `totalAmount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`idOrder`)
)


INSERT INTO `orders` (`idOrder`, `ordeDate`, `customerName`, `customerAddress`, `totalTax`, `subtotalWithoutTax`, `subtotalWithTax`, `discountType`, `discount`, `totalAmount`) VALUES
(1, '2021-09-20 13:58:17', 'Annet John', 'Rose VIlla\r\nBanglore', '7800.00', '86000.00', '93800.00', 'amount', '1000.00', '92800.00');


DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `orderItemId` bigint(20) NOT NULL AUTO_INCREMENT,
  `idOrder` bigint(20) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  `itemQuantity` bigint(20) NOT NULL,
  `itemPrice` decimal(15,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `totalAmount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`orderItemId`)
)

INSERT INTO `order_items` (`orderItemId`, `idOrder`, `itemName`, `itemQuantity`, `itemPrice`, `tax`, `totalAmount`) VALUES
(1, 1, 'Mobile', 1, '16000.00', 5, '16800.00'),
(2, 1, 'Laptop', 1, '70000.00', 10, '77000.00');

