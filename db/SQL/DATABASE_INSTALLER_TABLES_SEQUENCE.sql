CREATE SEQUENCE stations_status_list_id_sequence;
CREATE TABLE stations_status_list(
    id INTEGER NOT NULL DEFAULT NEXTVAL('stations_status_list_id_sequence'),
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    CONSTRAINT station_stations_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT stations_status_list_name_unique
        UNIQUE(name)
);

CREATE SEQUENCE package_status_list_id_sequence;
CREATE TABLE package_status_list(
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_status_list_id_sequence'),
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    CONSTRAINT package_statys_list_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE roles_id_sequence;
CREATE TABLE roles(
    id INTEGER NOT NULL DEFAULT NEXTVAL('roles_id_sequence'),
    description VARCHAR(255) NOT NULL,
    CONSTRAINT roles_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE rights_id_sequence;
CREATE TABLE rights(
    id INTEGER NOT NULL DEFAULT NEXTVAL('rights_id_sequence'),
    description VARCHAR(255) NOT NULL,
    CONSTRAINT rights_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE description_list_id_sequence;
CREATE TABLE description_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('description_list_id_sequence'),
    description VARCHAR(255) NOT NULL,
    CONSTRAINT description_list_description_unique
        UNIQUE (description),
    CONSTRAINT description_list_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE currency_list_id_sequence;
CREATE TABLE currency_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('currency_list_id_sequence'),
    full_name VARCHAR(255) NOT NULL,
    short_name VARCHAR(5) NOT NULL,
    date_on_add DATE NOT NULL,
    date_on_edit DATE DEFAULT NULL,
    CONSTRAINT currency_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT currency_list_full_name_unique
        UNIQUE(full_name),
    CONSTRAINT currency_list_short_name_unique
        UNIQUE(short_name)
);

CREATE SEQUENCE comments_list_id_sequence;
CREATE TABLE comments_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('comments_list_id_sequence'),
    comment TEXT NOT NULL,
    CONSTRAINT comments_list_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE units_list_id_sequence;
CREATE TABLE units_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('units_list_id_sequence'),
    full_name VARCHAR(255) NOT NULL,
    short_name VARCHAR(5) NOT NULL,
    date_on_add DATE NOT NULL,
    date_on_edit DATE DEFAULT NULL,
    CONSTRAINT units_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT units_list_full_name_unique
        UNIQUE(full_name),
    CONSTRAINT units_list_short_name_unique
        UNIQUE(short_name)
);

CREATE SEQUENCE countries_list_id_sequence;
CREATE TABLE countries_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('countries_list_id_sequence'),
    name VARCHAR(255),
    CONSTRAINT countries_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT countries_list_name_unique
        UNIQUE (name)
);

CREATE SEQUENCE role_right_id_sequence;
CREATE TABLE role_right(
    id INTEGER NOT NULL DEFAULT NEXTVAL('role_right_id_sequence'),
    role_id INTEGER NOT NULL,
    right_id INTEGER NOT NULL,
    CONSTRAINT role_right_primary_key
        PRIMARY KEY (id),
    CONSTRAINT role_right_role_id FOREIGN KEY (role_id)
        REFERENCES roles(id),
    CONSTRAINT role_right_rights_id FOREIGN KEY (right_id)
        REFERENCES rights(id)
);

CREATE SEQUENCE users_id_sequence;
CREATE TABLE users(
    id INTEGER NOT NULL DEFAULT NEXTVAL('users_id_sequence'),
    role_id INTEGER NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NULL DEFAULT NULL,
    date_on_add DATE NOT NULL,
    date_on_last_edit DATE NOT NULL,
    date_on_last_login DATE NOT NULL,
    date_on_delete DATE NULL DEFAULT NULL,
    date_on_last_action DATE NOT NULL,
    e_mail VARCHAR(255) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    blocked BOOLEAN NOT NULL,
    CONSTRAINT users_e_mail_unique
        UNIQUE (e_mail),
    CONSTRAINT users_primary_key
        PRIMARY KEY (id),
    CONSTRAINT users_role_id FOREIGN KEY (role_id)
        REFERENCES roles(id)
);

