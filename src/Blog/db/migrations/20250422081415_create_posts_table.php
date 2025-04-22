<?php

use Phinx\Migration\AbstractMigration;

final class CreatePostsTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('posts')
            ->addColumn('name','string')
            ->addColumn('slug','string')
            ->addColumn('content','text',[
                'limit'=> \Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG
            ])
            ->addColumn('updated_at','datetime')
            ->addColumn('created_at','datetime')
            ->create();
    }
}
