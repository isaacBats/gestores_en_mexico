INSERT INTO transactions (id_public, id_transaction_type, id_contry, code_product, name, slug, h_copies, date_created) VALUES
    ('e655c7f2754e0af21207be3851049dad', 3, 142, 'APOS_ACT_USA', 'Apostilla de documentos U.S.A', 'apostilla-usa', 0, NOW());

-- Para generar un nuevo id publico
-- <?php echo md5(uniqid());

-- Agregarlo a la lista de formularios
INSERT INTO forms (id_transaction, title, description, createdAt, updatedAt) SELECT id, name, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', now(), now() FROM transactions WHERE code_product = 'APOS_ACT_USA' LIMIT 1;

INSERT INTO prices (id_state, id_transaction, cost, copy_cost, copy_send, delivery_min, delivery_max, create_at) VALUES
-- Precios Apostilla USA
    (1,31,0,0,0,3,6, NOW()),
    (2,31,0,0,0,3,6, NOW()),
    (3,31,0,0,0,3,7, NOW()),
    (4,31,0,0,0,3,5, NOW()),
    (7,31,0,0,0,3,7, NOW()),
    (8,31,0,0,0,3,7, NOW()),
    (6,31,0,0,0,3,5, NOW()),
    (5,31,0,0,0,3,5, NOW()),
    (9,31,0,0,0,3,4, NOW()),
    (10,31,0,0,0,3,6, NOW()),
    (15,31,0,0,0,9,12, NOW()),
    (11,31,0,0,0,3,5, NOW()),
    (12,31,0,0,0,3,5, NOW()),
    (13,31,0,0,0,3,5, NOW()),
    (14,31,0,0,0,3,5, NOW()),
    (16,31,0,0,0,3,7, NOW()),
    (17,31,0,0,0,3,5, NOW()),
    (18,31,0,0,0,3,5, NOW()),
    (19,31,0,0,0,3,6, NOW()),
    (20,31,0,0,0,3,7, NOW()),
    (21,31,0,0,0,3,7, NOW()),
    (22,31,0,0,0,3,6, NOW()),
    (23,31,0,0,0,3,6, NOW()),
    (24,31,0,0,0,3,6, NOW()),
    (25,31,0,0,0,3,7, NOW()),
    (26,31,0,0,0,3,5, NOW()),
    (27,31,0,0,0,3,7, NOW()),
    (28,31,0,0,0,3,6, NOW()),
    (29,31,0,0,0,3,7, NOW()),
    (30,31,0,0,0,7,9, NOW()),
    (31,31,0,0,0,3,7, NOW()),
    (32,31,0,0,0,3,7, NOW());