CREATE SEQUENCE package_id_sequence;
CREATE TABLE package (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_id_sequence'),
    sender_full_name VARCHAR(255) NOT NULL,
    sender_full_address VARCHAR(255) NOT NULL,
    sender_country_id INTEGER NOT NULL,
    recipient_full_name VARCHAR(255) NOT NULL,
    recipient_full_address VARCHAR(255) NOT NULL,
    recipient_country_id INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    date_on_delete DATE NULL DEFAULT NULL,
    date_on_reception DATE NOT NULL,
    CONSTRAINT package_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_sender_country_id FOREIGN KEY (sender_country_id)
        REFERENCES countries_list(id),
    CONSTRAINT package_recipient_country_id FOREIGN KEY (recipient_country_id)
        REFERENCES countries_list(id)
);

CREATE SEQUENCE stations_list_id_sequence;
CREATE TABLE stations_list(
    id INTEGER NOT NULL DEFAULT NEXTVAL('stations_list_id_sequence'),
    full_name VARCHAR(255) NOT NULL,
    full_name_en VARCHAR(255) NOT NULL,
    station_code INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    date_on_last_edit DATE NOT NULL,
    full_address VARCHAR(255) NOT NULL,
    full_address_en VARCHAR(255) NOT NULL,
    longitude REAL NOT NULL,
    width REAL NOT NULL,
    country_id INTEGER NOT NULL,
    station_status_id INTEGER NOT NULL,
    branch_office INTEGER NOT NULL,
    airport VARCHAR(255) NULL DEFAULT NULL,
    CONSTRAINT stations_list_full_name_unique
        UNIQUE (full_name),
    CONSTRAINT stations_list_full_name_en_unique
        UNIQUE (full_name_en),
    CONSTRAINT stations_list_full_address_unique
        UNIQUE (full_address),
    CONSTRAINT stations_list_full_address_en_unique
        UNIQUE (full_address_en),
    CONSTRAINT stations_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT stations_list_country_id FOREIGN KEY (country_id)
        REFERENCES countries_list(id),
    CONSTRAINT stations_list_station_status_id FOREIGN KEY (station_status_id)
        REFERENCES stations_status_list(id)
);

CREATE SEQUENCE home_transport_documents_id_sequence;
CREATE TABLE home_transport_documents (
    id INTEGER NOT NULL DEFAULT NEXTVAL('home_transport_documents_id_sequence'),
    package_id INTEGER NOT NULL,
    CONSTRAINT home_transport_documents_primary_key
        PRIMARY KEY (id),
    CONSTRAINT home_transport_document_package_id FOREIGN KEY (package_id)
        REFERENCES package(id)
);

CREATE SEQUENCE package_contents_id_sequence;
CREATE TABLE package_contents (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_id_sequence'),
    package_id INTEGER NOT NULL,
    content_type BOOLEAN NOT NULL,
    description VARCHAR(255) NOT NULL,
    place_count INTEGER NOT NULL,
    full_weight REAL NOT NULL,
    content_price REAL NULL DEFAULT NULL,
    currency_id INTEGER NULL DEFAULT NULL,
    comment_id INTEGER NULL DEFAULT NULL,
    CONSTRAINT package_contents_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_package_id FOREIGN KEY (package_id)
        REFERENCES package(id),
    CONSTRAINT package_contents_currency_id FOREIGN KEY (currency_id)
        REFERENCES currency_list(id) ON DELETE SET NULL,
    CONSTRAINT package_contents_comment_id FOREIGN KEY (comment_id)
        REFERENCES comments_list(id) ON DELETE SET NULL
);

CREATE SEQUENCE package_contents_place_id_sequence;
CREATE TABLE package_contents_place (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_place_id_sequence'),
    package_contents_id INTEGER NOT NULL,
    place_number INTEGER NOT NULL,
    length REAL NOT NULL,
    width REAL NOT NULL,
    height REAL NOT NULL,
    units_id INTEGER NOT NULL,
    CONSTRAINT package_contents_place_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_place_package_contents_id FOREIGN KEY (package_contents_id)
        REFERENCES package_contents(id),
    CONSTRAINT package_contents_place_units_id FOREIGN KEY (units_id)
        REFERENCES units_list(id)
);

