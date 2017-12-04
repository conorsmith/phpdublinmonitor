<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

class CreateWebsiteStatusTable extends AbstractMigration
{
    public function up()
    {
        $this->table('website_status')
            ->addColumn('online', "boolean")
            ->save();
    }
}
