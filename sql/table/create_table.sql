CREATE DATABASE IF NOT EXISTS breeding;
USE breeding;

-- Tables for species
CREATE TABLE breeding_animal_species (
    species_id VARCHAR(70) PRIMARY KEY,
    species_name TEXT
);

CREATE TABLE breeding_species_min_weight_sale (
    min_sale_weight_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    min_sales_weight DECIMAL(7, 2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_max_weight (
    max_weight_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    max_weight DECIMAL(7, 2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_selling_price (
    selling_price_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    selling_price DECIMAL(15, 2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_day_without_eating (
    day_without_eating_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    day_without_eating INT,
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_weight_loss (
    weight_loss_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    weight_loss_percent DOUBLE,
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

-- Tables for users
CREATE TABLE breeding_user (
    user_id VARCHAR(70) PRIMARY KEY,
    username TEXT,
    real_name TEXT,
    insert_date DATE,
    pwd TEXT,
    email TEXT,
    numero TEXT
);

CREATE TABLE breeding_user_wallet (
    wallet_id VARCHAR(70) PRIMARY KEY,
    user_id VARCHAR(70),
    money DECIMAL(15, 2),
    description TEXT,
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id)
);

-- Tables for animal
CREATE TABLE breeding_user_animal_mvt (
    mvt_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    user_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    mvt_type VARCHAR(3),
    mvt_price DECIMAL(15, 2),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal_weight(animal_id),
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id)
);

CREATE TABLE breeding_animal_day_without_eating (
    day_without_eating_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    day_without_eating INT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal_weight(animal_id)
);

CREATE TABLE breeding_animal_weight_loss (
    weight_loss_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    weight_loss_percent INT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal_weight(animal_id)
);

CREATE TABLE breeding_animal_weight (
    animal_id VARCHAR(70) PRIMARY KEY,
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    weight DECIMAL(7, 2)
);

CREATE TABLE breeding_animal_pic (
    pic_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    filename TEXT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal_weight(animal_id)
);

CREATE TABLE breeding_animal_market_mvt (
    mvt_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    user_id VARCHAR(70),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    mvt_type INT,
    mvt_price DECIMAL(15, 2),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal_weight(animal_id),
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id)
);

-- Tables for food
CREATE TABLE breeding_food (
    food_id VARCHAR(70) PRIMARY KEY,
    food_name TEXT
);

CREATE TABLE breeding_food_price (
    food_price_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    price DECIMAL(15, 2),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_food_stock (
    food_stock_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    food_weight DECIMAL(7, 2),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_food_market_stock (
    food_market_stock_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    food_weight DECIMAL(7, 2),
    insert_date DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);