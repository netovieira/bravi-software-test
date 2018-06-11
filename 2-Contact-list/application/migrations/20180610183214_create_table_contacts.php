<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Table_Contacts extends CI_Migration {

    public function up()
    {
        $this->db->query('
          CREATE TABLE `contacts` (
            `id`	INTEGER PRIMARY KEY AUTOINCREMENT,
            `person_id`	INTEGER,
            `type`	TEXT,
            `value`	TEXT,
            CONSTRAINT fk_person
            FOREIGN KEY (person_id)
            REFERENCES persons(id)
          );'
        );
    }

    public function down()
    {
        $this->dbforge->drop_table('contacts');
    }
}