CREATE TYPE package_contents_place_attachment_type AS(
    description_value VARCHAR(255),
    unit_count_value INTEGER,
    units_id_value INTEGER,
    unit_price_value REAL
);

CREATE TYPE package_contents_place_type AS(
    length_value REAL,
    width_value REAL,
    height_value REAL,
    units_id_value INTEGER,
    package_contents_place_attachment package_contents_place_attachment_type[]
);

CREATE OR REPLACE FUNCTION package_add(
    sender_full_name_value VARCHAR(255),
    sender_full_address_value VARCHAR(255),
    sender_country_id_value INTEGER,
    recipient_full_name_value VARCHAR(255),
    recipient_full_address_value VARCHAR(255),
    recipient_country_id_value INTEGER,
    date_on_reception_value DATE DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    package_id INTEGER;
BEGIN
    DECLARE
        rec_date DATE;
        BEGIN
            IF(date_on_reception_value IS NULL) THEN
                rec_date := (SELECT CURRENT_DATE);
            ELSE
                rec_date := date_on_reception_value;    
            END IF;
            INSERT INTO package(
                sender_full_name,
                sender_full_address,
                sender_country_id,
                recipient_full_name,
                recipient_full_address,
                recipient_country_id,
                date_on_add,
                date_on_reception
            )
	    VALUES (
                sender_full_name_value,
                sender_full_address_value,
                sender_country_id_value,
                recipient_full_name_value,
                recipient_full_address_value,
                recipient_country_id_value,
                (SELECT CURRENT_DATE),
                rec_date
            ) RETURNING id INTO package_id;
        END;
        
    RETURN package_id;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_not_document_add(
    package_id_value INTEGER,
    description_value VARCHAR(255),
    place_count_value INTEGER,
    full_weight_value REAL,
    content_price_value REAL,
    currency_id_value INTEGER,
    comment_id_value INTEGER DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    contents_id INTEGER;
BEGIN
    INSERT INTO package_contents(
        package_id,
        description,
        place_count,
        full_weight,
        content_type,
        content_price,
        currency_id,
        comment_id
    )
    VALUES(
        package_id_value,
        description_value,
        place_count_value,
        full_weight_value,
        FALSE,
        content_price_value,
        currency_id_value,
        comment_id_value
    ) RETURNING id INTO contents_id;
    
    RETURN contents_id;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_document_add(
    package_id_value INTEGER,
    description_value VARCHAR(255),
    place_count_value INTEGER,
    full_weight_value REAL,
    currency_id_value INTEGER,
    comment_id_value INTEGER DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    contents_id INTEGER;
BEGIN
    INSERT INTO package_contents(
        package_id,
        description,
        place_count,
        full_weight,
        content_type,
        currency_id,
        comment_id
    )
    VALUES(
        package_id_value,
        description_value,
        place_count_value,
        full_weight_value,
        TRUE,
        currency_id_value,
        comment_id_value
    ) RETURNING id INTO contents_id;
    
    RETURN contents_id;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_place_add(
    package_contents_id_value INTEGER,
    length_value REAL,
    width_value REAL,
    height_value REAL,
    units_id_value INTEGER
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    place_id INTEGER;
BEGIN
    DECLARE
        max_num INTEGER;
        BEGIN
            SELECT MAX(place_number)
            INTO max_num
            FROM package_contents_place
            WHERE package_contents_id = package_contents_id_value;
            
            IF max_num IS NULL THEN
                max_num := 0;
            END IF;
                
            INSERT INTO package_contents_place(
                package_contents_id,
                place_number,
                length,
                width,
                height,
                units_id
            )
            VALUES(
                package_contents_id_value,
                max_num + 1,
                length_value,
                width_value,
                height_value,
                units_id_value
            ) RETURNING id INTO place_id;
        END;
        
    RETURN place_id;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_place_attachment_add(
    package_contents_place_id_value INTEGER,
    description_value VARCHAR(255),
    unit_count_value INTEGER,
    units_id_value INTEGER,
    unit_price_value REAL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    att_id INTEGER;
BEGIN
    DECLARE
        max_num INTEGER;
        BEGIN
            SELECT MAX(attachment_number)
            INTO max_num
            FROM package_contents_place_attachment
            WHERE package_contents_place_id = package_contents_place_id_value;
            
            IF max_num IS NULL THEN
                max_num := 0;
            END IF;
                
            INSERT INTO package_contents_place_attachment(
                package_contents_place_id,
                attachment_number,
                description,
                unit_count,
                units_id,
                unit_price
            )
            VALUES(
                package_contents_place_id_value,
                max_num + 1,
                description_value,
                unit_count_value,
                units_id_value,
                unit_price_value
            ) RETURNING id INTO att_id;
        END;
        
    RETURN att_id;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_place_attachment_array_add(
    package_contents_place_id_value INTEGER,
    arr IN package_contents_place_attachment_type[]
)
RETURNS BOOLEAN
LANGUAGE PLPGSQL AS $$
DECLARE
    rec_att package_contents_place_attachment_type;
BEGIN
    DECLARE
        max_num INTEGER;
        i INTEGER;
    BEGIN
        SELECT MAX(attachment_number)
        INTO max_num
        FROM package_contents_place_attachment
        WHERE package_contents_place_id = package_contents_place_id_value;
            
        IF max_num IS NULL THEN
            max_num := 0;
        END IF;
        
        i := max_num + 1;
        
        FOREACH rec_att IN ARRAY arr LOOP
            INSERT INTO package_contents_place_attachment(
                    package_contents_place_id,
                    attachment_number,
                    description,
                    unit_count,
                    units_id,
                    unit_price
                )
            VALUES(
                    package_contents_place_id_value,
                    i,
                    rec_att.description_value,
                    rec_att.unit_count_value,
                    rec_att.units_id_value,
                    rec_att.unit_price_value
            );
            i := i + 1;
        END LOOP;
    END;
    RETURN TRUE;
END;$$;

CREATE OR REPLACE FUNCTION package_contents_place_array_add(
    package_contents_id_value INTEGER,
    arr IN package_contents_place_type[]
)
RETURNS BOOLEAN
LANGUAGE PLPGSQL AS $$
DECLARE
    rec_contents package_contents_place_type;
BEGIN
    DECLARE
        max_num INTEGER;
        i INTEGER;
        current_id INTEGER;
    BEGIN
        SELECT MAX(place_number)
            INTO max_num
            FROM package_contents_place
            WHERE package_contents_id = package_contents_id_value;
            
        IF max_num IS NULL THEN
            max_num := 0;
        END IF;
        
        i := max_num + 1;
        
        FOREACH rec_contents IN ARRAY arr LOOP
            INSERT INTO package_contents_place(
                package_contents_id,
                place_number,
                length,
                width,
                height,
                units_id
            )
            VALUES(
                package_contents_id_value,
                i,
                rec_contents.length_value,
                rec_contents.width_value,
                rec_contents.height_value,
                rec_contents.units_id_value
            ) RETURNING id INTO current_id;
            i := i + 1;
            PERFORM package_contents_place_attachment_array_add(
            current_id,
            rec_contents.package_contents_place_attachment
            );
        END LOOP;
    END;
    RETURN TRUE;
END;$$;

CREATE OR REPLACE FUNCTION package_add_all_not_document(   
    sender_full_name_value VARCHAR(255),
    sender_full_address_value VARCHAR(255),
    sender_country_id_value INTEGER,
    recipient_full_name_value VARCHAR(255),
    recipient_full_address_value VARCHAR(255),
    recipient_country_id_value INTEGER,    
    -- PACKAGE CONTENTS
    description_value VARCHAR(255),
    place_count_value INTEGER,
    full_weight_value REAL,
    currency_id_value INTEGER,
    -- PACKAGE CONTENTS PLACE
    arr IN package_contents_place_type[],
    -- DEFAULT NULL VALUES
    comment_id_value INTEGER DEFAULT NULL,
    date_on_reception_value DATE DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    package_id INTEGER;
BEGIN
    DECLARE
        package_tmp_id INTEGER;
        package_contents_tmp_id INTEGER;
        full_price REAL;
        rec_contents package_contents_place_type;
        rec_att package_contents_place_attachment_type;       
    BEGIN
        SELECT package_add(
            sender_full_name_value,
            sender_full_address_value,
            sender_country_id_value,
            recipient_full_name_value,
            recipient_full_address_value,
            recipient_country_id_value,
            date_on_reception_value
        ) INTO package_tmp_id;
        package_id := package_tmp_id;
        
        full_price := 0;
        FOREACH rec_contents IN ARRAY arr LOOP
            FOREACH rec_att IN ARRAY rec_contents.package_contents_place_attachment LOOP
                full_price = full_price + (rec_att.unit_price_value * rec_att.unit_count_value);
            END LOOP;
        END LOOP;
        
        SELECT package_contents_not_document_add(
            package_tmp_id,
            description_value,
            place_count_value,
            full_weight_value,
            full_price,
            currency_id_value
        ) INTO package_contents_tmp_id;
        
        PERFORM package_contents_place_array_add(
            package_contents_tmp_id,
            arr
        );
        RETURN package_id;
    END;
END;$$;

CREATE OR REPLACE FUNCTION package_add_all_document(   
    sender_full_name_value VARCHAR(255),
    sender_full_address_value VARCHAR(255),
    sender_country_id_value INTEGER,
    recipient_full_name_value VARCHAR(255),
    recipient_full_address_value VARCHAR(255),
    recipient_country_id_value INTEGER,    
    -- PACKAGE CONTENTS
    description_value VARCHAR(255),
    place_count_value INTEGER,
    full_weight_value REAL,
    currency_id_value INTEGER,
    -- DEFAULT NULL VALUES
    comment_id_value INTEGER DEFAULT NULL,
    date_on_reception_value DATE DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    package_id INTEGER;
BEGIN
    DECLARE
        package_tmp_id INTEGER;
    BEGIN
        SELECT package_add(
            sender_full_name_value,
            sender_full_address_value,
            sender_country_id_value,
            recipient_full_name_value,
            recipient_full_address_value,
            recipient_country_id_value,
            date_on_reception_value
        ) INTO package_tmp_id;
        package_id := package_tmp_id;
        
        PERFORM package_contents_document_add(
            package_tmp_id,
            description_value,
            place_count_value,
            full_weight_value,
            currency_id_value
        );
        RETURN package_id;
    END;
END;$$;

CREATE OR REPLACE FUNCTION countries_list_add(
    name_value VARCHAR(255)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    country_id INTEGER;
BEGIN
    INSERT INTO countries_list(
        name
    )
    VALUES(
        name_value
    ) RETURNING id INTO country_id;
    RETURN country_id;
END;$$;

CREATE OR REPLACE FUNCTION currency_list_add(
    full_name_value VARCHAR(255),
    short_name_value VARCHAR(5)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    currency_id INTEGER;
BEGIN
    INSERT INTO currency_list(
        full_name,
        short_name,
        date_on_add,
        date_on_edit
    )
    VALUES(
        full_name_value,
        short_name_value,
        (SELECT CURRENT_DATE),
        NULL
    ) RETURNING id INTO currency_id;
    RETURN currency_id;
END;$$;

CREATE OR REPLACE FUNCTION units_list_add(
    full_name_value VARCHAR(255),
    short_name_value VARCHAR(5)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    units_id INTEGER;
BEGIN
    INSERT INTO units_list(
        full_name,
        short_name,
        date_on_add,
        date_on_edit
    )
    VALUES(
        full_name_value,
        short_name_value,
        (SELECT CURRENT_DATE),
        NULL
    ) RETURNING id INTO units_id;
    RETURN units_id;
END;$$;

CREATE OR REPLACE FUNCTION stations_status_list_add(
    name_value VARCHAR(255),
    description_value VARCHAR(255) DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO stations_status_list(
        name,
        description
    )VALUES(
        name_value,
        description_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION stations_list_add(
    full_name_value VARCHAR(255),
    full_name_en_value VARCHAR(255),
    station_code_value INTEGER,
    full_address_value VARCHAR(255),
    full_address_en_value VARCHAR(255),
    longitude_value REAL,
    width_value REAL,
    country_id_value INTEGER,
    station_status_id_value INTEGER,
    branch_office_value INTEGER DEFAULT NULL,
    airport_value VARCHAR(255) DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO stations_list(
        full_name,
        full_name_en,
        station_code,
        full_address,
        full_address_en,
        longitude,
        width,
        country_id,
        station_status_id,
        branch_office,
        airport,
        date_on_add,
        date_on_last_edit
    )VALUES(
        full_name_value,
        full_name_en_value,
        station_code_value,
        full_address_value,
        full_address_en_value,
        longitude_value,
        width_value,
        country_id_value,
        station_status_id_value,
        branch_office_value,
        airport_value,
        (SELECT CURRENT_DATE),
        NULL
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION roles_add(
    description_value VARCHAR(255)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO roles(
        description
    )VALUES(
        description_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION rights_add(
    description_value VARCHAR(255)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO rights(
        description
    )VALUES(
        description_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION role_right_add(
    role_value INTEGER,
    right_value INTEGER
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO role_right(
        role_id,
        right_id
    )VALUES(
        role_value,
        right_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION users_add(
    role_id_value INTEGER,
    first_name_value VARCHAR(255),
    last_name_value VARCHAR(255),
    e_mail_value VARCHAR(255),
    password_value VARCHAR(255),
    blocked_value BOOLEAN DEFAULT FALSE,
    middle_name_value VARCHAR(255) DEFAULT NULL,
    description_value VARCHAR(255) DEFAULT NULL
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO users(
        role_id,
        first_name,
        last_name,
        date_on_add,
        date_on_last_edit,
        date_on_last_login,
        date_on_delete,
        date_on_last_action,
        e_mail,
        password,
        blocked,
        middle_name,
        description
    )VALUES(
        role_id_value,
        first_name_value,
        last_name_value,
        (SELECT CURRENT_DATE),
        (SELECT CURRENT_DATE),
        (SELECT CURRENT_DATE),
        NULL,
        (SELECT CURRENT_DATE),
        e_mail_value,
        password_value,
        blocked_value,
        middle_name_value,
        description_value
    ) RETURNING id INTO return_id;
	RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION message_add(
    sender_user_id_value INTEGER,
    posts_viewed_value BOOLEAN,
    theme_value VARCHAR(255),
    message_text_value TEXT
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO message(
        sender_user_id,
        posts_viewed,
        theme,
        message_text
    )VALUES(
        sender_user_id_value,
        posts_viewed_value,
        theme_value,
        message_text_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION users_massage_add(
    recipient_user_id_value INTEGER,
    message_id_value INTEGER
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO user_massages(
        recipient_user_id,
        message_id
    )VALUES(
        recipient_user_id_value,
        message_id_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;

CREATE OR REPLACE FUNCTION registry_type_add(
    name_value VARCHAR(255)
)
RETURNS INTEGER
LANGUAGE PLPGSQL AS $$
DECLARE
    return_id INTEGER;
BEGIN
    INSERT INTO registry_type(
        name
    )VALUES(
        name_value
    ) RETURNING id INTO return_id;
    RETURN return_id;
END;$$;