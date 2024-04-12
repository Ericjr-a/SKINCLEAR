DROP DATABASE IF EXISTS skinclear;
CREATE DATABASE skinclear;
USE skinclear;

CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(60) NOT NULL,
    Email VARCHAR(60) UNIQUE NOT NULL CHECK (Email LIKE "%@%"),
    Passwd VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE skinType (
    Sid INT PRIMARY KEY AUTO_INCREMENT,
    typeName VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE skinRegime (
    RegimeID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(60) NOT NULL,
    RoutineDescription TEXT NOT NULL,
    ForSkinType INT,
    Steps TEXT NOT NULL,
    FOREIGN KEY (ForSkinType) REFERENCES skinType(Sid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE MornRegime (
	MornID INT PRIMARY KEY AUTO_INCREMENT,
    RegimeID INT,
    Title VARCHAR(60) NOT NULL,
    RoutineDescription TEXT NOT NULL,
    Steps TEXT NOT NULL,
    FOREIGN KEY (RegimeID) REFERENCES skinRegime(RegimeID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE EveningRegime (
    EveningID INT PRIMARY KEY AUTO_INCREMENT,
    RegimeID INT,
    Title VARCHAR(60) NOT NULL,
    RoutineDescription TEXT NOT NULL,
    Steps TEXT NOT NULL,
    FOREIGN KEY (RegimeID) REFERENCES skinRegime(RegimeID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE MakeupRoutine (
    MakeupRoutineID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(60) NOT NULL,
    Details TEXT NOT NULL,
    ForSkinType INT,
    Steps TEXT NOT NULL,
    FOREIGN KEY (ForSkinType) REFERENCES skinType(Sid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE MakeupBrands (
    BrandID INT PRIMARY KEY AUTO_INCREMENT,
    BrandName VARCHAR(60) NOT NULL,
    ProductType VARCHAR(255) NOT NULL,
    ProductURL VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Dermatologists (
    DermatologistID INT PRIMARY KEY AUTO_INCREMENT,
    DName VARCHAR(60) NOT NULL,
    HospitalAffiliation VARCHAR(100) NOT NULL,
    ContactInfo VARCHAR(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE ProgressPictures (
    PhotoID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    ImagePath VARCHAR(255) NOT NULL,
    PostDate DATE NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE UserFeedback (
    FeedbackID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Comments TEXT NOT NULL,
    PostDate DATE NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO skinType (Sid, typeName) VALUES
(1, 'Oily'),
(2, 'Dry'),
(3, 'Combination'),
(4, 'Normal');

INSERT INTO skinRegime (RegimeID, Title, RoutineDescription, ForSkinType, Steps) VALUES
(1, 'Hydration Boost', 'Intensive moisture care for dry skin', 2, '1. Cleansing 2. Hydrating serum 3. Moisturizer'),
(2, 'Acne Control', 'Routine for managing acne-prone skin', 1, '1. Cleansing 2. Salicylic acid treatment 3.Retinol 4. Oil-free moisturizer'),
(3, 'Sensitivity Soothe', 'Calm sensitive skin and reduce redness', 3, '1. Mild cleansing 2. Soothing serum 3. Barrier repair cream'),
(4, 'Anti-Aging Care', 'Routine focused on reducing signs of aging', 4, '1. Cleansing 2. Retinol treatment 3. Moisturizer with SPF'),
(5, 'Period Cleanser', 'Routine focused on reducing period acne', 4, '1. Cleansing with oil cleanser 2. Toner 2. Hydrating serum 3. Moisturizer'),
(6, 'Brigtening Routine', 'Routine for brightening skin', 1, '1. Gentle cleansing 2. Vitamin C serum 3. Oil-free moisturizer'),
(7, 'Exfoliating Routine', 'Routine focused on smoothening skin ', 3, '1. Mild cleansing 2. Exfoliating serum 3. Barrier repair cream'),
(8, 'Everyday Essential', 'Routine for everyday skin care', 4, '1. Cleansing 2. Toner 3. Moisturizer with SPF 4.Lip Balm');

INSERT INTO Dermatologists (DName, HospitalAffiliation, ContactInfo) VALUES
('Dr. Jane Doe', 'City Health Dermatology', 'jane.doe@chderm.com'),
('Dr. John Smith', 'Metro Skin Care Clinic', 'john.smith@mscc.com'),
('Dr. Emily White', 'Advanced Dermatology Associates', 'emily.white@ada.com'),
('Dr. Mark Brown', 'Skin Health Institute', 'mark.brown@shi.com'),
('Dr. Lisa Green', 'The Dermatology Clinic', 'lisa.green@tdclinic.com'),
('Dr. Alex Johnson', 'Skin Solutions Medical Center', 'alex.johnson@ssmc.com'),
('Dr. Sarah Miller', 'Premier Dermatology Partners', 'sarah.miller@pdp.com'),
('Dr. David Wilson', 'Elite Skin Care Specialists', 'david.wilson@escs.com'),
('Dr. Jessica Davis', 'Comprehensive Dermatology Group', 'jessica.davis@cdg.com'),
('Dr. Michael Brown', 'Total Dermatology Care Center', 'michael.brown@tdcc.com');


ALTER TABLE Users ADD COLUMN SkinTypeID INT;

ALTER TABLE Users ADD CONSTRAINT fk_skinType FOREIGN KEY (SkinTypeID) REFERENCES skinType(Sid);



INSERT INTO MakeupRoutine (Title, Details, ForSkinType, Steps) VALUES
('Daily Glow', 'A routine for a natural, everyday look.', 4, '1. Apply a light moisturizer. 2. Use a BB cream for coverage. 3. Finish with a setting powder.'),
('Evening Elegance', 'Perfect for an evening out, providing a sophisticated look.', 3, '1. Start with a hydrating primer. 2. Use foundation and concealer as needed. 3. Eye makeup and a bold lipstick.'),
('Hydration Hero', 'Makeup routine focusing on keeping the skin hydrated.', 2, '1. Hydrating primer. 2. Dewy foundation. 3. Cream-based blush and highlighter.'),
('Oil Control Matte Look', 'Helps control oil for a matte finish throughout the day.', 1, '1. Mattifying primer. 2. Oil-free foundation. 3. Translucent setting powder.'),
('Sun-Kissed Summer', 'A routine for achieving a sun-kissed glow.', 4, '1. Bronzing primer. 2. Lightweight foundation. 3. Bronzer and highlighter to finish.'),
('Sensitive Skin Soothe', 'Gentle makeup routine for sensitive skin types.', 3, '1. Mineral primer. 2. Hypoallergenic foundation. 3. Talc-free powder.'),
('Anti-Aging Elegance', 'Focused on highlighting and firming mature skin.', 4, '1. Illuminating primer. 2. Lifting foundation. 3. Light-diffusing powder.'),
('Bright and Bold', 'Vibrant makeup routine for making a statement.', 1, '1. Smoothing primer. 2. Long-wear foundation. 3. Bold eyeshadows and lip color.'),
('Dewy Freshness', 'Achieve a dewy, fresh look with these steps.', 2, '1. Hydrating primer. 2. Radiant foundation. 3. Liquid highlighter.'),
('Clear Skin Routine', 'Makeup routine for acne-prone skin.', 1, '1. Non-comedogenic primer. 2. Salicylic acid-infused foundation. 3. Mineral-based setting powder.');


INSERT INTO MakeupBrands (BrandName, ProductType, ProductURL) VALUES
('Clinique', 'Foundation', 'https://www.clinique.com/product/1599/5276/makeup/foundations/even-bettertm-makeup-broad-spectrum-spf-15?shade=CN_10_Alabaster'),
('Clinique', 'Moisturizer', 'https://www.clinique.com/product/1687/83690/skincare/moisturizers/moisture-surgetm-100h-auto-replenishing-hydrator'),
('Lancome', 'Primer', 'https://www.lancome-usa.com/makeup/lancomes-selection/best-sellers/la-base-pro-face-and-makeup-primer/1000205.html'),
('Rare Beauty', 'Foundation', 'https://www.rarebeauty.com/products/liquid-touch-weightless-foundation-1?variant=40242055446663'),
('Mac Cosmetics', 'Eyeshadow', 'https://www.maccosmetics.com/product/13840/363/products/makeup/eyes/eyeshadow/eye-shadow?shade=Omega'),
('Rhode', 'Lipbalm', 'https://www.rhodeskin.com/products/peptide-lip-tint-ribbon'),
('Avon', 'Sunscreen', 'https://www.avon.com/product/isa-knox-anew-solaire-everyday-mineral-face-protection-cream-broad-spectrum-spf-50-140937'),
('Nyx', 'Setting Spray', 'https://www.nyxcosmetics.com/makeup-setting-spray-matte/NYX_094.html'),
('Fenty Beauty', 'Highlighter', 'https://fentybeauty.com/products/demiglow-light-diffusing-highlighter-tutu-much?variant=42078266785837'),
('NARS', 'Concealer', 'https://www.narscosmetics.com/USA/radiant-creamy-concealer/999NACRCC0001.html?dwvar_999NACRCC0001_color=7845012344&cgid=concealers');

CREATE TABLE UserGoals (
    GoalID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    goal VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);




