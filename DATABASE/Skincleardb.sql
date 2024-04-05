DROP DATABASE IF EXISTS skinclear;
CREATE DATABASE skinclear;
USE skinclear;

CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(60) NOT NULL,
    Email VARCHAR(60) UNIQUE CHECK (Email LIKE '%@%'),
    SkinType VARCHAR(60),
    Goals VARCHAR(255) 
);

CREATE TABLE SkinIssues (
    IssueID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(60),
    Description VARCHAR(255)
);

CREATE TABLE SkinCareRegime (
    RegimeID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(60),
    RoutineDescription VARCHAR(255), 
    ForSkinIssue INT, 
    Steps VARCHAR(255), 
    FOREIGN KEY (ForSkinIssue) REFERENCES SkinIssues(IssueID)
);

CREATE TABLE Dermatologists (
    DermatologistID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(60),
    AffiliatedHospital VARCHAR(60),
    ContactInfo VARCHAR(60)
);

CREATE TABLE MakeupRoutine (
    MakeupRoutineID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(60),
    Details VARCHAR(255), 
    ForSkinType VARCHAR(60),
    Steps VARCHAR(255) 
);

CREATE TABLE MakeupBrands (
    BrandID INT PRIMARY KEY AUTO_INCREMENT,
    BrandName VARCHAR(60),
    ProductType VARCHAR(60),
    ProductURL VARCHAR(255), 
    ForSkinType VARCHAR(60)
);

CREATE TABLE ProgressPictures (
    PhotoID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    ImageURL VARCHAR(255), 
    ImageType VARCHAR(60) CHECK (ImageType IN ('Before', 'After')),
    PostDate DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE UserRoutine (
    RoutineID INT PRIMARY KEY AUTO_INCREMENT,
    RegimeID INT,
    UserID INT,
    Duration INT,
    PhotoIDBefore INT, 
    PhotoIDAfter INT,
    FOREIGN KEY (RegimeID) REFERENCES SkinCareRegime(RegimeID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (PhotoIDBefore) REFERENCES ProgressPictures(PhotoID),
    FOREIGN KEY (PhotoIDAfter) REFERENCES ProgressPictures(PhotoID)
);

CREATE TABLE UserFeedback (
    FeedbackID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    RoutineID INT,
    MakeupRoutineID INT,
    Rating INT,
    Comments VARCHAR(255), 
    EntryDate DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (RoutineID) REFERENCES UserRoutine(RoutineID),
    FOREIGN KEY (MakeupRoutineID) REFERENCES MakeupRoutine(MakeupRoutineID)
);
