create database Dulceria;
use Dulceria;

CREATE TABLE mainlogin (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) CHARACTER SET latin1 NOT NULL,
  email varchar(50) CHARACTER SET latin1 NOT NULL,
  password varchar(20) CHARACTER SET latin1 NOT NULL,
  role varchar(50) CHARACTER SET latin1 NOT NULL
);

describe mainlogin;

INSERT INTO `mainlogin` (`username`, `email`, `password`, `role`) VALUES
('Gisela', 'gise@admin.com', '123456', 'admin'),
('diego', 'diego@personal.com', '123456', 'personal'),
('Hugo Montes de Oca Martínez',  'hugo@usuarios.com', '123456', 'usuarios');

CREATE TABLE productos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(255) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	precioVenta DECIMAL(5, 2) NOT NULL,
	precioCompra DECIMAL(5, 2) NOT NULL,
	existencia DECIMAL(5, 2) NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total DECIMAL(7,2),
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO productos(id, codigo, descripcion, precioVenta, precioCompra, existencia) 
VALUES
(1, '1', 'Galletas chokis', 15, 10, 100),
(2, '2', 'Mermelada de fresa', 80, 65, 100),
(3, '3', 'Aceite', 20, 18, 100),
(4, '4', 'Palomitas de maíz', 15, 12, 100),
(5, '5', 'Doritos', 8, 5, 100);

# Correcto
