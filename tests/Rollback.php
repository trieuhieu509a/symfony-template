<?php
namespace App\Tests;

trait Rollback {

    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient([], [
            'PHP_AUTH_USER' => 'jw@symf4.loc',
            'PHP_AUTH_PW' => 'passw',
        ]);
        // $this->client->disableReboot();

        $this->entityManager = $this->client->getContainer()->get('doctrine.orm.entity_manager');
        // Note: use package dama/doctrine-test-bundle for transaction in unit test
        // $this->entityManager->beginTransaction();
        // $this->entityManager->getConnection()->setAutoCommit(false);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        // $this->entityManager->rollback();
        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }
}