<?php
use Migrations\AbstractMigration;

class CreateProductsTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('articles', ['id' => false, 'primary_key' => ['id']]);
        $table
              ->addColumn('id', 'uuid')
              ->addColumn('title', 'string')
              ->addColumn('body', 'text')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}