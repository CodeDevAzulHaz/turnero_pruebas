# turnero_pruebas


para usar la conexion SSH se debe clonar el repositorio usando este link:

git clone git@github.com:CodeDevAzulHaz/turnero_pruebas.git



git config --global core.editor 'vim'





| Id_orden | Fecha    | Id_cliente 	| Nom_cliente | Estado   	| Num_art  | nom_art 	| cant 	| Precio   |
|----------|----------|-------------|-------------|-----------|----------|----------|-------|----------|
| 2301  	 | 23/02/11 | 101   			| Martin 			| Caracas  	|	3786		 | Red 			| 3 		| 35.00 	 |
| 2301  	 | 23/02/11 | 101     		| Martin 			| Caracas  	|	4011		 | Raqueta 	| 6 		| 65.00 	 |
| 2301  	 | 23/02/11 | 101  				| Martin 			| Caracas  	|	9132		 | Paq-3 		| 8 		| 4.75 		 |
| 2302  	 | 25/02/11 | 107  				| Hernan 			| Coro 			| 5794		 | Paq-6 		| 4 		| 5.00 		 |
| 2303  	 | 27/02/11 | 110  				| Pedro 			| Maraca 		|	4011		 | Raqueta 	| 2  		| 65.00 	 |
| 2304  	 | 27/02/11 | 110  				| Pedro 			| Maraca 		|	3141		 | Funda 		| 2 		| 10.00 	 |



Paso 1: Aplicar la Primera Forma Normal (1NF)
- todos los valores en una tabla deben ser atómicos (indivisibles) y no existir redundancias.

Paso 2: Aplicar la Segunda Forma Normal (2NF)
- todos los atributos no clave sean siempre dependientes de la primary key. 
- después de aplicar 2NF , creamos tres tablas:

Clientes
Órdenes
Artículos
Detalles de Órdenes

CREATE TABLE Clients (
    Id_cliente INT PRIMARY KEY,
    Nom_cliente VARCHAR(100),
    Ciudad VARCHAR(100)  -- Assuming you may want to keep the city
);

CREATE TABLE Orders (
    Id_orden INT PRIMARY KEY,
    Fecha DATE,
    Id_cliente INT,
    Estado VARCHAR(50),
    FOREIGN KEY (Id_cliente) REFERENCES Clients(Id_cliente)
);

CREATE TABLE Products (
    Num_art INT PRIMARY KEY,
    nom_art VARCHAR(100),
    Precio DECIMAL(10, 2)
);

CREATE TABLE Order_Details (
    Id_orden INT,
    Num_art INT,
    cant INT,
    PRIMARY KEY (Id_orden, Num_art),
    FOREIGN KEY (Id_orden) REFERENCES Orders(Id_orden),
    FOREIGN KEY (Num_art) REFERENCES Products(Num_art)
);



Paso 3: Aplicar la Tercera Forma Normal (3NF)
- no debe haber dependencias transitivas; es decir, un atributo no clave no debe depender de otro atributo no clave.

Análisis de 3NF :

En la tabla de Clientes, Nom_cliente y Ciudad dependen directamente de Id_cliente.
En la tabla de Órdenes, todos los atributos dependen directamente de Id_orden.
En la tabla de Artículos, nom_art y Precio dependen directamente de Num_art.
En la tabla de Detalles de Órdenes, cant depende de la combinación de Id_orden y Num_art.
No hay dependencias transitivas en estas tablas, por lo que cumplen con 3NF.



Common Conventions in PHP:
Variables: use snake_case (e.g., $my_variable_name)
Functions: functiones public -> use snake_case  (e.g., $my_variable_name)  || para funciones privadas -> camelCase (e.g., function myFunctionName())
Classes:	 PascalCase (e.g., class AdminPanel).

Para crear tablas en DB
columnas: usar camelCase (e.g., userId, productName, userEmail )
tablas: use snake_case (e.g., users_email, users_config)

idOrden	fecha	idCliente	nomCliente	estado	numArt	nomArt	cant	precio