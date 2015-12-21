<?php

$SQL_arr = array(
    "DELETE FROM package_contents_place_attachment_edit;",
    "DELETE FROM package_contents_place_edit;",
    "DELETE FROM package_contents_edit;",
    "DELETE FROM package_edit;",
    "DELETE FROM package_vcs;",
    "DELETE FROM package_contents_place_attachment;",
    "DELETE FROM package_contents_place;",
    "DELETE FROM package_contents;",
    "DELETE FROM home_transport_documents;",
    "DELETE FROM package;",
    "DELETE FROM persons_hot_list;",
    "DELETE FROM persons_cold_list;",
    "DELETE FROM currency_list;",
    "DELETE FROM units_list;",
    "DELETE FROM countries_list;",
    "DELETE FROM comments_list;",
    "DELETE FROM users;",
    "DELETE FROM role_right;",
    "DELETE FROM rights;",
    "DELETE FROM roles;",
    "ALTER SEQUENCE package_contents_place_attachment_edit_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_contents_place_edit_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_contents_edit_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_edit_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_vcs_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_contents_place_attachment_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_contents_place_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_contents_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE home_transport_documents_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE package_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE persons_hot_list_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE currency_list_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE units_list_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE countries_list_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE comments_list_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE users_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE role_right_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE rights_id_sequence RESTART WITH 1;",
    "ALTER SEQUENCE roles_id_sequence RESTART WITH 1;",
    "SELECT countries_list_add('UNITED STATES');",
    "SELECT countries_list_add('UKRAINE');",
    "SELECT countries_list_add('RASSHA');",
    "SELECT currency_list_add('UNITED STATES DOLLAR', 'USD');",
    "SELECT currency_list_add('UKRAINE RATE', 'UAH');",
    "SELECT currency_list_add('RASSHA RATE', 'RUB');",
    "SELECT units_list_add('kilograms', 'kg');",
    "SELECT units_list_add('meters', 'm');",
    "SELECT units_list_add('milimeters', 'mm');",
    "SELECT units_list_add('items', 'it');",
);



$dbconn = pg_connect("host=localhost port=5432 dbname=ics user=ics password=\$icscooldbuser\$");
for($i=0; $i<count($SQL_arr); $i++)
{
    pg_query($dbconn, $SQL_arr[$i]);
}

require 'autoload.php';
$faker = Faker\Factory::create();
$send = -1;
$resip = 1;
$country_send = 1;
$country_resip = 1;

for($i=0; $i<100000; $i++)
{
    $sql = "";
    $document = rand(0,1);
    if($document == 0)
    {
        if(rand(0, 100) > 33)
        {
            $send--;
            $country_send = rand(1, 3);
        }
        $faker->seed($send);

        $sql = "
            SELECT package_add_all_not_document(
            '". pg_escape_string($faker->name) ."',
            '". pg_escape_string($faker->streetAddress) ."',
            ". $country_send .",";

            if(rand(0, 100) > 33)
            {
                $resip++;
                $country_resip = rand(1, 3);
            }
        $faker->seed($resip);

        $sql .= "
            '". pg_escape_string($faker->name) ."',
            '". pg_escape_string($faker->streetAddress) ."',
            ". $country_resip .",
            '". pg_escape_string($faker->text(255)) ."',
            ". rand(1,100) .",
            ". $faker->postcode / 100 .",
            ". rand(1,3) .",
            ARRAY[";
            $n = rand(1,5);
            for($j=0; $j<$n; $j++)
            {
                if($j>0)
                {
                    $sql .=", ";
                }
                $sql .= "
                row(
                    ". rand(1,100) /100 .",
                    ". rand(1,100) /100 .", 
                    ". rand(1,100) /100 .", 
                    ". rand(1,4) .",
                    ARRAY[";

                    $m = rand(1,5);
                    for($k=0; $k<$m; $k++)
                    {
                        if($k>0)
                        {
                            $sql .=", ";
                        }
                        $sql .= "
                        row (
                            '". pg_escape_string($faker->text(12))  ."',
                            ". rand(1,34)  .",
                            ". rand(1,4) .",
                            ". rand(1,100) /100 ."
                        )::package_contents_place_attachment_type
                        ";
                    }

                    $sql .= "
                    ]
                )::package_contents_place_type";
            }
            $sql .= "
            ]
            );";
    }else{
        $sql = "
            SELECT package_add_all_document(
            '". pg_escape_string($faker->name) ."',
            '". pg_escape_string($faker->streetAddress) ."',
            ". $country_send .",";

            if(rand(0, 100) > 33)
            {
                $resip++;
                $country_resip = rand(1, 3);
            }
        $faker->seed($resip);

        $sql .= "
            '". pg_escape_string($faker->name) ."',
            '". pg_escape_string($faker->streetAddress) ."',
            ". $country_resip .",
            '". pg_escape_string($faker->text(255)) ."',
            ". rand(1,100) .",
            ". $faker->postcode / 100 .",
            ". rand(1,3) ."
            );";
    }
    pg_query($dbconn, $sql);
}
pg_close($dbconn);
?>