CREATE SEQUENCE package_contents_place_attachment_id_sequence;
CREATE TABLE package_contents_place_attachment (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_place_attachment_id_sequence'),
    package_contents_place_id INTEGER NOT NULL,
    attachment_number INTEGER NOT NULL,
    description VARCHAR(255) NOT NULL,
    unit_count INTEGER NOT NULL,
    units_id INTEGER NOT NULL,
    unit_price REAL NOT NULL,
    CONSTRAINT package_contents_place_attachment_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_place_attachment_units_id FOREIGN KEY (units_id)
        REFERENCES units_list(id),
    CONSTRAINT package_contents_place_attachment_package_contents_place_id FOREIGN KEY (package_contents_place_id)
        REFERENCES package_contents_place(id)
);

CREATE SEQUENCE package_transport_history_id_sequence;
CREATE TABLE package_transport_history(
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_transport_history_id_sequence'),
    package_id INTEGER NOT NULL,
    station_id INTEGER NULL DEFAULT NULL,
    status_id INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    stored BOOLEAN NOT NULL,
    user_id INTEGER NOT NULL,
    user_courier_id INTEGER NULL DEFAULT NULL,
    CONSTRAINT package_transport_history_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_transport_history_package_id FOREIGN KEY (package_id)
        REFERENCES package(id),
    CONSTRAINT package_transport_history_station_id FOREIGN KEY (station_id)
        REFERENCES stations_list(id),
    CONSTRAINT package_transport_history_status_id FOREIGN KEY (status_id)
        REFERENCES package_status_list(id),
    CONSTRAINT package_transport_history_user_id FOREIGN KEY (user_id)
        REFERENCES users(id),
    CONSTRAINT package_transport_history_user_courier_id FOREIGN KEY (user_courier_id)
        REFERENCES users(id)
);

CREATE SEQUENCE message_id_sequence;
CREATE TABLE message(
    id INTEGER NOT NULL DEFAULT NEXTVAL('message_id_sequence'),
    sender_user_id INTEGER NOT NULL,
    post_viewed BOOLEAN NOT NULL,
    theme VARCHAR(255) NOT NULL,
    message_text TEXT NOT NULL,
    CONSTRAINT message_primary_key
        PRIMARY KEY (id),
    CONSTRAINT message_sender_user_id FOREIGN KEY (sender_user_id)
        REFERENCES users(id)
);

CREATE SEQUENCE users_message_id_sequence;
CREATE TABLE users_message(
    id INTEGER NOT NULL DEFAULT NEXTVAL('users_message_id_sequence'),
    recipient_user_id INTEGER NOT NULL,
    message_id INTEGER NOT NULL,
    CONSTRAINT users_message_primary_key
        PRIMARY KEY (id),
    CONSTRAINT users_message_recipient_user_id FOREIGN KEY (recipient_user_id)
        REFERENCES users(id),
    CONSTRAINT users_message_message_id FOREIGN KEY (message_id)
        REFERENCES message(id)
);

CREATE SEQUENCE persons_hot_list_id_sequence;
CREATE TABLE persons_hot_list (
    id INTEGER NOT NULL DEFAULT NEXTVAL('persons_hot_list_id_sequence'),
    persons_full_name VARCHAR(255) NOT NULL,
    persons_full_address VARCHAR(255) NOT NULL,
    person_country_id INTEGER NOT NULL,
    person_code INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    weight INTEGER NOT NULL,
    CONSTRAINT persons_hot_list_person_code_unique
        UNIQUE (person_code),
    CONSTRAINT persons_hot_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT persons_hot_list_person_country_id FOREIGN KEY (person_country_id)
        REFERENCES countries_list(id)
);

