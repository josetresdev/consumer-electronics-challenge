-- =========================================
-- DATABASE
-- =========================================

CREATE DATABASE IF NOT EXISTS hyundai_inventory
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE hyundai_inventory;

-- =========================================
-- USERS TABLE (Laravel compatible)
-- =========================================

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB;

-- =========================================
-- SANCTUM TOKENS
-- =========================================

CREATE TABLE personal_access_tokens (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tokenable_type VARCHAR(255) NOT NULL,
    tokenable_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    abilities TEXT NULL,
    last_used_at TIMESTAMP NULL DEFAULT NULL,
    expires_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_tokenable (tokenable_type, tokenable_id)
) ENGINE=InnoDB;

-- =========================================
-- PRODUCTS TABLE (Hyundai Appliances Inventory)
-- =========================================

CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    -- basic info
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    brand VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,

    -- business
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,

    -- traceability
    model VARCHAR(120) NOT NULL,
    batch VARCHAR(50) NOT NULL,

    -- manufacturing date (used for 18-month expiration rule)
    manufactured_at DATE NOT NULL,

    -- business status
    status ENUM('available', 'reserved', 'disposed') NOT NULL DEFAULT 'available',

    -- optional notes
    notes TEXT NULL,

    -- timestamps
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,

    -- indexes
    INDEX idx_model (model),
    INDEX idx_batch (batch),
    INDEX idx_status (status),
    INDEX idx_brand (brand),
    INDEX idx_category (category),
    INDEX idx_manufactured_at (manufactured_at),

    -- business rule: uniqueness per batch/model
    UNIQUE KEY unique_model_batch (model, batch)

) ENGINE=InnoDB;

-- =========================================
-- DATA SEED (Hyundai real-world-like products)
-- =========================================

INSERT INTO products (
    name,
    description,
    brand,
    category,
    price,
    stock,
    model,
    batch,
    manufactured_at,
    status,
    notes
) VALUES

-- =========================================
-- TVs (Hyundai LED Series)
-- =========================================

(
    'Hyundai Smart TV 32" HD',
    'Televisor LED compacto ideal para habitaciones pequeñas',
    'Hyundai',
    'Televisores',
    750000.00,
    12,
    'HYLED3234D',
    '2408',
    DATE_SUB(CURDATE(), INTERVAL 6 MONTH),
    'available',
    'Producto vigente en excelente estado'
),

(
    'Hyundai Smart TV 43" Full HD',
    'Televisor con conectividad smart y HDR básico',
    'Hyundai',
    'Televisores',
    1200000.00,
    8,
    'HYLED4335F',
    '2405',
    DATE_SUB(CURDATE(), INTERVAL 10 MONTH),
    'reserved',
    'Reservado para cliente corporativo'
),

-- =========================================
-- Refrigeration
-- =========================================

(
    'Hyundai Nevera No Frost 300L',
    'Refrigerador eficiente con tecnología inverter',
    'Hyundai',
    'Refrigeradores',
    2200000.00,
    5,
    'HYREF300IN',
    '2403',
    DATE_SUB(CURDATE(), INTERVAL 20 MONTH),
    'available',
    'Producto potencialmente vencido (revisar estado físico)'
),

(
    'Hyundai Congelador Horizontal 200L',
    'Congelador industrial de bajo consumo energético',
    'Hyundai',
    'Congeladores',
    1600000.00,
    7,
    'HYFROZ200X',
    '2402',
    DATE_SUB(CURDATE(), INTERVAL 8 MONTH),
    'reserved',
    'Reservado cliente retail'
),

-- =========================================
-- Washing Machines
-- =========================================

(
    'Hyundai Lavadora Digital 20Kg',
    'Lavadora industrial de alta eficiencia y bajo consumo',
    'Hyundai',
    'Lavadoras',
    1850000.00,
    6,
    'FILED5001OLO',
    '2402',
    DATE_SUB(CURDATE(), INTERVAL 22 MONTH),
    'available',
    'Lote antiguo - candidato a disposición'
),

-- =========================================
-- Microwaves
-- =========================================

(
    'Hyundai Microondas 30L Grill',
    'Microondas con grill y control digital táctil',
    'Hyundai',
    'Microondas',
    480000.00,
    15,
    'HYMIC30GRL',
    '2409',
    DATE_SUB(CURDATE(), INTERVAL 5 MONTH),
    'available',
    'Producto nuevo en inventario'
);

-- =========================================
-- USER SEED
-- =========================================

INSERT INTO users (name, email, password)
VALUES (
    'Jose',
    'jose@test.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9GJ7y1j3Gz5xR5Q5Q5Q5QG'
);