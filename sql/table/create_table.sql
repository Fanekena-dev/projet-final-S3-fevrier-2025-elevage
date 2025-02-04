CREATE DATABASE breeding;
USE breeding;

CREATE TABLE breeding_animal_species (
    species_id VARCHAR(70) PRIMARY KEY,
    species_name TEXT
);

CREATE TABLE breeding_animal (
    animal_id VARCHAR(70) PRIMARY KEY,
    animal_name TEXT,
    animal_species VARCHAR(70),
    description TEXT,
    FOREIGN KEY (animal_species) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_min_weight_sale (
    min_sale_weight_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    min_sales_weight DECIMAL(7,2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_max_weight (
    max_weight_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    max_weight DECIMAL(7,2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_selling_price (
    selling_price_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    selling_price DECIMAL(15,2),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_day_without_eating (
    day_without_eating_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    day_without_eating INT,
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_species_weight_loss (
    weight_loss_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    weight_loss_percent DOUBLE,
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_user (
    user_id VARCHAR(70) PRIMARY KEY,
    username TEXT,
    real_name TEXT,
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    pwd TEXT,
    email TEXT,
    numero TEXT
);


CREATE TABLE breeding_admin (
    admin_id VARCHAR(70) PRIMARY KEY,
    pwd TEXT
);

CREATE TABLE breeding_user_wallet (
    wallet_id VARCHAR(70) PRIMARY KEY,
    user_id VARCHAR(70),
    money DECIMAL(15,2),
    description TEXT,
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id)
);

CREATE TABLE breeding_user_animal_mvt (
    mvt_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    user_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    mvt_type VARCHAR(3), -- IN/OUT
    mvt_price DECIMAL(15,2),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id),
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id)
);

CREATE TABLE breeding_animal_day_without_eating (
    day_without_eating_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    day_without_eating INT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id)
);

CREATE TABLE breeding_animal_weight_loss (
    weight_loss_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    weight_loss_percent INT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id)
);

CREATE TABLE breeding_animal_weight (
    animal_weight_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    weight DECIMAL(7,2),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id)
);

CREATE TABLE breeding_animal_pic (
    pic_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    filename TEXT,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id)
);

CREATE TABLE breeding_animal_market_mvt (
    mvt_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    user_id VARCHAR(70),
    admin_id VARCHAR(70),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    mvt_type VARCHAR(3), -- IN/OUT
    mvt_price DECIMAL(15,2),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id),
    FOREIGN KEY (user_id) REFERENCES breeding_user(user_id),
    FOREIGN KEY (admin_id) REFERENCES breeding_admin(admin_id),
    CHECK (
        (admin_id IS NOT NULL AND user_id IS NULL) OR
        (admin_id IS NULL AND user_id IS NOT NULL)
    )
);

CREATE TABLE breeding_food (
    food_id VARCHAR(70) PRIMARY KEY,
    food_name TEXT
);

CREATE TABLE breeding_food_price (
    food_price_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    price DECIMAL(15,2),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_species_food_weight_ratio (
    sfwr_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    species_id VARCHAR(70),
    ratio DECIMAL(7,2),
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id)
);

CREATE TABLE breeding_animal_food_weight_ratio (
    sfwr_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    animal_id VARCHAR(70),
    ratio DECIMAL(7,2),
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id)
);

CREATE TABLE breeding_species_food (
    species_food_id VARCHAR(70) PRIMARY KEY,
    species_id VARCHAR(70),
    food_id VARCHAR(70),
    FOREIGN KEY (species_id) REFERENCES breeding_animal_species(species_id),
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_animal_food (
    animal_food_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    food_id VARCHAR(70),
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id),
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_animal_alimentation (
    alimentation_id VARCHAR(70) PRIMARY KEY,
    animal_id VARCHAR(70),
    food_id VARCHAR(70),
    food_weight DECIMAL(7,2),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (animal_id) REFERENCES breeding_animal(animal_id),
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_food_stock (
    food_stock_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    food_weight DECIMAL(7,2),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);

CREATE TABLE breeding_food_market_stock (
    food_market_stock_id VARCHAR(70) PRIMARY KEY,
    food_id VARCHAR(70),
    food_weight DECIMAL(7,2),
    insert_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (food_id) REFERENCES breeding_food(food_id)
);
