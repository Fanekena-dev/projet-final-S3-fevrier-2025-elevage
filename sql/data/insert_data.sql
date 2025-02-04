INSERT INTO breeding_user ( user_id, username, real_name, insert_date, pwd, email, numero) VALUES
('user1', 'Jean', 'Jean Be loha', '2025-03-02', '123', 'jean@gmail.com', '12345'),
('user2', 'Koto', 'Koto Be loha', '2025-03-02', '123', 'koto@gmail.com', '12345');

-- Insertion dans breeding_admin
INSERT INTO breeding_admin (admin_id, pwd) VALUES
('admin01', 'adminpassword1'),
('admin02', 'adminpassword2');


-- Insertion dans breeding_animal_species
INSERT INTO breeding_animal_species (species_id, species_name) VALUES
('s01', 'Vache'),
('s02', 'Cheval'),
('s03', 'Mouton');

-- Insertion dans breeding_animal
INSERT INTO breeding_animal (animal_id, animal_name, animal_species, description) VALUES
('a01', 'Bessie', 's01', 'Milky cow'),
('a02', 'Thunder', 's02', 'Fighting horse'),
('a03', 'Dolly', 's03', 'Hairy sheep'),
('a04', 'Vanessa', 's01', 'A cow like others'),
('a05', 'Besso', 's01', 'Milky cow');

INSERT INTO breeding_animal_pic (pic_id, animal_id, filename) VALUES
('p01', 'a01', 'placeholder.png'),
('p02', 'a01', 'placeholder.png'),
('p03', 'a01', 'placeholder.png'),
('p04', 'a01', 'placeholder.png'),
('p05', 'a01', 'placeholder.png'),

('p06', 'a02', 'placeholder.png'),
('p07', 'a02', 'placeholder.png'),
('p08', 'a02', 'placeholder.png'),
('p09', 'a02', 'placeholder.png'),

('p010', 'a03', 'placeholder.png'),
('p011', 'a03', 'placeholder.png'),
('p012', 'a03', 'placeholder.png'),

('p013', 'a04', 'placeholder.png'),
('p014', 'a04', 'placeholder.png'),

('p015', 'a05', 'placeholder.png');


-- Insertion dans breeding_species_min_weight_sale
INSERT INTO breeding_species_min_weight_sale (min_sale_weight_id, species_id, min_sales_weight) VALUES
('mw01', 's01', 300.00),
('mw02', 's02', 500.00),
('mw03', 's03', 50.00);

-- Insertion dans breeding_species_max_weight
INSERT INTO breeding_species_max_weight (max_weight_id, species_id, max_weight) VALUES
('mwmax01', 's01', 800.00),
('mwmax02', 's02', 1200.00),
('mwmax03', 's03', 100.00);

-- Insertion dans breeding_species_selling_price
INSERT INTO breeding_species_selling_price (selling_price_id, species_id, selling_price) VALUES
('sp01', 's01', 1500.00),
('sp02', 's02', 2000.00),
('sp03', 's03', 300.00);

-- Insertion dans breeding_species_day_without_eating
INSERT INTO breeding_species_day_without_eating (day_without_eating_id, species_id, day_without_eating) VALUES
('dwe01', 's01', 3),
('dwe02', 's02', 5),
('dwe03', 's03', 2);

-- Insertion dans breeding_species_weight_loss
INSERT INTO breeding_species_weight_loss (weight_loss_id, species_id, weight_loss_percent) VALUES
('wl01', 's01', 5.00),
('wl02', 's02', 3.00),
('wl03', 's03', 2.00);

-- Insertion dans breeding_user
INSERT INTO breeding_user (user_id, username, real_name, pwd, email, numero) VALUES
('u01', 'user1', 'John Doe', 'password1', 'john.doe@example.com', '123456789'),
('u02', 'user2', 'Jane Smith', 'password2', 'jane.smith@example.com', '987654321');


-- Insertion dans breeding_animal_market_mvt (les animaux sont ajoutés au marché avec le type 'IN')
INSERT INTO breeding_animal_market_mvt (mvt_id, animal_id, user_id, admin_id, mvt_type, mvt_price) VALUES
('mvt01', 'a01', NULL, 'admin01', 'IN', 1500.00),
('mvt02', 'a02', NULL , 'admin01', 'IN', 2000.00),
('mvt03', 'a03', NULL , 'admin01', 'IN', 2000.00);


-- Insertion dans breeding_food
INSERT INTO breeding_food (food_id, food_name) VALUES
('f01', 'Herbe'),
('f02', 'Granulés');

-- Insertion dans breeding_food_price
INSERT INTO breeding_food_price (food_price_id, food_id, price) VALUES
('fp01', 'f01', 1.00),
('fp02', 'f02', 2.00);

-- Insertion dans breeding_animal_food
INSERT INTO breeding_animal_food (animal_food_id, animal_id, food_id) VALUES
('af01', 'a01', 'f01'),
('af02', 'a02', 'f02');

-- Insertion des données dans breeding_animal_weight pour chaque animal
INSERT INTO breeding_animal_weight (animal_id, weight) VALUES
('a01', 250.00),
('a02', 300.00),
('a03', 500.00);

-- Insert movements for user1
INSERT INTO breeding_user_animal_mvt (mvt_id, animal_id, user_id, insert_date, mvt_type, mvt_price)
VALUES
('MVT001', 'a01', 'user1', CURRENT_DATE, 'IN', 200.00),  -- User1 acquiring an animal
    ('MVT004', 'a01', 'user1', CURRENT_DATE, 'IN', 350.00),
    ('MVT002', 'a02', 'user1', CURRENT_DATE, 'IN', 450.00),  -- User1 selling an animal
    ('MVT003', 'a03', 'user1', '2025-02-07', 'IN', 550.00),
    ('MVT005', 'a04', 'user1', '2025-02-08', 'IN', 650.00), 
    ('MVT006', 'a03', 'user1', '2025-02-08', 'OUT', 650.00),
    ('MVT007', 'a04', 'user1', '2025-02-09', 'OUT', 650.00);    