CREATE TABLE persons_cold_list (
    id INTEGER NOT NULL,
    persons_full_name VARCHAR(255) NOT NULL,
    persons_full_address VARCHAR(255) NOT NULL,
    person_country_id INTEGER NOT NULL,
    person_code INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    weight INTEGER NOT NULL,
    CONSTRAINT persons_cold_list_person_code_unique
        UNIQUE (person_code),
    CONSTRAINT persons_cold_list_primary_key
        PRIMARY KEY (id),
    CONSTRAINT persons_cold_list_person_country_id FOREIGN KEY (person_country_id)
        REFERENCES countries_list(id)
);

CREATE SEQUENCE package_vcs_id_sequence;
CREATE TABLE package_vcs(
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_vcs_id_sequence'),
    vcs_date DATE NOT NULL,
    user_id INTEGER NOT NULL,
    package_id INTEGER NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    CONSTRAINT package_vcs__primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_vcs_user_id FOREIGN KEY (user_id)
        REFERENCES users(id),
    CONSTRAINT package_vcs_package_id FOREIGN KEY (package_id)
        REFERENCES package(id)
);

CREATE SEQUENCE package_edit_id_sequence;
CREATE TABLE package_edit (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_edit_id_sequence'),
    package_vcs_id INTEGER NOT NULL,
    sender_full_name VARCHAR(255) NOT NULL,
    sender_full_address VARCHAR(255) NOT NULL,
    sender_country_id INTEGER NOT NULL,
    recipient_full_name VARCHAR(255) NOT NULL,
    recipient_full_address VARCHAR(255) NOT NULL,
    recipient_country_id INTEGER NOT NULL,
    date_on_reception DATE NOT NULL,
    CONSTRAINT package_edit_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_edit_package_vsc_id FOREIGN KEY (package_vcs_id)
        REFERENCES package_vcs(id),
    CONSTRAINT package_edit_sender_country_id FOREIGN KEY (sender_country_id)
        REFERENCES countries_list(id),
    CONSTRAINT package_edit_recipient_country_id FOREIGN KEY (recipient_country_id)
        REFERENCES countries_list(id)
);

CREATE SEQUENCE package_contents_edit_id_sequence;
CREATE TABLE package_contents_edit (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_edit_id_sequence'),
    package_edit_id INTEGER NOT NULL,
    content_type BOOLEAN NOT NULL,
    description VARCHAR(255) NOT NULL,
    place_count INTEGER NOT NULL,
    full_weight REAL NOT NULL,
    content_price REAL NULL DEFAULT NULL,
    currency_id INTEGER NULL DEFAULT NULL,
    comment_id INTEGER NULL DEFAULT NULL,
    CONSTRAINT package_contents_edit_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_edit_package_edit_id FOREIGN KEY (package_edit_id)
        REFERENCES package_edit(id),
    CONSTRAINT package_contents_edit_currency_id FOREIGN KEY (currency_id)
        REFERENCES currency_list(id) ON DELETE SET NULL,
    CONSTRAINT package_contents_edit_comment_id FOREIGN KEY (comment_id)
        REFERENCES comments_list(id) ON DELETE SET NULL
);

CREATE SEQUENCE package_contents_place_edit_id_sequence;
CREATE TABLE package_contents_place_edit (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_place_edit_id_sequence'),
    package_contents_edit_id INTEGER NOT NULL,
    place_number INTEGER NOT NULL,
    length REAL NOT NULL,
    width REAL NOT NULL,
    height REAL NOT NULL,
    units_id INTEGER NOT NULL,
    CONSTRAINT package_contents_place_edit_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_place_edit_package_contents_edit_id FOREIGN KEY (package_contents_edit_id)
        REFERENCES package_contents_edit(id)
);

