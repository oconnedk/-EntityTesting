<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/16
 * Time: 17:35
 */
namespace agutils\entitytesting;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class NonDestructiveEntityTest
 * Non-destructive functional tests
 */
abstract class NonDestructiveEntityTest extends KernelTestCase
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * Set up transaction to prevent entity changes being persisted
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        // We do NOT want to persist any data as part of these tests!
        $this->em->getConnection()->beginTransaction();
    }

    /**
     * Ensure that any enttiy changes ARE NOT persisted
     */
    protected function tearDown()
    {
        // Check here to cater for throwing exceptions during duplicate entity creation tests
        if ($this->em && $this->em->getConnection()->isTransactionActive()) {
            // We do NOT want to persist any data as part of these tests!
            $this->em->getConnection()->rollBack();
        }
        parent::tearDown();
        if ($this->em) {
            $this->em->close();
        }
    }
}
