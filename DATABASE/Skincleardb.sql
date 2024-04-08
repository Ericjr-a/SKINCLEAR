drop database if exists skinclear;
create database skinclear;
use skinclear;

CREATE TABLE Users(
UserID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
Username VARCHAR(60) NOT NULL,
Email VARCHAR(60) UNIQUE CHECK(Email LIKE "%@%"),
Passwd  VARCHAR(255) NOT NULL);


CREATE TABLE skinType(
Sid INT PRIMARY KEY NOT NULL,
typeName VARCHAR(50) NOT NULL
);

CREATE TABLE skinRegime(
RegimeID INT PRIMARY KEY NOT NULL,
Title VARCHAR(60),
RoutineDescription VARCHAR(60),
ForSkinType VARCHAR(60),
Steps VARCHAR(300));

CREATE TABLE MakeupRoutine(
MakeupRoutineID INT PRIMARY KEY NOT NULL,
Title VARCHAR(60),
Details VARCHAR(60),
ForSkinType VARCHAR(60),
Steps VARCHAR(60));

CREATE TABLE MakeupBrands(
BrandID INT PRIMARY KEY NOT NULL,
BrandName VARCHAR(60),
ProductType VARCHAR(60),
ProductdURL VARCHAR(60),
ForSkinType VARCHAR(60));

CREATE TABLE ProgressPictures(
PhotoID INT PRIMARY KEY,
UserID INT,
Image blob,
ImageType VARCHAR(60) CHECK(ImageType in('Before','After')),
PostDate date,
FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
CREATE TABLE UserRoutine(
RoutineID INT PRIMARY KEY NOT NULL,
RegimeID INT,
UserID INT,
Duration INT,
PhotoID INT,
FOREIGN KEY(RegimeID)REFERENCES skinRegime(RegimeID),
FOREIGN KEY(UserID)REFERENCES Users(UserID),
FOREIGN KEY(PhotoID)REFERENCES ProgressPictures(PhotoID)
);

CREATE TABLE UserFeedback(
FeedbackID INT PRIMARY KEY NOT NULL,
UserID INT,
Rating INT,
Comments VARCHAR(60),
FOREIGN KEY(UserID)REFERENCES Users(UserID));


INSERT INTO skinRegime (RegimeID, Title, RoutineDescription, ForSkinType, Steps) VALUES
(1, 'Hydration Boost', 'Intensive moisture care for dry skin', 'Dry', '1. Cleansing 2. Hydrating serum 3. Moisturizer'),
(2, 'Acne Control', 'Routine for managing acne-prone skin', 'Oily', '1. Cleansing 2. Salicylic acid treatment 3.Retinol 4. Oil-free moisturizer'),
(3, 'Sensitivity Soothe', 'Calm sensitive skin and reduce redness', 'Combination', '1. Mild cleansing 2. Soothing serum 3. Barrier repair cream'),
(4, 'Anti-Aging Care', 'Routine focused on reducing signs of aging', 'Normal', '1. Cleansing 2. Retinol treatment 3. Moisturizer with SPF'),
(5, 'Period Cleanser', 'Routine focused on reducing period acne', 'Normal', '1. Cleansing with oil cleanser 2. Toner 2. Hydrating serum 3. Moisturizer'),
(6, 'Brigtening Routine', 'Routine for brightening skin', 'Oily', '1. Gentle cleansing 2. Vitamin C serum 3. Oil-free moisturizer'),
(7, 'Exfoliating Routine', 'Routine focused on smoothening skin ', 'Combination', '1. Mild cleansing 2. Exfoliating serum 3. Barrier repair cream'),
(8, 'Everyday Essential', 'Routine for everyday skin care', 'Normal', '1. Cleansing 2. Toner 3. Moisturizer with SPF 4.Lip Balm');


INSERT INTO skinType (Sid, typeName) VALUES
(1, 'Oily'),
(2, 'Dry'),
(3, 'Combination'),
(4, 'Normal');


ALTER TABLE Users
ADD COLUMN Sid INT;
  
  
  
