<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_database_structure extends CI_Migration {
    private $dbforge;
    private $db;

    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    // MMTodo: Feature disabled until problem is detected. see controller/migrate
    public function up() {
        $this->create_table_suscriptor();
        $this->create_table_suscription();
        $this->create_table_suscription_payment_type();
        $this->create_table_suscription_plan();
        $this->create_table_plan();
        $this->create_table_plan_price();
        $this->create_table_billing();
        $this->create_table_billing_history();
        $this->create_table_billing_status();
        $this->add_foreign_keys();
    }

    public function down() {
        $this->dbforge->drop_table('suscriptor');
        $this->dbforge->drop_table('suscription');
        $this->dbforge->drop_table('suscription_payment_type');
        $this->dbforge->drop_table('suscription_plan');
        $this->dbforge->drop_table('plan');
        $this->dbforge->drop_table('plan_price');
        $this->dbforge->drop_table('billing');
        $this->dbforge->drop_table('billing_history');
        $this->dbforge->drop_table('billing_status');
    }

    private function create_table_suscriptor() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'name' => array('type' => 'TEXT'),
            'email' => array('type' => 'TEXT'),
            'created_at' => array('type' => 'TIMESTAMP'),
            'deleted_at' => array('type' => 'DATETIME', 'null' => TRUE),
        );

        $this->create_table('suscriptor', $fields);
    }

    private function create_table_suscription() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'suscriptor_id' => array('type' => 'INT', 'constraint' => 11),
            'barrio' => array('type' => 'TEXT'),
            'edificio' => array('type' => 'TEXT'),
            'payment_type_id' => array('type' => 'INT', 'constraint' => 11),
            'active' => array('type' => 'BOOLEAN'),
            'created_at' => array('type' => 'DATETIME'),
        );

        $this->create_table('suscription', $fields);
    }

    private function create_table_suscription_payment_type() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'name' => array('type' => 'TEXT'),
            'description' => array('type' => 'TEXT'),
            'active' => array('type' => 'BOOLEAN'),
        );

        $this->create_table('suscription_payment_type', $fields);
    }

    private function create_table_suscription_plan() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'suscription_id' => array('type' => 'INT', 'constraint' => 11),
            'plan_price_id' => array('type' => 'INT', 'constraint' => 11),
            'created_at' => array('type' => 'TIMESTAMP'),
        );

        $this->create_table('suscription_plan', $fields);
    }

    private function create_table_plan() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'name' => array('type' => 'TEXT'),
            'description' => array('type' => 'TEXT'),
            'active' => array('type' => 'BOOLEAN'),
        );

        $this->create_table('plan', $fields);
    }

    private function create_table_plan_price() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'price' => array('type' => 'FLOAT'),
            'plan_id' => array('type' => 'INT', 'constraint' => 11),
            'created_at' => array('type' => 'TIMESTAMP'),
        );

        $this->create_table('plan_price', $fields);
    }

    private function create_table_billing() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'suscription_plan_id' => array('type' => 'INT', 'constraint' => 11),
            'billing_history_id' => array('type' => 'INT', 'constraint' => 11),
        );

        $this->create_table('billing', $fields);
    }

    private function create_table_billing_history() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'billing_status_id' => array('type' => 'INT', 'constraint' => 11),
            'created_at' => array('type' => 'TIMESTAMP'),
        );

        $this->create_table('billing_history', $fields);
    }

    private function create_table_billing_status() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'name' => array('type' => 'TEXT'),
            'description' => array('type' => 'TEXT'),
            'active' => array('type' => 'BOOLEAN'),
        );

        $this->create_table('billing_status', $fields);
    }

    private function add_foreign_keys(){
        $this->add_foreign_key('suscription', 'suscriptor_id', 'suscriptor', 'id');
        $this->add_foreign_key('suscription', 'payment_type_id', 'suscription_payment_type', 'id');
        $this->add_foreign_key('suscription_plan', 'suscription_id', 'suscription', 'id');
        $this->add_foreign_key('plan_price', 'plan_id', 'plan', 'id');
        $this->add_foreign_key('suscription_plan', 'plan_price_id', 'plan_price', 'id');
        $this->add_foreign_key('billing', 'suscription_plan_id', 'suscription_plan', 'id');
        $this->add_foreign_key('billing', 'billing_history_id', 'billing_history', 'id');
        $this->add_foreign_key('billing_history', 'billing_status_id', 'billing_status', 'id');
    }

    /**
     * @param string $table_name
     * @param string $fields
     * @return void
     */
    private function create_table($table_name, $fields) {
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($table_name);
    }

    /**
     * @param string $table
     * @param string $key
     * @param string $reference_table
     * @param string $reference_key
     * @return void
     */
    private function add_foreign_key($table, $key, $reference_table, $reference_key) {
        $sql = "ALTER TABLE `$table` ADD FOREIGN KEY (`$key`) REFERENCES `$reference_table` (`$reference_key`)";
        $this->db->query($sql);
    }
}
