INSERT INTO transactions (id_public, id_transaction_type, id_contry, code_product, name, slug, h_copies, date_created) VALUES
    ('521e2ea81ffc172dbadc0bd17bc65221', 5, 142, 'SERV_DOC_TRAD', 'Traducciones Certificadas', 'traducciones-certificadas', 0, NOW()),
    ('4b09625e5765b7624318152558cf2cf1', 5, 142, 'SERV_DOC_TRAM', 'Tramites no listados', 'tramites-no-listados', 0, NOW());

-- Para generar un nuevo id publico
-- <?php echo md5(uniqid());

-- Agregarlo a la lista de formularios
INSERT INTO forms (id_transaction, title, description, createdAt, updatedAt) SELECT id, name, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', now(), now() FROM transactions WHERE code_product in ('SERV_DOC_TRAD', 'SERV_DOC_TRAM') LIMIT 2;

INSERT INTO prices (id_state, id_transaction, cost, copy_cost, copy_send, delivery_min, delivery_max, create_at) VALUES
-- Traducciones Certificadas
    (1,32,0,0,0,3,6, NOW()),
    (2,32,0,0,0,3,6, NOW()),
    (3,32,0,0,0,3,7, NOW()),
    (4,32,0,0,0,3,5, NOW()),
    (7,32,0,0,0,3,7, NOW()),
    (8,32,0,0,0,3,7, NOW()),
    (6,32,0,0,0,3,5, NOW()),
    (5,32,0,0,0,3,5, NOW()),
    (9,32,0,0,0,3,4, NOW()),
    (10,32,0,0,0,3,6, NOW()),
    (15,32,0,0,0,9,12, NOW()),
    (11,32,0,0,0,3,5, NOW()),
    (12,32,0,0,0,3,5, NOW()),
    (13,32,0,0,0,3,5, NOW()),
    (14,32,0,0,0,3,5, NOW()),
    (16,32,0,0,0,3,7, NOW()),
    (17,32,0,0,0,3,5, NOW()),
    (18,32,0,0,0,3,5, NOW()),
    (19,32,0,0,0,3,6, NOW()),
    (20,32,0,0,0,3,7, NOW()),
    (21,32,0,0,0,3,7, NOW()),
    (22,32,0,0,0,3,6, NOW()),
    (23,32,0,0,0,3,6, NOW()),
    (24,32,0,0,0,3,6, NOW()),
    (25,32,0,0,0,3,7, NOW()),
    (26,32,0,0,0,3,5, NOW()),
    (27,32,0,0,0,3,7, NOW()),
    (28,32,0,0,0,3,6, NOW()),
    (29,32,0,0,0,3,7, NOW()),
    (30,32,0,0,0,7,9, NOW()),
    (31,32,0,0,0,3,7, NOW()),
    (32,32,0,0,0,3,7, NOW()),
    -- Tramites no listados
    (1,33,0,0,0,3,6, NOW()),
    (2,33,0,0,0,3,6, NOW()),
    (3,33,0,0,0,3,7, NOW()),
    (4,33,0,0,0,3,5, NOW()),
    (7,33,0,0,0,3,7, NOW()),
    (8,33,0,0,0,3,7, NOW()),
    (6,33,0,0,0,3,5, NOW()),
    (5,33,0,0,0,3,5, NOW()),
    (9,33,0,0,0,3,4, NOW()),
    (10,33,0,0,0,3,6, NOW()),
    (15,33,0,0,0,9,12, NOW()),
    (11,33,0,0,0,3,5, NOW()),
    (12,33,0,0,0,3,5, NOW()),
    (13,33,0,0,0,3,5, NOW()),
    (14,33,0,0,0,3,5, NOW()),
    (16,33,0,0,0,3,7, NOW()),
    (17,33,0,0,0,3,5, NOW()),
    (18,33,0,0,0,3,5, NOW()),
    (19,33,0,0,0,3,6, NOW()),
    (20,33,0,0,0,3,7, NOW()),
    (21,33,0,0,0,3,7, NOW()),
    (22,33,0,0,0,3,6, NOW()),
    (23,33,0,0,0,3,6, NOW()),
    (24,33,0,0,0,3,6, NOW()),
    (25,33,0,0,0,3,7, NOW()),
    (26,33,0,0,0,3,5, NOW()),
    (27,33,0,0,0,3,7, NOW()),
    (28,33,0,0,0,3,6, NOW()),
    (29,33,0,0,0,3,7, NOW()),
    (30,33,0,0,0,7,9, NOW()),
    (31,33,0,0,0,3,7, NOW()),
    (32,33,0,0,0,3,7, NOW());