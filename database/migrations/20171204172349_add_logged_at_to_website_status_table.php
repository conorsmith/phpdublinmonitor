<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

class AddLoggedAtToWebsiteStatusTable extends AbstractMigration
{
    public function up()
    {
        $this->table('website_status')
            ->addColumn('logged_at', "datetime")
            ->save();
    }
}