CREATE SEQUENCE package_contents_place_attachment_edit_id_sequence;
CREATE TABLE package_contents_place_attachment_edit (
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_contents_place_attachment_edit_id_sequence'),
    package_contents_place_edit_id INTEGER NOT NULL,
    attachment_number INTEGER NOT NULL,
    description VARCHAR(255) NOT NULL,
    unit_count INTEGER NOT NULL,
    units_id INTEGER NOT NULL,
    unit_price REAL NOT NULL,
    CONSTRAINT package_edit_contents_place_attachment_history_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_contents_place_attachment_edit_package_contents_place FOREIGN KEY (package_contents_place_edit_id)
        REFERENCES package_contents_place_edit(id),
    CONSTRAINT package_edit_contents_place_attachment_history_units_id FOREIGN KEY (units_id)
        REFERENCES units_list(id)
);

CREATE SEQUENCE registry_type_id_sequence;
CREATE TABLE registry_type(
    id INTEGER NOT NULL DEFAULT NEXTVAL('registry_type_id_sequence'),
    name VARCHAR(255) NOT NULL,
    CONSTRAINT registry_type_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE registry_id_sequence;
CREATE TABLE registry(
    id INTEGER NOT NULL DEFAULT NEXTVAL('registry_id_sequence'),
    registry_type_id INTEGER NOT NULL,
    date_on_add DATE NOT NULL,
    number_in_year INTEGER NOT NULL,
    station_id INTEGER NOT NULL,
    station_destination_id INTEGER NOT NULL,
    CONSTRAINT registry_primary_key
        PRIMARY KEY (id),
    CONSTRAINT registry_registry_type_id FOREIGN KEY (registry_type_id)
        REFERENCES registry_type(id),
    CONSTRAINT registry_station_id FOREIGN KEY (station_id)
        REFERENCES stations_list(id),
    CONSTRAINT registry_station_destination_id FOREIGN KEY (station_destination_id)
        REFERENCES stations_list(id)
);

CREATE SEQUENCE package_in_registry_id_sequence;
CREATE TABLE package_in_registry(
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_in_registry_id_sequence'),
    registry_id INTEGER NOT NULL,
    package_id INTEGER NOT NULL,
    CONSTRAINT package_in_registry_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_in_registry_registry_id FOREIGN KEY (registry_id)
        REFERENCES registry(id),
    CONSTRAINT package_in_registry_package_id FOREIGN KEY (package_id)
        REFERENCES package(id)
);

CREATE SEQUENCE transport_types_id_sequence;
CREATE TABLE transport_types(
    id INTEGER NOT NULL DEFAULT NEXTVAL('transport_types_id_sequence'),
    transport_type_name VARCHAR(255) NOT NULL,
    CONSTRAINT transport_types_primary_key
        PRIMARY KEY (id)
);

CREATE SEQUENCE manifests_id_sequence;
CREATE TABLE manifests(
    id INTEGER NOT NULL DEFAULT NEXTVAL('manifests_id_sequence'),
    date_on_add DATE NOT NULL,
    number_in_year INTEGER NOT NULL,
    station_id INTEGER NOT NULL,
    station_destination_id INTEGER NOT NULL,
    transport_type_id INTEGER NOT NULL,
    flight_number INTEGER NULL DEFAULT NULL,
    waybill VARCHAR(255) NOT NULL,
    CONSTRAINT manifests_primary_key
        PRIMARY KEY (id),
    CONSTRAINT manifests_station_id FOREIGN KEY (station_id)
        REFERENCES stations_list(id),
    CONSTRAINT manifests_station_destination_id FOREIGN KEY (station_destination_id)
        REFERENCES stations_list(id),
    CONSTRAINT manifests_transport_type_id FOREIGN KEY (transport_type_id)
        REFERENCES transport_types(id)
);

CREATE SEQUENCE package_in_manifest_id_sequence;
CREATE TABLE package_in_manifest(
    id INTEGER NOT NULL DEFAULT NEXTVAL('package_in_manifest_id_sequence'),
    manifest_id INTEGER NOT NULL,
    package_id INTEGER NOT NULL,
    CONSTRAINT package_in_manifest_primary_key
        PRIMARY KEY (id),
    CONSTRAINT package_in_manifest_manifest_id FOREIGN KEY (manifest_id)
        REFERENCES manifests(id),
    CONSTRAINT package_in_manifest_package_id FOREIGN KEY (package_id)
        REFERENCES package(id)
);