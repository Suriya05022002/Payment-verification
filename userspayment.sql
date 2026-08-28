DROP DATABASE IF EXISTS userspayment;

CREATE DATABASE userspayment
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE userspayment;

CREATE TABLE members (

    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    /* =========================
       STEP 1 - PERSONAL DETAILS
    ========================= */

    full_name VARCHAR(255) NOT NULL,

    whatsapp_number VARCHAR(20) NOT NULL,

    email VARCHAR(255) NOT NULL,

    dob DATE NOT NULL,

    linkedin_url VARCHAR(500) NOT NULL,

    current_city VARCHAR(100) NOT NULL,

    mother_tongue VARCHAR(50) NOT NULL,

    gender VARCHAR(20) NOT NULL,

    event_location VARCHAR(100) NOT NULL,

    permanent_address TEXT NOT NULL,

    current_address TEXT NOT NULL,

    github_url VARCHAR(500) DEFAULT NULL,


    /* =========================
       STEP 2 - POSITION & ROLE
    ========================= */

    target_category VARCHAR(255) NOT NULL,

    current_org VARCHAR(255) NOT NULL,

    `current_role` VARCHAR(255) NOT NULL,


    /* =========================
       STEP 3 - EDUCATION
    ========================= */

    highest_qualification VARCHAR(100) NOT NULL,

    ug_degree VARCHAR(100) NOT NULL,

    ug_branch VARCHAR(255) NOT NULL,

    pg_degree VARCHAR(100) DEFAULT NULL,

    pg_branch VARCHAR(255) DEFAULT NULL,


    /* =========================
       STEP 4 - SKILLS & OBJECTIVES
    ========================= */

    tech_skills TEXT NOT NULL,

    areas_interest TEXT NOT NULL,

    join_reason TEXT NOT NULL,


    /* =========================
       STEP 5 - DOCUMENTS
    ========================= */

    id_proof VARCHAR(500) DEFAULT NULL,

    photo VARCHAR(500) DEFAULT NULL,


    /* =========================
       STEP 6 - PAYMENT
    ========================= */

    payment_done VARCHAR(10) NOT NULL DEFAULT 'No',

    transaction_id VARCHAR(255) DEFAULT NULL,

    payment_proof VARCHAR(500) DEFAULT NULL,


    /* =========================
       STEP 7 - DECLARATIONS
    ========================= */

    founding_member TINYINT(1) NOT NULL DEFAULT 0,

    lifetime_access TINYINT(1) NOT NULL DEFAULT 0,

    transparent_guidelines TINYINT(1) NOT NULL DEFAULT 0,

    consent TINYINT(1) NOT NULL DEFAULT 0,


    /* =========================
       TIMESTAMP
    ========================= */

    created_at TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP,


    /* =========================
       UNIQUE KEYS
    ========================= */

    UNIQUE KEY uq_whatsapp_number
        (whatsapp_number),

    UNIQUE KEY uq_email
        (email),

    UNIQUE KEY uq_transaction_id
        (transaction_id)

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;