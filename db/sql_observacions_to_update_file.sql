-- update long direccion attribute from cliente
ALTER TABLE
    `clientes` CHANGE `direccion` `direccion` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;