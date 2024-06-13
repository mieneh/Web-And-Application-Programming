create table Users
(
	USERNAME VARCHAR(20) primary key ,
	PASSWORD VARCHAR(50)
)
INSERT INTO Users VALUES ('admin', '123456')

CREATE TABLE LISTPRODUCT
(
	PRODUCTID int identity(1,1) PRIMARY KEY,
	PRODUCTNAME NVARCHAR (50),
	PRICE FLOAT,
	QTY INT,
	REMARKS NVARCHAR(50)
)
GO
delete from LISTPRODUCT
DBCC CHECKIDENT ('LISTPRODUCT', RESEED, 0);
INSERT INTO LISTPRODUCT (PRODUCTNAME, PRICE, QTY, REMARKS)
VALUES 
    ('Product A', 10.99, 100, 'New Product'),
    ('Product B', 12.99, 50, 'Sale Item'),
    ('Product C', 8.99, 200, 'Clearance');INSERT INTO LISTPRODUCT (PRODUCTNAME, PRICE, QTY, REMARKS)
VALUES
('Men''s Running Shoes', 100, 50, 'Black'),
('Women''s Running Shoes', 90, 40, 'White'),
('Men''s Training Shoes', 80, 30, 'Blue'),
('Women''s Training Shoes', 70, 20, 'Pink'),
('Men''s Football Boots', 120, 60, 'Red'),
('Women''s Football Boots', 110, 50, 'Yellow'),
('Men''s Soccer Cleats', 130, 70, 'Green'),
('Women''s Soccer Cleats', 120, 60, 'Purple'),
('Kids'' Athletic Shoes', 50, 100, 'Orange'),
('Kids'' Running Shoes', 40, 90, 'Blue'),
('Kids'' Football Boots', 60, 80, 'Lemon'),
('Kids'' Soccer Cleats', 70, 70, 'Black and White'),
('Men''s Dress Shoes', 150, 30, 'Brown'),
('Women''s Dress Shoes', 140, 25, 'Red'),
('Women''s High Heels', 120, 20, 'Black'),
('Men''s Boots', 110, 35, 'Brown and Black'),
('Women''s Boots', 100, 30, 'White'),
('Men''s Sandals', 80, 40, 'Navy Blue'),
('Women''s Sandals', 70, 35, 'Pink'),
('Men''s Dress Loafers', 130, 25, 'Black'),
('Women''s Dress Pumps', 120, 20, 'White'),
('Men''s Platform Shoes', 90, 45, 'Green'),
('Women''s Platform Shoes', 80, 40, 'Orange'),
('Men''s High Top Sneakers', 100, 30, 'Black'),
('Women''s High Top Sneakers', 90, 25, 'White'),
('Adidas Running Shoes', 200, 50, 'Black and Red'),
('Nike Running Shoes', 190, 40, 'White and Black'),
('Puma Running Shoes', 180, 30, 'Blue and Black'),
('Reebok Running Shoes', 170, 20, 'Pink and Blue')
CREATE PROCEDURE GETALLPRODUCT
AS
BEGIN
	SELECT PRODUCTID, PRODUCTNAME,PRICE,QTY,REMARKS FROM LISTPRODUCT with(nolock)
END
delete from  LISTPRODUCT

CREATE PROC INSERTPRODUCT
(
@PRODUCTNAME NVARCHAR(50),
@PRICE decimal(8,2),
@QTY INT,
@REMARKS NVARCHAR(50)
)
AS
BEGIN
DECLARE @RowCount int = 0
SET @RowCount = (select count(1) from LISTPRODUCT where PRODUCTNAME = @PRODUCTNAME)
	BEGIN TRY
		BEGIN TRAN

		if(@RowCount=0)
			begin
				INSERT INTO LISTPRODUCT(PRODUCTNAME, PRICE, QTY, REMARKS)
				VALUES (@PRODUCTNAME, @PRICE, @QTY, @REMARKS)
			end
		COMMIT TRAN
	END TRY
BEGIN CATCH
	ROLLBACK TRAN
	SELECT ERROR_MESSAGE()
END CATCH
END 
EXEC INSERTPRODUCT 'Product A', 10.99, 100, 'New product'

create proc UPDATEPRODUCT
(
@PRODUCTID int,
@PRODUCTNAME NVARCHAR(50),
@PRICE DECIMAL(8,2),
@QTY INT,
@REMARKS NVARCHAR(50)
)
AS
BEGIN
DECLARE @RowCount int = 0
SET @RowCount = (select count(1) from LISTPRODUCT where PRODUCTNAME = @PRODUCTNAME and PRODUCTID <> @PRODUCTID)
begin try
begin tran
if(@RowCount = 0)
begin
update LISTPRODUCT
SET PRODUCTNAME = @PRODUCTNAME,
PRICE = @PRICE,
QTY = @QTY,
REMARKS = @REMARKS
WHERE PRODUCTID = @PRODUCTID
END
COMMIT TRAN
END TRY
BEGIN CATCH
ROLLBACK TRAN
SELECT ERROR_MESSAGE()
END CATCH
END
create proc GETPRODUCTBYID
(
@PRODUCTID INT
)
AS
BEGIN
SELECT PRODUCTID,PRODUCTNAME,PRICE,QTY,REMARKS from LISTPRODUCT where PRODUCTID = @PRODUCTID
end

CREATE proc DELETEPRODUCT
(
@PRODUCTID INT,
@OUTPUTMESSAGE VARCHAR(50) OUTPUT
)
AS
BEGIN
declare @rowcount int = 0
BEGIN TRY
set @rowcount = (select count(1) from LISTPRODUCT where PRODUCTID = @PRODUCTID)
if(@rowcount >0)
begin
BEGIN TRAN
DELETE FROM LISTPRODUCT WHERE PRODUCTID = @PRODUCTID
SET @OUTPUTMESSAGE = 'Product deleted successfully!';
COMMIT TRAN
end
else
begin 
set @OUTPUTMESSAGE = 'Product not available with id ' + CONVERT(varchar, @PRODUCTID)
END
END TRY
BEGIN CATCH 
ROLLBACK TRAN
SET @OUTPUTMESSAGE = ERROR_MESSAGE()
END CATCH
END
